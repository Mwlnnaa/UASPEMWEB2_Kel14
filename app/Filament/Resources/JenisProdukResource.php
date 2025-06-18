<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisProdukResource\Pages;
use App\Filament\Resources\JenisProdukResource\RelationManagers;
use App\Models\JenisProduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisProdukResource extends Resource
{
    protected static ?string $model = JenisProduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag'; // Icon untuk navigasi sidebar

    protected static ?string $navigationGroup = 'Produk Management'; // Grup navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(45), // Sesuai dengan VARCHAR(45) di migrasi
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id') // <--- TAMBAHKAN BARIS INI
                    ->sortable()
                    ->label('ID'), // Opsional: Beri label 'ID'
                Tables\Columns\TextColumn::make('nama')
                    ->searchable() // Bisa dicari
                    ->sortable(), // Bisa diurutkan
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Bisa disembunyikan/ditampilkan
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJenisProduks::route('/'),
            'create' => Pages\CreateJenisProduk::route('/create'),
            'edit' => Pages\EditJenisProduk::route('/{record}/edit'),
        ];
    }
}