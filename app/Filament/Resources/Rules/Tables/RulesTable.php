<?php

namespace App\Filament\Resources\Rules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;

class RulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('disease.name')
                    ->label('Disease')
                    ->formatStateUsing(fn ($record) => "{$record->disease->code} - {$record->disease->name}")
                    ->sortable()
                    ->searchable()
                    ->limit(50),
                TextColumn::make('symptom.name')
                    ->label('Symptom')
                    ->formatStateUsing(fn ($record) => "{$record->symptom->code} - {$record->symptom->name}")
                    ->sortable()
                    ->searchable()
                    ->limit(50),
                TextColumn::make('logical_operator')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'AND' : 'OR')
                    ->badge()
                    ->color(fn (bool $state): string => $state ? 'success' : 'warning'),
            ])
            ->groups([
                Group::make('code')
                    ->label('Code')
                    ->collapsible(),
            ])
            ->defaultGroup('code')
            ->filters([
                //
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
