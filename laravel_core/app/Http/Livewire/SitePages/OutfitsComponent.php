<?php

namespace App\Http\Livewire\SitePages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Contact - Lofty by Flory Cucu')]
#[Layout('livewire.site-pages.main_layout.app')]
class OutfitsComponent extends Component
{
    public function render()
    {
        return view('livewire.site-pages.outfits-component');
    }
}
