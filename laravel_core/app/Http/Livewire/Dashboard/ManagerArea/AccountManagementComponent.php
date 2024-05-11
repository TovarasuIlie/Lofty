<?php

namespace App\Http\Livewire\Dashboard\ManagerArea;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class AccountManagementComponent extends Component
{
    public function render()
    {
        $users = User::orderBy('role_id', 'desc')->paginate(15);
        return view('livewire.dashboard.manager-area.account-management-component', compact('users'));
    }
}
