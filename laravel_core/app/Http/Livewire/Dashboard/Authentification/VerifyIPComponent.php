<?php

namespace App\Http\Livewire\Dashboard\Authentification;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('livewire.dashboard.authentification.auth_layout.app')]
class VerifyIPComponent extends Component
{
    #[Rule('required', message: "Trebuie sa introduci in cod de 6 caractere!")]
    #[Rule('regex: /^[A-Z0-9]{6}+$/', message: "Formatul codului este invalid!")]
    public $code;

    public function verifyAccount() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.dashboard.authentification.verify-ip-component');
    }
}
