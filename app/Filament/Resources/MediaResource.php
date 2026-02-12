<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Media';

    protected static ?string $recordTitleAttribute = 'file_name';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('preview')
                    ->getStateUsing(fn (Media $record) => $record->getUrl())
                    ->square(),
                Tables\Columns\TextColumn::make('file_name')->searchable(),
                Tables\Columns\TextColumn::make('collection_name')->badge(),
                Tables\Columns\TextColumn::make('model_type')->label('Attached To'),
                Tables\Columns\TextColumn::make('mime_type')->label('MIME'),
                Tables\Columns\TextColumn::make('size')->label('Size')->formatStateUsing(fn ($state) => number_format($state / 1024, 1) . ' KB'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMedia::route('/'),
            'view' => Pages\ViewMedia::route('/{record}'),
        ];
    }
}
