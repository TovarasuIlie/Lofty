<?php

namespace App\Http\Livewire\SitePages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Atelierele de croitorie pentru copii - Lofty by Flory Cucu')]
#[Layout('livewire.site-pages.main_layout.app')]
class TailoringWorkshopComponent extends Component
{
    public function render()
    {
        return view('livewire.site-pages.tailoring-workshop-component');
    }
}
