<?php

namespace App\Http\Livewire\Dashboard\Authentification;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.dashboard.authentification.auth_layout.app')]
#[Title('Autentificare Dashboard - Lofty by Flory Cucu')]
class LoginDashboard extends Component
{
    #[Rule('required', message: "<b>Adresa de email</b> este obligatorie.")]
    #[Rule('email', message: "<b>Adresa de email</b> este una invalida.")]
    public $email;

    #[Rule('required', message: "<b>Parola</b> este obligatorie.")]
    public $password;

    public function login() {
        $this->validate();

        $credentials = [
            'email'     => $this->email,
            'password'  => $this->password
        ];

        if(Auth::attempt($credentials)) {
            return $this->redirect('/dashboard', navigate: true);
        } else {
            request()->session()->flash('failed', '<b>Email-ul</b> sau <b>Parola</b> sunt incorecte!');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.authentification.login-dashboard');
    }
}
