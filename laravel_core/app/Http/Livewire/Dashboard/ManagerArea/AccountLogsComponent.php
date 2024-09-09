<?php

namespace App\Http\Livewire\Dashboard\ManagerArea;

use App\Models\Logs;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('livewire.dashboard.dashboard_layout.app')]
#[Title('Actiuni recente - Lofty by Flory Cucu') ]
class AccountLogsComponent extends Component
{
    use WithPagination;
    public $id;
    public function mount($userId) {
        $this->id = $userId;
    }

    public function render()
    {
        $userLogs = Logs::where('user_id', $this->id)->orderBy('id', 'DESC')->paginate(100);
        return view('livewire.dashboard.manager-area.account-logs-component', compact("userLogs"));
    }
}
