<?php

namespace App\Filament\Widgets;

use App\Models\Disease;
use App\Models\MedicalRecord;
use App\Models\Symptom;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return [
                Stat::make('Total Patients', User::count())
                    ->description('Registered patients in the system')
                    ->descriptionIcon('heroicon-m-users')
                    ->color('primary'),
                Stat::make('Medical Records', MedicalRecord::count())
                    ->description('Total checkup sessions performed')
                    ->descriptionIcon('heroicon-m-clipboard-document-list')
                    ->color('success'),
                Stat::make('Diseases', Disease::count())
                    ->description('Master data diseases')
                    ->descriptionIcon('heroicon-m-bug-ant')
                    ->color('warning'),
                Stat::make('Symptoms', Symptom::count())
                    ->description('Master data symptoms')
                    ->descriptionIcon('heroicon-m-eye')
                    ->color('info'),
            ];
        }

        return [
            Stat::make('My Medical Records', MedicalRecord::where('user_id', $user->id)->count())
                ->description('Total checkup sessions you performed')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('success'),
        ];
    }
}
