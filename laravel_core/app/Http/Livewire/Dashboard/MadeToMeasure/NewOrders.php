<?php

namespace App\Http\Livewire\Dashboard\MadeToMeasure;

use App\Models\MadeToMeasure;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
#[Title('Comenzi noi - Lofty by Flory Cucu')]
class NewOrders extends Component
{
    public function render()
    {
        $orders = MadeToMeasure::where('status', '<', 2)->orderBy('status', 'desc')->paginate();
        return view('livewire.dashboard.made-to-measure.new-orders', compact('orders'));
    }
}
