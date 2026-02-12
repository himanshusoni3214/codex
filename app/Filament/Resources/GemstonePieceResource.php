<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GemstonePieceResource\Pages;
use App\Models\GemstonePiece;
use App\Services\InventoryService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GemstonePieceResource extends Resource
{
    protected static ?string $model = GemstonePiece::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $recordTitleAttribute = 'piece_code';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Piece Details')
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'title')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('lot_id')
                            ->relationship('lot', 'lot_code')
                            ->searchable(),
                        Forms\Components\TextInput::make('piece_code')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('weight_ct')
                            ->numeric()
                            ->minValue(0)
                            ->required(),
                        Forms\Components\TextInput::make('rate_per_carat_cad')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('price_total_cad')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\Select::make('status')
                            ->options([
                                'available' => 'Available',
                                'reserved' => 'Reserved',
                                'sold' => 'Sold',
                                'unavailable' => 'Unavailable',
                            ])
                            ->required()
                            ->default('available'),
                        Forms\Components\DateTimePicker::make('reserved_until'),
                        Forms\Components\TextInput::make('reserved_by')
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('sold_at'),
                        Forms\Components\Textarea::make('metadata')
                            ->rows(4)
                            ->columnSpanFull()
                            ->helperText('Optional JSON for extra attributes (dimensions, clarity, color, etc).')
                            ->formatStateUsing(fn ($state) => is_array($state) ? json_encode($state, JSON_PRETTY_PRINT) : $state),
                        SpatieMediaLibraryFileUpload::make('certificates')
                            ->collection('certificates')
                            ->label('Certificates')
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->multiple(),
                        SpatieMediaLibraryFileUpload::make('photos')
                            ->collection('photos')
                            ->label('Photos')
                            ->image()
                            ->multiple(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('piece_code')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product.title')->label('Product')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('lot.lot_code')->label('Lot')->sortable(),
                Tables\Columns\TextColumn::make('weight_ct')->label('ct')->sortable(),
                Tables\Columns\TextColumn::make('rate_per_carat_cad')->label('Rate/ct')->sortable(),
                Tables\Columns\TextColumn::make('computed_price')
                    ->label('Computed Price')
                    ->money('CAD')
                    ->getStateUsing(fn (GemstonePiece $record) => $record->computed_price),
                Tables\Columns\TextColumn::make('status')->badge()->sortable(),
                Tables\Columns\TextColumn::make('reserved_until')->dateTime(),
                Tables\Columns\TextColumn::make('sold_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'reserved' => 'Reserved',
                        'sold' => 'Sold',
                        'unavailable' => 'Unavailable',
                    ]),
                Tables\Filters\SelectFilter::make('product_id')
                    ->relationship('product', 'title')
                    ->label('Product'),
                Tables\Filters\SelectFilter::make('lot_id')
                    ->relationship('lot', 'lot_code')
                    ->label('Lot'),
            ])
            ->actions([
                Tables\Actions\Action::make('reserve')
                    ->label('Reserve')
                    ->form([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('email')->email(),
                        Forms\Components\TextInput::make('phone'),
                        Forms\Components\TextInput::make('hold_minutes')
                            ->numeric()
                            ->default(60),
                        Forms\Components\Textarea::make('notes')->rows(3),
                    ])
                    ->action(function (GemstonePiece $record, array $data, InventoryService $inventory) {
                        $inventory->reservePiece($record->id, [
                            'name' => $data['name'] ?? 'Customer',
                            'email' => $data['email'] ?? null,
                            'phone' => $data['phone'] ?? null,
                            'notes' => $data['notes'] ?? null,
                        ], (int) ($data['hold_minutes'] ?? 60));
                    })
                    ->visible(fn (GemstonePiece $record) => $record->status === 'available'),
                Tables\Actions\Action::make('release')
                    ->label('Release')
                    ->action(function (GemstonePiece $record) {
                        $record->status = 'available';
                        $record->reserved_until = null;
                        $record->reserved_by = null;
                        $record->save();
                    })
                    ->visible(fn (GemstonePiece $record) => $record->status === 'reserved'),
                Tables\Actions\Action::make('markSold')
                    ->label('Mark Sold')
                    ->action(function (GemstonePiece $record, InventoryService $inventory) {
                        $inventory->markSold($record->id);
                    })
                    ->visible(fn (GemstonePiece $record) => $record->status !== 'sold'),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('markAvailable')
                    ->label('Mark Available')
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->status = 'available';
                            $record->reserved_until = null;
                            $record->reserved_by = null;
                            $record->save();
                        }
                    }),
                Tables\Actions\BulkAction::make('markReserved')
                    ->label('Mark Reserved')
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->status = 'reserved';
                            $record->reserved_until = now()->addMinutes(60);
                            $record->save();
                        }
                    }),
                Tables\Actions\BulkAction::make('markSold')
                    ->label('Mark Sold')
                    ->action(function ($records, InventoryService $inventory) {
                        foreach ($records as $record) {
                            $inventory->markSold($record->id);
                        }
                    }),
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGemstonePieces::route('/'),
            'create' => Pages\CreateGemstonePiece::route('/create'),
            'edit' => Pages\EditGemstonePiece::route('/{record}/edit'),
        ];
    }
}
