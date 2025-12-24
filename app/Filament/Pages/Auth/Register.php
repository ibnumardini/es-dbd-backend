<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Auth\Pages\Register as BaseRegister;

class Register extends BaseRegister
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                DatePicker::make('date_of_birth')
                    ->label('Date Of Birth')
                    ->required()
                    ->maxDate(now()),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    protected function handleRegistration(array $data): \Illuminate\Database\Eloquent\Model
    {
        $user = parent::handleRegistration($data);

        $user->assignRole(\App\Models\User::ROLE_USER);

        return $user;
    }
}
