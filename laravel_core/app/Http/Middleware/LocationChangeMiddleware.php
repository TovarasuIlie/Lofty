<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use App\Models\StaffMembersModel;

class LocationChangeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('id') != 1) {
            if(session()->get('locked')) {
                return redirect()->to('dashboard/verificare');
            } else {
                $usersModel = new UsersModel();
                $ip = $usersModel->select('ip')->where('id', session()->get('id'))->first()['ip'];
                if(session()->get('ip') != $ip) {
                    session()->put('tries', 3);
                    return redirect()->to('dashboard/verificare');
                }
            }
        }
        return $next($request);
    }
}
