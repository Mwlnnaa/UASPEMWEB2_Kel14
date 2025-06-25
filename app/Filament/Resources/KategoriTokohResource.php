<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriTokohResource\Pages; // Pastikan ini KategoriTokohResource
use App\Models\KategoriTokoh; // Pastikan ini KategoriTokoh
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriTokohResource extends Resource // Pastikan ini KategoriTokohResource
{
    protected static ?string $model = KategoriTokoh::class; // Pastikan ini KategoriTokoh
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationGroup = 'Produk Management';
    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Kategori Tokoh'; // Pastikan ini Kategori Tokoh
    protected static ?string $pluralModelLabel = 'Kategori Tokoh'; // Pastikan ini Kategori Tokoh
    protected static ?string $navigationLabel = 'Kategori Tokoh'; // Pastikan ini Kategori Tokoh

    public static function form(Form $form): Form {
        return $form->schema([ Forms\Components\TextInput::make('nama')->required()->maxLength(45), ]);
    }
    public static function table(Table $table): Table {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->sortable()->label('ID'),
            Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ])->filters([])->actions([ Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make(), ])->bulkActions([ Tables\Actions\BulkActionGroup::make([ Tables\Actions\DeleteBulkAction::make(), ]), ]);
    }
    public static function getRelations(): array { return []; }
    public static function getPages(): array {
        return [
            'index' => Pages\ListKategoriTokohs::route('/'), // Pastikan KategoriTokohs
            'create' => Pages\CreateKategoriTokoh::route('/create'), // Pastikan KategoriTokoh
            'edit' => Pages\EditKategoriTokoh::route('/{record}/edit'), // Pastikan KategoriTokoh
        ];
    }
}