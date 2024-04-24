<?php

namespace App\Http\Controllers;

use App\Models\CreateAccountLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function login(Request $request) {
        $rules = [
            'email'     => 'required',
            'password'  => 'required'
        ];

        $customMessage = [
            'required'  => '<i class="fas fa-exclamation-triangle"></i> Este necesar sa completati campul <b>:attribute</b>.',
        ];

        $attributes = [
            'email'     => '<b>Email</b>',
            'password'  => '<b>Parola</b>'
        ];

        $request->validate($rules, $customMessage, $attributes);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->to('/dashboard')->with('success', 'Te-ai autentificat cu succes!');
        }
        return redirect()->back()->withErrors('Email-ul sau parola sunt gresite!');
    }

    public function logout() {
        Auth::logout();
        return redirect()->to('/')->with('success', 'Te-ai delogat cu succes!');
    }

    public function register(Request $request) {
        $rules = [
            'email'             => 'required|email|max:50|unique:users,email',
            'name'              => 'required|max:50',
            'password'          => ['required', 'max:255', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'confirm-password'  => 'required|same:password',
            'PIN'               => 'required|digits:4',
            'confirm-PIN'       => 'required|same:PIN'
        ];

        $customMessage = [
            'required'  => '<i class="fas fa-exclamation-triangle"></i> Este necesar sa completati campul <b>:attribute</b>.',
            'email'     => '<i class="fas fa-exclamation-triangle"></i> Email-ul introdus nu este unul valid!',
            'unique'    => '<i class="fas fa-exclamation-triangle"></i> Acest email a fost inregistrat deja!',
            'regex'     => '<i class="fas fa-exclamation-triangle"></i> <b>:attribute</b> trebuie ca contina litere mari, litere mici, numere, si caractere speciale!',
            'max'       => '<i class="fas fa-exclamation-triangle"></i> In campul <b>:attribute</b> nu poti introduce mau mult de <b>:max</b> caractere!',
            'min'       => '<i class="fas fa-exclamation-triangle"></i> <b>:attribute</b> trebuie sa fie mai lunga de <b>:min</b> caractere!',
            'same'      => '<i class="fas fa-exclamation-triangle"></i> Campul <b>:attribute</b> trebuie sa se potriveaza cu <b>:other</b>!',
            'digits'    => '<i class="fas fa-exclamation-triangle"></i> Campul <b>:attribute</b> trebuie sa contina 4 cifre!'
        ];

        $customFieldsName = [
            'email'             => '<b>Email</b>',
            'fullname'          => '<b>Nume Complet</b>',
            'password'          => '<b>Parola</b>',
            'confirm-password'  => '<b>Confirma Parola</b>',
            'PIN'               => '<b>PIN</b>',
            'confirm-PIN'       => '<b>Confirma PIN</b>',
        ];

        $request->validate($rules, $customMessage ,$customFieldsName);
        $newAccount = [
            'name'      => $request->name,
            'email'     => $request->email,
            'ip'        => $request->ip(),
            'password'  => Hash::make($request->password),
            'PIN'       => Hash::make($request->PIN)
        ];
        if(User::create($newAccount)) {
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)) {
                CreateAccountLink::deleteToken($request->email, session()->get('token'));
                return redirect()->to('/dashboard')->with('success', 'Contul a fost creat cu succes!');
            }
        }
        return redirect()->back()->with('error', 'A aparut o eroare, te rugam sa incerci mai tarziu!');
    }
}
