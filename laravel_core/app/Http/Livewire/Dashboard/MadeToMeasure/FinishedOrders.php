<?php

namespace App\Http\Livewire\Dashboard\MadeToMeasure;

use App\Models\MadeToMeasure;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class FinishedOrders extends Component
{
    public $orders;

    public function mount() {
        $this->orders = MadeToMeasure::where('status', 2)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.made-to-measure.finished-orders');
    }
}
