<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSeoSettingResource\Pages;
use App\Models\SiteSeoSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSeoSettingResource extends Resource
{
    protected static ?string $model = SiteSeoSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'SEO Content';

    protected static ?string $recordTitleAttribute = 'organization_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('organization_name')->required()->maxLength(255),
                Forms\Components\TextInput::make('site_url')->required()->maxLength(255),
                Forms\Components\TextInput::make('logo_url')->maxLength(255),
                Forms\Components\TextInput::make('default_og_image')
                    ->maxLength(255)
                    ->helperText('Fallback OG image. Use a Media Library ID (recommended) or an absolute/relative image URL.'),
                Forms\Components\Repeater::make('same_as')
                    ->schema([
                        Forms\Components\TextInput::make('url')->required()->maxLength(255),
                    ])
                    ->defaultItems(0)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('contact_phone')->maxLength(255),
                Forms\Components\TextInput::make('contact_email')->email()->maxLength(255),
                Forms\Components\TextInput::make('address_line')->maxLength(255),
                Forms\Components\TextInput::make('city')->maxLength(255),
                Forms\Components\TextInput::make('province')->maxLength(255),
                Forms\Components\TextInput::make('postal_code')->maxLength(255),
                Forms\Components\TextInput::make('country')->default('CA')->maxLength(10),
                Forms\Components\TextInput::make('latitude')->numeric(),
                Forms\Components\TextInput::make('longitude')->numeric(),
                Forms\Components\Textarea::make('default_meta_title')->maxLength(255),
                Forms\Components\Textarea::make('default_meta_description')->maxLength(255),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organization_name')->searchable(),
                Tables\Columns\TextColumn::make('site_url')->searchable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSeoSettings::route('/'),
            'create' => Pages\CreateSiteSeoSetting::route('/create'),
            'edit' => Pages\EditSiteSeoSetting::route('/{record}/edit'),
        ];
    }
}
