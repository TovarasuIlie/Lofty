<?php

namespace App\Http\Livewire\Dashboard\Contact;

use App\Models\ContactMessage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class ContactComponent extends Component
{
    public function render()
    {
        $messages = ContactMessage::orderBy('send_at', 'desc')->paginate();
        return view('livewire.dashboard.contact.contact-component', compact('messages'));
    }
}
