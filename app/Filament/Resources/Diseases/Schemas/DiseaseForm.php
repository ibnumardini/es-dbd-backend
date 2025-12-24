<?php

namespace App\Filament\Resources\Diseases\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;

class DiseaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
