<?php

namespace App\Filament\Resources;

use App\Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

use App\Filament\Resources\KomentarResource\Pages;
use App\Filament\Resources\KomentarResource\RelationManagers;
use App\Models\Komentar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomentarResource extends Resource
{
    protected static ?string $model = Komentar::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Select::make('berita_id')
                        ->label('Berita')
                        ->relationship('berita', 'judul'),
                    TextInput::make('nama')
                        ->label('Nama Komentator'),
                    Textarea::make('isi')
                        ->label('Isi Komentar')
                        ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Bisa sortable dan tersedia searchable juga
                TextColumn::make('berita.judul')->label('Judul Berita')->sortable()->searchable(),
                TextColumn::make('nama')->label('Nama Komentator')->sortable()->searchable(),
                TextColumn::make('isi')->label('Isi Komentar')->limit(50)->sortable()->searchable(),
                TextColumn::make('created_at')->label('Dibuat Pada')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Action hanya untuk menghapus sesuai request dan view untuk melihat detail komentarnya
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListKomentars::route('/'),
            'create' => Pages\CreateKomentar::route('/create'),
        ];
    }
}
