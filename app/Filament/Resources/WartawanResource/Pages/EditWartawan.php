<?php

namespace App\Filament\Resources\WartawanResource\Pages;

use App\Filament\Resources\WartawanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWartawan extends EditRecord
{
    protected static string $resource = WartawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Sama dengan yg CreateWartawan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
