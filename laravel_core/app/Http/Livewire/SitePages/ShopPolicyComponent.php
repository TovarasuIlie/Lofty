<?php

namespace App\Http\Livewire\SitePages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Politica magazinului - Lofty by Flory Cucu')]
#[Layout('livewire.site-pages.main_layout.app')]
class ShopPolicyComponent extends Component
{
    public function render()
    {
        return view('livewire.site-pages.shop-policy-component');
    }
}
