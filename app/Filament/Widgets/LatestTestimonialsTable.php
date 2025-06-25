<?php

namespace App\Filament\Widgets;

use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseTableWidget;
use Filament\Tables; // Import Tables namespace
use App\Models\Testimoni; // Import model Testimoni

class LatestTestimonialsTable extends BaseTableWidget
{
    protected static ?string $heading = '5 Testimoni Terbaru'; // Judul widget

    protected int | string | array $columnSpan = 'full'; // Agar widget ini memakan seluruh lebar dashboard

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Testimoni::latest()->limit(5); // Ambil 5 testimoni terbaru
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('nama_tokoh')
                ->label('Nama Tokoh'),
            Tables\Columns\TextColumn::make('komentar')
                ->limit(50),
            Tables\Columns\TextColumn::make('produk.nama')
                ->label('Produk'),
            Tables\Columns\TextColumn::make('rating')
                ->numeric(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->label('Dibuat Pada'),
        ];
    }
}