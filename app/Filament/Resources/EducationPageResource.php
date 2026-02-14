<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationPageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class EducationPageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'SEO Content';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('section')->default('education'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')->required()->maxLength(255),
                Forms\Components\TextInput::make('hero_title')->maxLength(255),
                Forms\Components\Textarea::make('hero_subtitle')->rows(2),
                Forms\Components\Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                (class_exists(\Awcodes\FilamentTiptapEditor\TiptapEditor::class)
                    ? \Awcodes\FilamentTiptapEditor\TiptapEditor::make('content')
                    : Forms\Components\RichEditor::make('content'))
                    ->columnSpanFull(),
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
                Forms\Components\Select::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
                    ])
                    ->default('published')
                    ->required(),
                Forms\Components\Toggle::make('is_indexable')->default(true),
                Forms\Components\TextInput::make('meta_title')->maxLength(255),
                Forms\Components\Textarea::make('meta_description')->maxLength(255),
                Forms\Components\TextInput::make('canonical_url')->maxLength(255),
                Forms\Components\TextInput::make('og_image')->maxLength(255),
                Forms\Components\Textarea::make('schema_json')->rows(4)->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge(),
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
            'index' => Pages\ListEducationPages::route('/'),
            'create' => Pages\CreateEducationPage::route('/create'),
            'edit' => Pages\EditEducationPage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class])
            ->where('section', 'education');
    }

}
