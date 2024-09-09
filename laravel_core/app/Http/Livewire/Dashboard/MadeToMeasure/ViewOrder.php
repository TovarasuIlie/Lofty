<?php

namespace App\Http\Livewire\Dashboard\MadeToMeasure;

use App\Models\Logs;
use App\Models\MadeToMeasure;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class ViewOrder extends Component
{
    public MadeToMeasure $order;

    public function deleteOrder() {
        if($this->order->delete()) {
            $log = [
                'user_id'   => auth()->user()->id,
                'ip'        => Request::ip(),
                'text'      => 'Administratorul <b>'.auth()->user()->name.'</b> a sters comanda cu ID <b>'.$this->order->id.'</b>.'
            ];
            Logs::create($log);
            return $this->redirect('/dashboard/made-to-measure/comenzi-noi', navigate: true);
        }
    }

    public function setFinishedOrderStatus() {
        $this->order->update(['status' => 2]);
        $log = [
            'user_id'   => auth()->user()->id,
            'ip'        => Request::ip(),
            'text'      => 'Administratorul <b>'.auth()->user()->name.'</b> a schimbat statusul comenzi cu ID <a href="/made-to-measure/comanda/'.$this->order->id.'" class="text-decoration-none">'.$this->order->id.'</a> in <div class="badge bg-success">Comanda finalizata</div>'
        ];
        Logs::create($log);
        $this->dispatch('alert', type: 'success', title: 'Statusul comnezi a fost modificat in "Comanda Finalizata"!');
    }

    public function setOrderTakenStatus() {
        $this->order->update(['status' => 1]);
        $log = [
            'user_id'   => auth()->user()->id,
            'ip'        => Request::ip(),
            'text'      => 'Administratorul <b>'.auth()->user()->name.'</b> a schimbat statusul comenzi cu ID <a href="/made-to-measure/comanda/'.$this->order->id.'" class="text-decoration-none">'.$this->order->id.'</a> in <div class="badge bg-info">Comanda preluata</div>'
        ];
        Logs::create($log);
        $this->dispatch('alert', type: 'success', title: 'Statusul comnezi a fost modificat in "Comanda Preluata"!');
    }

    public function setNewOrderStatus() {
        $this->order->update(['status' => 0]);
        $log = [
            'user_id'   => auth()->user()->id,
            'ip'        => Request::ip(),
            'text'      => 'Administratorul <b>'.auth()->user()->name.'</b> a schimbat statusul comenzi cu ID <a href="/made-to-measure/comanda/'.$this->order->id.'" class="text-decoration-none">'.$this->order->id.'</a> in <div class="badge bg-danger">Comanda noua</div>'
        ];
        Logs::create($log);
        $this->dispatch('alert', type: 'success', title: 'Statusul comnezi a fost modificat in "Comanda noua"!');
    }

    public function render()
    {
        return view('livewire.dashboard.made-to-measure.view-order')->title('Vizualizare Comanda #'.$this->order->id.' - Lofty by Flory Cucu');
    }
}
