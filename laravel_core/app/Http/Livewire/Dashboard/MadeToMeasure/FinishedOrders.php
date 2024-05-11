<?php

namespace App\Http\Livewire\Dashboard\MadeToMeasure;

use App\Models\MadeToMeasure;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
#[Title('Comenzi finalizate - Lofty by Flory Cucu')]
class FinishedOrders extends Component
{
    public function render()
    {
        $orders = MadeToMeasure::where('status', 2)->paginate();
        return view('livewire.dashboard.made-to-measure.finished-orders', compact('orders'));
    }
}
