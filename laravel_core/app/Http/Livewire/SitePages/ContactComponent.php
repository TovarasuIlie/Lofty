<?php

namespace App\Http\Livewire\SitePages;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Title('Contact - Lofty by Flory Cucu')]
#[Layout('livewire.site-pages.main_layout.app')]
class ContactComponent extends Component
{
    #[Rule('required', message: '<b>Numele</b> trebuie completat obligatoriu.')]
    #[Rule('min:3', message: '<b>Numele</b> trebuie sa fie mai lung de :min caractere.')]
    public $firstName = '';

    #[Rule('required', message: '<b>Prenumele</b> trebuie completat obligatoriu.')]
    #[Rule('min:3', message: '<b>Prenumele</b> trebuie sa fie mai lung de :min caractere.')]
    public $lastName;

    #[Rule('required', message: '<b>Adresa de email</b> trebuie completat obligatoriu.')]
    #[Rule('email', message: '<b>Adresa de email</b> trebuie sa fie una valida.')]
    public $email;

    #[Rule('required', message: '<b>Mesajul</b> trebuie completat obligatoriu.')]
    #[Rule('min:10', message: '<b>Mesajul</b> trebuie sa fie mai lung de :min caractere.')]
    public $message;

    public function sendMessage() {
        $this->validate();
        $message = [
            'fullname'  => $this->firstName." ".$this->lastName,
            'email'     => $this->email,
            'ip'        => FacadesRequest::ip(),
            'message'   => $this->message
        ];

        if(ContactMessage::create($message)) {
            $this->reset(['firstName', 'lastName', 'email', 'message']);
            request()->session()->flash('success', 'Mesajul a fost trimis cu success! Te vom contacta pe email.');
        } else {
            request()->session()->flash('failed', 'A aparut o eroare. Te rugam sa incerci mai tarziu.');
        }
    }

    public function render()
    {
        return view('livewire.site-pages.contact-component');
    }
}
