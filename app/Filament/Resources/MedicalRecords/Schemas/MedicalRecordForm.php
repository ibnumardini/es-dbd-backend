<?php

namespace App\Filament\Resources\MedicalRecords\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MedicalRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Information')
                    ->schema([
                        TextEntry::make('patient_code')
                            ->label('Patient Code')
                            ->state(fn($record) => $record?->user?->code ?? '-'),
                        TextEntry::make('patient_age')
                            ->label('Age')
                            ->state(fn($record) => $record?->user?->age ? $record->user->age . ' years' : '-'),
                        TextEntry::make('diagnosed_disease')
                            ->label('Diagnosed Disease')
                            ->state(fn($record) => $record?->getDiagnosedDiseaseName() ?? '-')
                            ->badge()
                            ->color(fn($state) => str_starts_with($state, 'F -') ? 'danger' : 'success'),
                        TextEntry::make('checkup_at')
                            ->label('Checkup At')
                            ->state(fn($record) => $record?->created_at?->format('d M Y H:i') ?? '-'),
                    ])
                    ->columns(4)
                    ->columnSpanFull()
                    ->visible(fn($record) => $record !== null),
                Select::make('user_id')
                    ->label('Patient')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->default(auth()->id())
                    ->hidden(!auth()->user()->isAdmin())
                    ->columnSpanFull()
                    ->dehydrated(),
                Repeater::make('userSymptoms')
                    ->label('User Symptoms')
                    ->relationship()
                    ->schema([
                        Select::make('symptom_id')
                            ->label('Symptom')
                            ->relationship('symptom', 'name')
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->code} - {$record->name}")
                            ->searchable()
                            ->preload()
                            ->required()
                            ->distinct()
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->addActionLabel('Add Symptom')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
