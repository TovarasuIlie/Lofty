<?php

namespace App\Http\Livewire\Dashboard\ManagerArea;

use App\Jobs\SendLinkOnEmailJob;
use App\Models\CreateAccountLink;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('livewire.dashboard.dashboard_layout.app')]
#[Title('Generare Link - Lofty by Flory Cucu') ]
class GenerateLinkComponent extends Component
{
    #[Rule('required', message: "<b>Email-ul</b> este obligatoriu!")]
    #[Rule('email', message: "<b>Email-ul</b> este invalid!")]
    #[Rule('unique:create_account_links', message: "Deja a fost trimis un link pe acest email.")]
    public $email;
    public $createdLinks;

    public function generateLink() {
        $this->validate();

        if(!User::where('email', $this->email)->first()) {
            $token = Str::random(255);
            $generatedLink = [
                'email'         => $this->email,
                'token'         => $token,
                'generated_by'  => auth()->user()->name.'('.auth()->user()->email.')',
                'expiration_at' => Carbon::now()->addMinutes(10)->format("Y-m-d H:i:s")
            ];
            if(CreateAccountLink::create($generatedLink)) {
                $details = [
                    'email'     => $this->email,
                    'content'   => [
                        'link'      => asset('dashboard/inregistrare/'.$token),
                        'subject'   => 'Link-ul pentru inregistrare contului.'
                    ]
                ];
                SendLinkOnEmailJob::dispatch($details);
                $this->reset(['email']);
                request()->session()->flash('success', 'Link-ul a fost trimis cu succes!');
            }
        } else {
            request()->session()->flash('error', 'Acest email este deja asignat unui administrator!');
        }
    }

    public function deleteLink($id) {
        if(CreateAccountLink::destroy($id)) {
            request()->session()->flash('success', 'Token a fost sters cu succes!');
        } else {
            request()->session()->flash('error', 'Token-ul nu mai exista sau a fost sters deja!');
        }
    }

    public function render()
    {
        $this->createdLinks = CreateAccountLink::all();
        return view('livewire.dashboard.manager-area.generate-link-component');
    }
}
