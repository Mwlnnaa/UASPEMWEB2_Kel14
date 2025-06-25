<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat; // Import Stat class
use App\Models\Produk; // Import model Produk
use App\Models\Testimoni; // Import model Testimoni
use App\Models\KategoriTokoh; // Import model KategoriTokoh
use App\Models\JenisProduk; // Import model JenisProduk
use App\Models\User; // Import model User

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Produk::count())
                ->description('Jumlah produk yang terdaftar')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('info'), // Warna biru
            Stat::make('Total Testimoni', Testimoni::count())
                ->description('Jumlah testimoni yang masuk')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('success'), // Warna hijau
            Stat::make('Total Kategori Tokoh', KategoriTokoh::count())
                ->description('Jumlah kategori tokoh yang ada')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'), // Warna kuning
            Stat::make('Total Jenis Produk', JenisProduk::count())
                ->description('Jumlah jenis produk yang ada')
                ->descriptionIcon('heroicon-m-rectangle-group')
                ->color('primary'), // Warna default Filament
            Stat::make('Total Pengguna', User::count())
                ->description('Jumlah semua user terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray'), // Warna abu-abu
        ];
    }
}