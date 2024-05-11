<?php

namespace App\Http\Livewire\Dashboard\Maintenance;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class FailedJobsListComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $failedJobs = DB::table('failed_jobs')->paginate(15);
        return view('livewire.dashboard.maintenance.failed-jobs-list-component',  compact('failedJobs'));
    }
}
