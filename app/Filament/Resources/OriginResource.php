<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OriginResource\Pages;
use App\Models\Origin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class OriginResource extends Resource
{
    protected static ?string $model = Origin::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationGroup = 'SEO Content';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('gemstone_type_id')
                    ->relationship('gemstoneType', 'name')
                    ->label('Gemstone Type')
                    ->searchable()
                    ->preload(),
                Forms\Components\Toggle::make('is_indexable')
                    ->default(true),
                Forms\Components\TextInput::make('hero_title')->maxLength(255),
                Forms\Components\Textarea::make('hero_subtitle')->rows(2),
                Forms\Components\Textarea::make('intro_html')->rows(3)->columnSpanFull()->label('Intro'),
                (class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
                    ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('history_html')
                    : Forms\Components\RichEditor::make('history_html'))
                    ->label('History')
                    ->columnSpanFull(),
                (class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
                    ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('buying_guide_html')
                    : Forms\Components\RichEditor::make('buying_guide_html'))
                    ->label('Buying Guide')
                    ->columnSpanFull(),
                (class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
                    ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('certification_html')
                    : Forms\Components\RichEditor::make('certification_html'))
                    ->label('Certification')
                    ->columnSpanFull(),
                (class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
                    ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('treatment_html')
                    : Forms\Components\RichEditor::make('treatment_html'))
                    ->label('Treatment & Disclosures')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('faq_json')
                    ->schema([
                        Forms\Components\TextInput::make('question')->required()->maxLength(255),
                        Forms\Components\Textarea::make('answer')->required()->rows(3),
                    ])
                    ->defaultItems(0)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('seo_title')->maxLength(255),
                Forms\Components\Textarea::make('seo_description')->maxLength(255),
                Forms\Components\TextInput::make('canonical_url')->maxLength(255),
                Forms\Components\TextInput::make('og_image')->maxLength(255),
                Forms\Components\TextInput::make('og_image_id')
                    ->numeric()
                    ->label('OG Image Media ID')
                    ->helperText('Optional Media Library ID for OG image lookup.'),
                Forms\Components\Textarea::make('schema_overrides_json')->rows(4)->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\TextColumn::make('gemstoneType.name')->label('Gemstone Type')->sortable(),
                Tables\Columns\IconColumn::make('is_indexable')->boolean()->label('Indexable'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrigins::route('/'),
            'create' => Pages\CreateOrigin::route('/create'),
            'edit' => Pages\EditOrigin::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
