<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffMembersModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;

class LocationChangeController extends Controller
{
    public function viewPage() {
        if(session()->has('id') && session()->has('email')) {
            $staffMembersModel = new StaffMembersModel();
            $locked = $staffMembersModel->select('locked')->where('id', session()->get('id'))->first()['locked'];
            if(!$locked) {
                if(!session()->has('tries'))
                    session()->put('tries', 3);
                session()->put('locked', 0);
            } else {
                session()->forget('tries');
                session()->put('locked', 1);
            }
            return view('dashboard/account/verify-account-page'); 
        } else {
            return redirect()->to('/dashboard/logare');
        }
    }

    public function verifyAccount(Request $request) {
        $staffMembersModel = new StaffMembersModel();
        $member = $staffMembersModel->select('PIN','locked')->where('email', session()->get('email'))->where('id', session()->get('id'))->first();
        if(!$member['locked']) {
            $PIN = $request->input('PIN');
            if(password_verify($PIN, $member['PIN'])) {
                $usersModel = new UsersModel();
                $usersModel->where('id', session()->get('id'))->where('email', session()->get('email'))->update(['ip' => session()->get('ip')]);
                DB::table('logs')->insert([
                    'idStaff' => session()->get('id'),
                    'logText' => '<b>'.session()->get('fullname').' ('.session()->get('email').')</b> s-a conectat cu succes cu IP-ul <b>'.session()->get('ip').'</b>, din <b>'.(3 - session()->get('tries')).' incercari</b>.'
                ]);
                session()->forget('tries');
                return redirect()->to('/dashboard');
            } else {
                if(session()->get('tries') > 0) {
                    session()->decrement('tries');
                    return redirect()->back();
                } else {
                    session()->put('locked', 1);
                    session()->forget('tries');
                    $staffMembersModel->where('id', session()->get('id'))->where('email', session()->get('email'))->update(['locked' => 1]);
                    return redirect()->to('/dashboard/verificare');
                }
            }
        } else {
            session()->put('locked', 1);
            return redirect()->to('/dashboard/verificare');
        }
    }
}
