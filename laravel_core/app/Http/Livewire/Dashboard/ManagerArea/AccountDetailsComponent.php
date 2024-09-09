<?php

namespace App\Http\Livewire\Dashboard\ManagerArea;

use App\Jobs\SendResetLinkJob;
use App\Models\Logs;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
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
            $log = array(
                [
                    'user_id'   => $this->user->id,
                    'ip'        => "-",
                    'text'      => "<b>".$this->user->name."</b> i-a fost editate datele de catre administratorul <b>".auth()->user()->name."</b>."
                ],
                [
                    'user_id'   => auth()->user()->id,
                    'ip'        => Request::ip(),
                    'text'      => "Administratorul <b>".auth()->user()->name."</b> a editat contului <b>".$this->user->email."</b>."
                ]
            );
            Logs::insert($log);
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
                    $log = array(
                        [
                            'user_id'   => $this->user->id,
                            'ip'        => "-",
                            'text'      => "<b>".$this->user->name."</b> i-a fost setat rolul de catre administratorul <b>".auth()->user()->name."</b>. (RoleID:<b>".$this->user->role_id."</b> => <b>".$this->roleId."</b>)."
                        ],
                        [
                            'user_id'   => auth()->user()->id,
                            'ip'        => Request::ip(),
                            'text'      => "Administratorul <b>".auth()->user()->name."</b> a setat rolul contului <b>".$this->user->email."</b>. (RoleID:<b>".$this->user->role_id."</b> => <b>".$this->roleId."</b>)."
                        ]
                    );
                    Logs::insert($log);
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
                $log = [
                    'user_id'   => auth()->user()->id,
                    'ip'        => Request::ip(),
                    'text'      => "Administratorul <b>".auth()->user()->name."</b> a sters contul <b>".$this->user->email." (SQLID:".$this->user->id.")</b>."
                ];
                Logs::create($log);
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
                $log = array(
                    [
                        'user_id'   => $this->user->id,
                        'ip'        => "-",
                        'text'      => "<b>".$this->user->name."</b> i-a trimis un link de resetare a parolei de catre administratorul <b>".auth()->user()->name."</b>."
                    ],
                    [
                        'user_id'   => auth()->user()->id,
                        'ip'        => Request::ip(),
                        'text'      => "Administratorul <b>".auth()->user()->name."</b> a trimis un link de resetare a parolei pentru contul <b>".$this->user->email."</b>."
                    ]
                );
                Logs::create($log);
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
