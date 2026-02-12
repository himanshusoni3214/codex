<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Models\InventoryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InventoryResource extends Resource
{
    protected static ?string $model = InventoryItem::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Inventory Item')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sku')
                            ->label('SKU')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Inventory items require a unique SKU.'),
                        Forms\Components\Select::make('product_type')
                            ->options([
                                'gemstone' => 'Gemstone',
                                'jewelry' => 'Jewelry',
                            ])
                            ->required()
                            ->default('gemstone'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'draft' => 'Draft',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('active'),
                        Forms\Components\TextInput::make('gem_type')
                            ->label('Gem Type')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price_cad')
                            ->label('Price (CAD)')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('rate_per_carat')
                            ->label('Rate per Carat')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('total_weight')
                            ->label('Total Weight (ct)')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('total_quantity')
                            ->label('Total Quantity')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('weight_per_piece')
                            ->label('Weight per Piece (ct)')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('serial_quantity')
                            ->label('Serial/Quantity')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('short_description')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->rows(6)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('notes')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('image')
                            ->label('Image URL')
                            ->helperText('Use transparent PNGs in /images/gemstones/curated/')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_type')
                    ->badge(),
                Tables\Columns\TextColumn::make('gem_type')
                    ->label('Gem Type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_cad')
                    ->label('CAD Price')
                    ->money('CAD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rate_per_carat')
                    ->label('Rate/ct')
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight_per_piece')
                    ->label('ct/pc')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_quantity')
                    ->label('Qty')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_type')
                    ->options([
                        'gemstone' => 'Gemstone',
                        'jewelry' => 'Jewelry',
                    ]),
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListInventoryItems::route('/'),
            'create' => Pages\CreateInventoryItem::route('/create'),
            'edit' => Pages\EditInventoryItem::route('/{record}/edit'),
        ];
    }
}
