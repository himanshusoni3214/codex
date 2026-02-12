<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminAuditResource\Pages;
use App\Models\AdminAudit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdminAuditResource extends Resource
{
    protected static ?string $model = AdminAudit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('action')->disabled(),
                Forms\Components\TextInput::make('auditable_type')->disabled(),
                Forms\Components\TextInput::make('auditable_id')->disabled(),
                Forms\Components\TextInput::make('ip')->disabled(),
                Forms\Components\Textarea::make('user_agent')->disabled()->columnSpanFull(),
                Forms\Components\Textarea::make('before')->disabled()->columnSpanFull(),
                Forms\Components\Textarea::make('after')->disabled()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User')->searchable(),
                Tables\Columns\TextColumn::make('action')->badge(),
                Tables\Columns\TextColumn::make('auditable_type')->label('Type'),
                Tables\Columns\TextColumn::make('auditable_id')->label('ID'),
                Tables\Columns\TextColumn::make('ip')->label('IP'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->options([
                        'created' => 'Created',
                        'updated' => 'Updated',
                        'deleted' => 'Deleted',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdminAudits::route('/'),
            'view' => Pages\ViewAdminAudit::route('/{record}'),
        ];
    }
}
