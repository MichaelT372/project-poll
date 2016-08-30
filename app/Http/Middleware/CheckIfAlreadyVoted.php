<?php

namespace App\Http\Middleware;

use Closure;
use App\Voter;
use App\Option;


class CheckIfAlreadyVoted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $poll = Option::findOrFail($request->input('option'))->poll;

        if (Voter::where('ip_address', '=', $request->ip())->where('poll_id', '=', $poll->id)->exists()) {
            return redirect('poll/' . $poll->slug . '/result');
        }

        return $next($request);
    }
}
