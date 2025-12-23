<?php

namespace App\Filament\Resources\RulePageSectionResource\Pages;

use App\Filament\Resources\RulePageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRulePageSection extends EditRecord
{
    protected static string $resource = RulePageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
