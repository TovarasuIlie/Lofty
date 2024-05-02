<?php

namespace App\Http\Middleware;

use App\Models\VisitorsTracker;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(VisitorsTracker::where('ip', $request->ip())->whereRaw('visited_at = CURRENT_DATE()')->count() == 0) {
            VisitorsTracker::create([
                'ip' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'visited_at' => Carbon::now()->format('Y-m-d')
            ]);
        }
        return $next($request);
    }
}
