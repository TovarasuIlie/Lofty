<?php

namespace App\Http\Livewire\SitePages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Lofty by Flory Cucu - Tinute create special pentru tine')]
#[Layout('livewire.site-pages.main_layout.app')]
class IndexComponent extends Component
{
    public function render()
    {
        return view('livewire.site-pages.index-page');
    }
}
