<?php

namespace App\Http\Livewire\Dashboard\Maintenance;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class ActiveJobsListComponent extends Component
{
    public $activeJobs;

    public function mount() {
        $this->activeJobs = DB::table('jobs')->get();
    }
    public function render()
    {
        return view('livewire.dashboard.maintenance.active-jobs-list-component');
    }
}
