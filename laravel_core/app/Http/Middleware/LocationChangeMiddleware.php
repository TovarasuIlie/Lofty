<?php

namespace App\Http\Middleware;

use App\Jobs\SendVerificationCodeJob;
use App\Models\UserRole;
use App\Models\VerifyCode;
use Illuminate\Support\Str;
use Closure;
use Illuminate\Http\Request;

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
        if(auth()->user()->role_id >= UserRole::ADMIN) {
            if(auth()->user()->ip != $request->ip()) {
                if(!VerifyCode::where('id', auth()->user()->id)->first()) {
                    $code = strtoupper(Str::random(6));
                    $codeDetails = [
                        'id'    => auth()->user()->id,
                        'code'  => $code
                    ];
                    if(VerifyCode::create($codeDetails)) {
                        $verificationCode = [
                            'email'     => auth()->user()->email,
                            'content'   => [
                                'name'      => auth()->user()->name,
                                'code'      => $code,
                                'subject'   => 'Cod verificare cont.'
                            ]
                        ];
                        SendVerificationCodeJob::dispatch($verificationCode)->onQueue('send-verification-code-email');
                    }
                }
                return redirect()->to('/dashboard/logare/verificare-cont');
            }
        }
        return $next($request);
    }
}
