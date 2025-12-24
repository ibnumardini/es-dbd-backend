<?php

namespace App\Filament\Resources\MedicalRecords\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MedicalRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.code')
                    ->label('Patient Code')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Patient Name')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('diagnosed_disease_name')
                    ->label('Diagnosed Disease')
                    ->getStateUsing(fn($record) => $record->getDiagnosedDiseaseName())
                    ->badge()
                    ->color(fn($state) => str_starts_with($state, 'F -') ? 'danger' : 'success')
                    ->limit(50),
                TextColumn::make('created_at')
                    ->label('Checkup At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->groups([
                'user.code',
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
