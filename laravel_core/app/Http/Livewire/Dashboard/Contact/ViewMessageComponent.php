<?php

namespace App\Http\Livewire\Dashboard\Contact;

use App\Models\ContactMessage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class ViewMessageComponent extends Component
{
    public ContactMessage $message;

    public function render()
    {
        return view('livewire.dashboard.contact.view-message-component');
    }
}
