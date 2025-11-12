<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WartawanResource\Pages;
use App\Filament\Resources\WartawanResource\RelationManagers;
use App\Models\Wartawan;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schema;

class WartawanResource extends Resource
{
    protected static ?string $model = Wartawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->label('Nama')
                    ->maxLength(255)
                    ->Placeholder('Masukkan nama wartawan di sini')
                    ->helperText('maksimal panjang 255 karakter.'),
                TextInput::make('email')
                    ->required()
                    ->label('Email')
                    ->email()
                    ->maxLength(255)
                    ->Placeholder('Masukkan email wartawan di sini')
                    ->helperText('isi dengan alamat email yang valid'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Button untuk Edit
                Tables\Actions\EditAction::make(),
                // Button untuk Hapus
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListWartawans::route('/'),
            'create' => Pages\CreateWartawan::route('/create'),
            'edit' => Pages\EditWartawan::route('/{record}/edit'),
        ];
    }
}
