<?php

namespace App\Http\Livewire\Dashboard\Maintenance;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class MaintenanceCompponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.maintenance.maintenance-compponent');
    }
}
