<?php

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class LoginPage extends Component implements HasForms
{
    use InteractsWithForms;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label('Email')
                    ->translateLabel()
                    ->email()
                    ->required(),

                TextInput::make('password')
                    ->label('Password')
                    ->translateLabel()
                    ->password()
                    ->required(),
            ])
            ->columns(1);
    }

    public function render()
    {
        return view('livewire.login-page');
    }
}
