<?php

namespace App\Http\Livewire\SitePages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Design Vestimentar - Lofty by Flory Cucu')]
#[Layout('livewire.site-pages.main_layout.app')]
class FashionDesignComponent extends Component
{
    public function render()
    {
        return view('livewire.site-pages.fashion-design-component');
    }
}
