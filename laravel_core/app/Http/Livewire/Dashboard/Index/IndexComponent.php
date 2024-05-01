<?php

namespace App\Http\Livewire\Dashboard\Index;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class IndexComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index.index-component');
    }
}
