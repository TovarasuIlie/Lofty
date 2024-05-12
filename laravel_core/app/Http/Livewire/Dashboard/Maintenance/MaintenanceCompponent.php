<?php

namespace App\Http\Livewire\Dashboard\Maintenance;

use App\Models\MadeToMeasure;
use App\Models\Settings;
use App\Models\VisitorsTracker;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class MaintenanceCompponent extends Component
{
    public $activeJobs;
    public $failedJobs;

    public $newOrders;
    public $takenOrders;
    public $finishedOrders;
    public $visitsTracker;

    public $settings;

    public function mount() {
        $this->activeJobs = DB::table('jobs')->count();
        $this->failedJobs = DB::table('failed_jobs')->count();
        $this->newOrders = MadeToMeasure::where('status', 0)->count();
        $this->takenOrders = MadeToMeasure::where('status', 1)->count();
        $this->finishedOrders = MadeToMeasure::where('status', 2)->count();
        $this->visitsTracker = VisitorsTracker::whereBetween('visited_at', [Carbon::now()->addDays(-30)->format('Y-m-d H:i:s'), Carbon::now()->format('Y-m-d H:i:s')])->count();
        $this->settings = Settings::first();
    }

    public function toggleMadeToMeasure() {
        Settings::first()->update(['made_to_measure_closed' => !$this->settings->made_to_measure_closed]);
        if(!$this->settings->made_to_measure_closed) {
            $this->dispatch('toast', type: 'success', title: 'Placement of orders has been closed!');
        } else {
            $this->dispatch('toast', type: 'success', title: 'Placement of orders has been opened!');
        }
        $this->settings = Settings::first();
    }

    public function render()
    {
        return view('livewire.dashboard.maintenance.maintenance-compponent');
    }
}
