<?php

namespace App\Http\Livewire\Dashboard\Authentification;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('livewire.dashboard.authentification.auth_layout.app')]
class ResetPasswordDashboard extends Component
{
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

    public function resetPassword() {
        $this->validate();

        if(PasswordReset::where('email', $this->email)->where('token', $this->token)->first()) {
            User::where('email', $this->email)->update(['password' => Hash::make($this->password)]);
            PasswordReset::where('email', $this->email)->delete();
            return $this->redirect('/', navigate: true);
        } else {
            request()->session()->flash('failed', 'Pe acest email nu s-a trimis nici un link de resetare a parolei.');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.authentification.reset-password');
    }
}
