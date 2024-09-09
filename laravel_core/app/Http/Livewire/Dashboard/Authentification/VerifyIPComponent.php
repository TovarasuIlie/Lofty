<?php

namespace App\Http\Livewire\Dashboard\Authentification;

use App\Models\IPLog;
use App\Models\Logs;
use App\Models\User;
use App\Models\VerifyCode;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('livewire.dashboard.authentification.auth_layout.app')]
class VerifyIPComponent extends Component
{
    #[Rule('required', message: "Trebuie sa introduci in cod de 6 caractere!")]
    #[Rule('regex: /^[A-Z0-9]{6}+$/', message: "Formatul codului este invalid!")]
    public $code;

    public function verifyAccount() {
        $this->validate();
        if(VerifyCode::where('id', auth()->user()->id)->where('code', $this->code)->first()) {
            $log = [
                'user_id'   => auth()->user()->id,
                'ip'        => Request::ip(),
                'text'      => "Administratorul <b>".auth()->user()->email."</b> i-a fost actualizat IP-ul. (".auth()->user()->ip." => ".Request::ip().")"
            ];
            Logs::create($log);
            User::where('id', auth()->user()->id)->update(['attemps' => 0, 'ip' => Request::ip()]);
            IPLog::create([
                'user_id' => auth()->user()->id,
                'ip' => Request::ip()
            ]);
            VerifyCode::where('id', auth()->user()->id)->delete();
            return $this->redirect('/dashboard', navigate: true);
        } else {
            if(User::where('id', auth()->user()->id)->where('attemps', '<', 3)->first()) {
                User::where('id', auth()->user()->id)->increment('attemps');
                $log = [
                    'user_id'   => auth()->user()->id,
                    'ip'        => Request::ip(),
                    'text'      => "Administratorul <b>".auth()->user()->email."</b> a gresit de <b>".auth()->user()->attempts."/3</b> incercari esuate pentru schimbarea IP-ului."
                ];
                Logs::create($log);
                request()->session()->flash('failed', 'Codul introdus nu este cel corect!');
            } else {
                User::where('id', auth()->user()->id)->update(['lock_account' => 1]);
                $log = [
                    'user_id'   => auth()->user()->id,
                    'ip'        => Request::ip(),
                    'text'      => "Administratorului <b>".auth()->user()->email."</b> i-a fost blocat contul din cauza incercarilor multiple de a actualiza IP-ul."
                ];
                Logs::create($log);
                request()->session()->flash('failed', 'Din cauza incercarilor multiple, contul a fost blocat. Te rugam sa contactezi un Manager pentru ati debloca contul!');
            }
        }
    }

    public function render()
    {
        return view('livewire.dashboard.authentification.verify-ip-component');
    }
}
