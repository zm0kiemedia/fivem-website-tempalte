<?php

namespace App\Filament\Resources\RulePageSectionResource\Pages;

use App\Filament\Resources\RulePageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRulePageSections extends ListRecords
{
    protected static string $resource = RulePageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
