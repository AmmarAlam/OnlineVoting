<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Voter;

class CheckElectionStatus
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
        // $checkElectionStatus = DB::table('voters')->select('cnic', $request)->first();
        $voter = DB::table('voters')->where('cnic', $request->cnic)->first();
        if($voter){

            return redirect('/vote_now');
        }
        elseif($voter)
        {
            return redirect('/verify_vote')->with('fail', 'You are not in voter list');
        }
        else{
            return redirect('/verify_vote');
        }

        
        return $next($request);
    }
}
