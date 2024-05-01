<?php

namespace App\Http\Livewire\Dashboard\MadeToMeasure;

use App\Models\MadeToMeasure;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class ViewOrder extends Component
{
    public MadeToMeasure $order;

    public function deleteOrder() {
        if($this->order->delete()) {
            return $this->redirect('/dashboard/made-to-measure/comenzi-noi', navigate: true);
        }
    }

    public function setFinishedOrderStatus() {
        $this->order->update(['status' => 2]);
        $this->dispatch('alert', type: 'success', title: 'Statusul comnezi a fost modificat in "Comanda Finalizata"!');
    }

    public function setOrderTakenStatus() {
        $this->order->update(['status' => 1]);
        $this->dispatch('alert', type: 'success', title: 'Statusul comnezi a fost modificat in "Comanda Preluata"!');
    }

    public function setNewOrderStatus() {
        $this->order->update(['status' => 0]);
        $this->dispatch('alert', type: 'success', title: 'Statusul comnezi a fost modificat in "In Proces"!');
    }

    public function render()
    {
        return view('livewire.dashboard.made-to-measure.view-order')->title('Vizualizare Comanda #'.$this->order->id.' - Lofty by Flory Cucu');
    }
}
