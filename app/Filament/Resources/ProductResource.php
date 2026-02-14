<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Catalog';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        $descriptionEditor = class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
            ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('description')
            : Forms\Components\RichEditor::make('description');

        $treatmentEditor = class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
            ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('treatment_disclosure')
            : Forms\Components\RichEditor::make('treatment_disclosure');

        return $form
            ->schema([
                Forms\Components\Tabs::make('Product')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basics')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU')
                                    ->maxLength(255)
                                    ->helperText('If SKU is set, this item will also appear under Inventory.'),
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
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->label('Category'),
                                Forms\Components\Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('gemstoneTypes')
                                    ->relationship('gemstoneTypes', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->label('Gemstone Types'),
                                Forms\Components\Select::make('origins')
                                    ->relationship('origins', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->label('Origins'),
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured'),
                                $descriptionEditor
                                    ->label('Description')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('short_description')
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Pricing')
                            ->schema([
                                Forms\Components\TextInput::make('price_cad')
                                    ->label('Price (CAD)')
                                    ->numeric()
                                    ->minValue(0),
                                Forms\Components\TextInput::make('currency')
                                    ->default('CAD')
                                    ->maxLength(10),
                                Forms\Components\TextInput::make('rate_per_carat')
                                    ->label('Rate per Carat')
                                    ->numeric()
                                    ->minValue(0),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Specifications')
                            ->schema([
                                Forms\Components\TextInput::make('gem_type')->label('Gem Type')->maxLength(255),
                                Forms\Components\TextInput::make('carat')->numeric()->minValue(0),
                                Forms\Components\TextInput::make('weight')->numeric()->minValue(0),
                                Forms\Components\TextInput::make('color')->maxLength(255),
                                Forms\Components\TextInput::make('clarity')->maxLength(255),
                                Forms\Components\TextInput::make('cut')->maxLength(255),
                                Forms\Components\TextInput::make('shape')->maxLength(255),
                                Forms\Components\TextInput::make('origin')->maxLength(255),
                                Forms\Components\Textarea::make('origin_text')
                                    ->label('Origin Disclosure')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Certification & Treatment')
                            ->schema([
                                Forms\Components\TextInput::make('treatment')->maxLength(255),
                                $treatmentEditor
                                    ->label('Treatment Disclosure')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('treatment_text')
                                    ->label('Treatment Notes')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('certificate_lab')->maxLength(255),
                                Forms\Components\TextInput::make('certificate_number')->maxLength(255),
                                Forms\Components\TextInput::make('certificate_url')->maxLength(255),
                                Forms\Components\Textarea::make('certification_text')
                                    ->label('Certification Notes')
                                    ->columnSpanFull(),
                                Forms\Components\Select::make('certifications')
                                    ->relationship('certifications', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Media')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('images')
                                    ->collection('images')
                                    ->multiple()
                                    ->image()
                                    ->maxFiles(10),
                                SpatieMediaLibraryFileUpload::make('certificates')
                                    ->collection('certificates')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->label('Certificate PDF')
                                    ->maxFiles(1),
                                Forms\Components\TextInput::make('image')
                                    ->label('Legacy Image URL')
                                    ->helperText('Optional fallback image URL for legacy data.')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Inventory')
                            ->schema([
                                Forms\Components\TextInput::make('total_weight')
                                    ->numeric()
                                    ->minValue(0)
                                    ->label('Total Weight (ct)'),
                                Forms\Components\TextInput::make('total_quantity')
                                    ->numeric()
                                    ->minValue(0)
                                    ->label('Total Quantity'),
                                Forms\Components\TextInput::make('low_stock_threshold')
                                    ->numeric()
                                    ->minValue(0)
                                    ->label('Low Stock Threshold'),
                                Forms\Components\TextInput::make('weight_per_piece')
                                    ->numeric()
                                    ->minValue(0)
                                    ->label('Weight per Piece (ct)'),
                                Forms\Components\TextInput::make('serial_quantity')
                                    ->maxLength(255)
                                    ->label('Serial/Quantity'),
                                Forms\Components\Textarea::make('notes')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')->maxLength(255),
                                Forms\Components\Textarea::make('meta_description')->maxLength(255),
                                Forms\Components\TextInput::make('og_image')->maxLength(255),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('images')
                    ->collection('images')
                    ->label('Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_type')
                    ->badge(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('gemstoneTypes.name')
                    ->label('Gemstone Type')
                    ->badge(),
                Tables\Columns\TextColumn::make('origins.name')
                    ->label('Origin')
                    ->badge(),
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
                Tables\Columns\TextColumn::make('available_quantity')
                    ->label('Available')
                    ->getStateUsing(fn (Product $record) => $record->available_quantity),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
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
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'draft' => 'Draft',
                        'archived' => 'Archived',
                    ]),
                Tables\Filters\Filter::make('inventory_only')
                    ->label('Inventory Items')
                    ->query(fn (Builder $query) => $query->whereNotNull('sku')),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('preview')
                    ->url(fn (Product $record) => route('gemstones.show', $record))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->visible(fn (Product $record) => $record->product_type === 'gemstone'),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CertificationsRelationManager::class,
            RelationManagers\TagsRelationManager::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class])
            ->withCount('availablePieces');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
