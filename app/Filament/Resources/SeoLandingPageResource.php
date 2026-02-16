<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoLandingPageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SeoLandingPageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationGroup = 'SEO Content';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'SEO Landing Pages';

    protected static ?string $slug = 'seo-landing-pages';

    public static function form(Form $form): Form
    {
        $contentEditor = class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
            ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('content')
            : Forms\Components\RichEditor::make('content');

        return $form
            ->schema([
                Forms\Components\Select::make('section')
                    ->required()
                    ->options(self::sectionOptions())
                    ->native(false)
                    ->searchable(),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(fn (?string $state, callable $set) => $set('slug', Str::slug((string) $state))),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('hero_title')->maxLength(255),
                Forms\Components\Textarea::make('hero_subtitle')->rows(2),

                Forms\Components\Textarea::make('excerpt')
                    ->rows(3)
                    ->columnSpanFull(),

                $contentEditor->columnSpanFull(),

                Forms\Components\Repeater::make('faq_items')
                    ->schema([
                        Forms\Components\TextInput::make('question')->required()->maxLength(255),
                        Forms\Components\Textarea::make('answer')->required()->rows(3),
                    ])
                    ->defaultItems(0)
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('related_links')
                    ->schema([
                        Forms\Components\TextInput::make('label')->required()->maxLength(255),
                        Forms\Components\TextInput::make('url')->required()->maxLength(255),
                    ])
                    ->defaultItems(0)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('meta_title')->maxLength(255),
                Forms\Components\Textarea::make('meta_description')->maxLength(255),
                Forms\Components\TextInput::make('canonical_url')->maxLength(255),
                Forms\Components\TextInput::make('og_image')->maxLength(255),

                Forms\Components\Select::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
                    ])
                    ->default('published')
                    ->required()
                    ->native(false),

                Forms\Components\Toggle::make('is_indexable')->default(true),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section')->badge()->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable()->wrap(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\IconColumn::make('is_indexable')->boolean()->label('Indexable'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('section')->options(self::sectionOptions()),
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeoLandingPages::route('/'),
            'create' => Pages\CreateSeoLandingPage::route('/create'),
            'edit' => Pages\EditSeoLandingPage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class])
            ->whereIn('section', array_keys(self::sectionOptions()));
    }

    private static function sectionOptions(): array
    {
        return [
            'astrology_hub' => 'Astrology Hub',
            'astrology' => 'Astrology Pages',
            'certification_hub' => 'Certification Hub',
            'certification' => 'Certification Pages',
            'engagement_hub' => 'Engagement Rings Hub',
            'engagement' => 'Engagement Ring Pages',
            'gta' => 'GTA Local Pages',
            'blog' => 'Blog Posts',
        ];
    }
}
