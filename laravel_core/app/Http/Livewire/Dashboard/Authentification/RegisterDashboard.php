<?php

namespace App\Http\Livewire\Dashboard\Authentification;

use App\Models\CreateAccountLink;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('livewire.dashboard.authentification.auth_layout.app')]
class RegisterDashboard extends Component
{
    #[Rule('required', message: "<b>Numele</b> si <b>Prenumele</b> trebuie completate!")]
    #[Rule('max:255', message: "<b>Numele</b> si <b>Prenumele</b> nu trebuie sa fie mai lung de :max!")]
    #[Rule('regex: /[A-Za-z] [A-Za-z]/', message: "<b>Numele</b> si <b>Prenumele</b> este invalid.")]
    public $name;

    #[Rule('required', message: "<b>Adresa de email</b> trebuie completata!")]
    #[Rule('max:255', message: "<b>Email-ul</b> nu trebuie sa fie mai lung de :max!")]
    public $email;

    #[Rule('required', message: "<b>Parola</b> trebuie completata!")]
    #[Rule('max:255', message: "<b>Parola</b> nu trebuie sa fie mai lunga de :max!")]
    #[Rule('min:1', message: "<b>Parola</b> trebuie sa fie mai lunga de :min!")]
    #[Rule('regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', message: "<b>Parola</b> trebuie sa contina litere mari, mici, numere si caractere speciale.")]
    public $password;

    #[Rule('required', message: "<b>Confirma Parola</b> trebuie completata!")]
    #[Rule('same:password', message: "<b>Confirma Parola</b> trebuie sa fie acceasi ca si <b>Parola</b>.")]
    public $confirmPassword;

    public $token;

    public function register() {
        $this->validate();
        
        if(CreateAccountLink::verifyEmail($this->email, $this->token)) {
            $newAccount = [
                'name'      => $this->name,
                'email'     => $this->email,
                'ip'        => Request::ip(),
                'password'  => Hash::make($this->password),
            ];
            if(User::create($newAccount)) {
                CreateAccountLink::deleteToken($this->email, $this->token);
                return $this->redirect('/', navigate: true);
            } else {
                request()->session()->flash('failed', 'A aparut o eroare, te rugam sa reincerci');
            }
        } else {
            request()->session()->flash('failed', 'Pe acest email nu s-a trimis nici un link de inregistrare!');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.authentification.register-dashboard');
    }
}
