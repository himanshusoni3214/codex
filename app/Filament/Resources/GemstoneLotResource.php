<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GemstoneLotResource\Pages;
use App\Models\GemstoneLot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GemstoneLotResource extends Resource
{
    protected static ?string $model = GemstoneLot::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $recordTitleAttribute = 'lot_code';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Lot Details')
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'title')
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('lot_code')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('origin')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('treatment')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('disclosure')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('certificate_type')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('certificate_number')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('certificate_url')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('received_at'),
                        Forms\Components\Textarea::make('notes')
                            ->rows(3)
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('certificates')
                            ->collection('certificates')
                            ->label('Certificates')
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->multiple(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lot_code')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product.title')->label('Product')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('origin')->sortable(),
                Tables\Columns\TextColumn::make('treatment')->sortable(),
                Tables\Columns\TextColumn::make('received_at')->date(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->relationship('product', 'title')
                    ->label('Product'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListGemstoneLots::route('/'),
            'create' => Pages\CreateGemstoneLot::route('/create'),
            'edit' => Pages\EditGemstoneLot::route('/{record}/edit'),
        ];
    }
}
