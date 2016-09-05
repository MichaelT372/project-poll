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

        //if we already have this user's IP stored and linked to the poll they are trying to vote on
        //flash an error and redirect to results.
        if (Voter::where('ip_address', '=', $request->ip())->where('poll_id', '=', $poll->id)->exists()) {

            session()->flash('flash_message_confirm', [
                'title' => 'Error!',
                'message' => 'You have already vote on this poll. Your vote has not been counted.',
                'type' => 'error'
            ]);

            return redirect('poll/' . $poll->slug . '/result');

        }

        return $next($request);
    }
}
