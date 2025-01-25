<?php

namespace App\Filament\Resources\SumselResource\Pages;

use App\Filament\Resources\SumselResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSumsels extends ListRecords
{
    protected static string $resource = SumselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
