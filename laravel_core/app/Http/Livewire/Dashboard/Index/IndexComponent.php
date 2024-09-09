<?php

namespace App\Http\Livewire\Dashboard\Index;

use App\Models\MadeToMeasure;
use App\Models\User;
use App\Models\Visits;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Carbon\CarbonInterface;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class IndexComponent extends Component
{
    public $todayNewOrders;
    public $newOrders;

    public $todayTakenOrders;
    public $takenOrders;

    public $todayFinishedOrders;
    public $finishedOrders;

    public $visits;
    public $onlineUsers;

    public function mount() {
        $this->todayNewOrders = MadeToMeasure::whereRaw('DATE(created_at) = CURRENT_DATE()')->where('status', 0)->count();
        $this->newOrders = MadeToMeasure::where('status', 0)->count();

        $this->todayTakenOrders = MadeToMeasure::whereRaw('DATE(created_at) = CURRENT_DATE()')->where('status', 1)->count();
        $this->takenOrders = MadeToMeasure::where('status', 1)->count();

        $this->todayFinishedOrders = MadeToMeasure::whereRaw('DATE(created_at) = CURRENT_DATE()')->where('status', 2)->count();
        $this->finishedOrders = MadeToMeasure::where('status', 2)->count();

        $this->visits = json_decode(Visits::select('report_day', 'total_visits')->whereBetween('report_day', [Carbon::now()->addDays(-30)->format('Y-m-d'), Carbon::now()->format('Y-m-d')])->get());

        $this->onlineUsers = User::select("name", "role_id", "logged_at")->join("online_users", "users.id", "=", "online_users.user_id")->orderBy('role_id', "DESC")->get();
    }

    public function render()
    {
        return view('livewire.dashboard.index.index-component');
    }
}
