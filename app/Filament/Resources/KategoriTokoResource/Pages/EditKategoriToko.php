<?php

namespace App\Filament\Resources\KategoriTokoResource\Pages;

use App\Filament\Resources\KategoriTokoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriToko extends EditRecord
{
    protected static string $resource = KategoriTokoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
