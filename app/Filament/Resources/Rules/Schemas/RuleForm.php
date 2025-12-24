<?php

namespace App\Filament\Resources\Rules\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\Select;


class RuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('code')
                    ->options([
                        'R1' => 'R1',
                        'R2' => 'R2',
                        'R3' => 'R3',
                        'R4' => 'R4',
                    ])
                    ->required(),
                Select::make('disease_id')
                    ->relationship('disease', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('symptom_id')
                    ->relationship('symptom', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('logical_operator')
                    ->options([
                        1 => 'AND',
                        0 => 'OR',
                    ])
                    ->required()
                    ->default(1),
            ]);
    }
}
