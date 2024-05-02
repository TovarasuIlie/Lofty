<?php

namespace App\Http\Livewire\Dashboard\Maintenance;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class FailedJobComponent extends Component
{
    public $uuid;
    public $failedJob;

    public function mount() {
        $this->failedJob = DB::table('failed_jobs')->where('uuid', $this->uuid)->first();
        $this->failedJob->payload = json_decode($this->failedJob->payload);
    }

    public function retryJob() {
        if(Artisan::call('queue:retry '.$this->uuid)) {
            return $this->redirect('/dashboard/maintenace/failed-jobs', navigate:true);
        }
        $this->dispatch('toast', type:'error', message: "This job dosen't pushed into queue.");
    }

    public function deleteFailedJob() {
        Artisan::call('queue:forget '.$this->uuid);
        return $this->redirect('/dashboard/maintenace/failed-job', navigate:true);
    }

    public function render()
    {
        return view('livewire.dashboard.maintenance.failed-job-component');
    }
}
