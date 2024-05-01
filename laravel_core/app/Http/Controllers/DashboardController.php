<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect()->to('/')->with('success', 'Te-ai delogat cu succes!');
    }
}
