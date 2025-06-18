<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Filament\Resources\TestimoniResource\RelationManagers;
use App\Models\Testimoni;
use App\Models\Produk; // Import model Produk
use App\Models\KategoriToko; // Import model KategoriToko
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Produk Management'; // Atau bisa juga grup terpisah 'Testimoni'
    protected static ?int $navigationSort = 4; // Untuk mengatur urutan di sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal')
                    ->required()
                    ->default(now()),
                Forms\Components\TextInput::make('nama_toko')
                    ->required()
                    ->maxLength(45),
                Forms\Components\Textarea::make('komentar')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('rating')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->nullable(),
                Select::make('produk_id')
                    ->label('Produk')
                    ->required()
                    ->options(Produk::all()->pluck('nama', 'id'))
                    ->searchable(),
                Select::make('kategori_toko_id')
                    ->label('Kategori Toko')
                    ->required()
                    ->options(KategoriToko::all()->pluck('nama', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id') // Added ID column
                    ->sortable()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_toko')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('komentar')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('produk.nama')
                    ->label('Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategoriToko.nama')
                    ->label('Kategori Toko')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('produk_id')
                    ->label('Produk')
                    ->relationship('produk', 'nama'),
                Tables\Filters\SelectFilter::make('kategori_toko_id')
                    ->label('Kategori Toko')
                    ->relationship('kategoriToko', 'nama'),
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
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}