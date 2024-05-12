<?php

namespace App\Http\Livewire\Dashboard\Maintenance;

use App\Models\VisitorsTracker;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class VisitsTrackerComponent extends Component
{
    public function render()
    {
        $visitorsTracker = VisitorsTracker::paginate(10);
        return view('livewire.dashboard.maintenance.visits-tracker-component', compact('visitorsTracker'));
    }
}
