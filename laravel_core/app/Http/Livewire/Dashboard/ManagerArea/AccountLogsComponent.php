<?php

namespace App\Http\Livewire\Dashboard\ManagerArea;

use App\Models\Logs;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class AccountLogsComponent extends Component
{
    public $userLogs;

    public function mount($userId) {
        $this->userLogs = Logs::where('user_id', $userId)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.manager-area.account-logs-component');
    }
}
