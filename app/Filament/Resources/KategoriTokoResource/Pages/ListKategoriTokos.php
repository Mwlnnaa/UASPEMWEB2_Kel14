<?php

namespace App\Filament\Resources\KategoriTokoResource\Pages;

use App\Filament\Resources\KategoriTokoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriTokos extends ListRecords
{
    protected static string $resource = KategoriTokoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
