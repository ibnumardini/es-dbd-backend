<?php

namespace App\Filament\Resources\MedicalRecords\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class MedicalRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->default(auth()->id())
                    ->hidden(!auth()->user()->isAdmin())
                    ->dehydrated(),
                Repeater::make('userSymptoms')
                    ->relationship()
                    ->schema([
                        Select::make('symptom_id')
                            ->label('Symptom')
                            ->relationship('symptom', 'name')
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->code} - {$record->name}")
                            ->searchable()
                            ->preload()
                            ->required()
                            ->distinct()
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->addActionLabel('Add Symptom')
                    ->required(),
            ]);
    }
}
