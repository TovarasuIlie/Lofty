<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function logout() {
        UserActivity::where('user_id', Auth::user()->id)->delete();
        Auth::logout();
        Cookie::queue(Cookie::forget("user-logged"));
        return redirect()->to('/')->with('success', 'Te-ai delogat cu succes!');
    }
}
