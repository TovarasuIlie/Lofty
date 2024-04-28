<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('dashboard_layout.app')]
class AccountDetailsComponent extends Component
{
    public User $user;
    public function render()
    {
        return view('livewire.account-details-component')->title('Vizualizare cont '.$this->user->name." - Lofty by Flory Cucu");
    }
}
