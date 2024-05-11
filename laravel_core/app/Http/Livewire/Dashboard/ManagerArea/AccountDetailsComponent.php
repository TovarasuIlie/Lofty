<?php

namespace App\Http\Livewire\Dashboard\ManagerArea;

use App\Jobs\SendResetLinkJob;
use App\Models\PasswordReset;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

#[Layout('livewire.dashboard.dashboard_layout.app')]
class AccountDetailsComponent extends Component
{
    public User $user;

    public $roleId;

    #[Rule('required|regex: /[A-Za-z] [A-Za-z]/')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|ip')]
    public $ip;

    public function editUser() {
        if(count($this->getErrorBag()) == 0) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'ip' => $this->ip
            ]);
            $this->dispatch('alert', type: 'success', title: 'Datele au fost editate cu succes!');
        } else {
            $this->dispatch('alert', type: 'error', title: 'Date incorecte, incearca sa fi mai atent!');
            $this->validate();
        }
    }

    public function changeRole() {
        if($this->roleId > 0) {
            if(auth()->user()->id == $this->user->id) {
                $this->dispatch('alert', type: 'error', title: 'Nu poti sa iti setezi rolul singur!');
            } else {
                if(auth()->user()->role_id <= $this->roleId) {
                    $this->dispatch('alert', type: 'error', title: 'Nu poti sa setezi un rol mai mare sau egal cu cel pe care il detii.');
                } else {
                    $this->user->update(['role_id' => $this->roleId]);
                    $this->dispatch('toast', type: 'success', title: 'Rolul a fost actualizat cu succes!');
                }
            }
        } else {
            $this->dispatch('alert', type: 'error', title: 'Trebuie sa alegi un rol dintre cele disponibile!');
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
                SendResetLinkJob::dispatch($details)->onQueue('send-reset-link-email');
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
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->ip = $this->user->ip;
        return view('livewire.dashboard.manager-area.account-details-component')->title('Vizualizare cont '.$this->user->name." - Lofty by Flory Cucu");
    }
}
