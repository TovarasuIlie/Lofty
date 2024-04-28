<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('dashboard_layout.app')]
class AccountManagementComponent extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.account-management-component');
    }
}
