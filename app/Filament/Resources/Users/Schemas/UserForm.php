<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create')
                    ->confirmed(),
                TextInput::make('password_confirmation')
                    ->label('Password Confirmation')
                    ->password()
                    ->dehydrated(false),
                DatePicker::make('date_of_birth')
                    ->label('Date Of Birth')
                    ->required()
                    ->maxDate(now()),
            ]);
    }
}
