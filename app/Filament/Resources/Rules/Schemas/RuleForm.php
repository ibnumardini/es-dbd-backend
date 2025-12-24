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
                    ->label('Rule Code')
                    ->options([
                        'R1' => 'R1',
                        'R2' => 'R2',
                        'R3' => 'R3',
                        'R4' => 'R4',
                    ])
                    ->required(),
                Select::make('disease_id')
                    ->label('Disease')
                    ->relationship('disease', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('symptom_id')
                    ->label('Symptom')
                    ->relationship('symptom', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
