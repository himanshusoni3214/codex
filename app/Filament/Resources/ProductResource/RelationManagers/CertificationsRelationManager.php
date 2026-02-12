<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CertificationsRelationManager extends RelationManager
{
    protected static string $relationship = 'certifications';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('issuer')->maxLength(255),
                Forms\Components\TextInput::make('website')->maxLength(255),
                Forms\Components\Textarea::make('description')->maxLength(1000)->columnSpanFull(),
                Forms\Components\Toggle::make('is_active'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('issuer')->searchable(),
                Tables\Columns\TextColumn::make('pivot.certificate_number')->label('Certificate #'),
                Tables\Columns\IconColumn::make('pivot.is_primary')->boolean()->label('Primary'),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->form([
                        Forms\Components\Select::make('recordId')
                            ->label('Certification')
                            ->relationship('certifications', 'name')
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('certificate_number')->maxLength(255),
                        Forms\Components\TextInput::make('certificate_url')->maxLength(255),
                        Forms\Components\DatePicker::make('issued_at'),
                        Forms\Components\Toggle::make('is_primary'),
                    ]),
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
