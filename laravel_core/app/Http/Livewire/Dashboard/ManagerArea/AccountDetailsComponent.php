<?php

namespace App\Http\Livewire\Dashboard\ManagerArea;

use App\Jobs\SendResetLinkJob;
use App\Models\PasswordReset;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class AccountDetailsComponent extends Component
{
    public User $user;

    public $roleId;

    public function changeRole() {
        if(auth()->user()->id == $this->user->id) {
            $this->dispatch('alert', type: 'error', title: 'Nu poti sa iti setezi rolul singur!');
        } else {
            $this->user->update(['role_id' => $this->roleId]);
            $this->dispatch('toast', type: 'success', title: 'Rolul a fost actualizat cu succes!');
        }
    }

    public function deleteUser() {
        if(auth()->user()->id == $this->user->id) {
            $this->dispatch('alert', type: 'error', title: 'Nu poti sa iti stergi contul singur!');
        } else {
            if($this->user->delete()) {
                return $this->redirect('/dashboard/conturi/gestionare-conturi', navigate: true);
            } else {
                $this->dispatch('alert', type: 'error', title: 'A aparut o eroare, te rugam sa reincerci!');
            }
        }
    }

    public function sendResetPasswordLink() {
        if(!PasswordReset::where('email', $this->user->email)->first()) {
            $token = Str::random(255);
            $generatedLink = [
                'email'         => $this->user->email,
                'token'         => $token
            ];
            if(PasswordReset::create($generatedLink)) {
                $details = [
                    'email'     => $this->user->email,
                    'content'   => [
                        'name'      => $this->user->name,
                        'link'      => asset('dashboard/reseteaza-parola/'.$token),
                        'subject'   => 'Reseteaza parola cont.'
                    ]
                ];
                SendResetLinkJob::dispatch($details);
                $this->dispatch('toast', type: 'success', title: 'Link-ul a fost trimis cu succes!');
            } else {
                $this->dispatch('alert', type: 'error', title: 'A aparut o eroare, te rugam sa reincerci!');
            }
        } else {
            $this->dispatch('alert', type: 'error', title: 'A fost trimis deja un link!');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.manager-area.account-details-component')->title('Vizualizare cont '.$this->user->name." - Lofty by Flory Cucu");
    }
}
