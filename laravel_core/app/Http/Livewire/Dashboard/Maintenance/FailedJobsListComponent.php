<?php

namespace App\Http\Livewire\Dashboard\Maintenance;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class FailedJobsListComponent extends Component
{
    public $failedJobs;

    public function mount() {
        $this->failedJobs = DB::table('failed_jobs')->orderBy('id', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.dashboard.maintenance.failed-jobs-list-component');
    }
}
