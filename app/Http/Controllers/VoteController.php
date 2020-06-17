<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Voter;

class VoteController extends Controller
{
    

    public function index()
    {
        return view('admin.vote.verify');
    }

    public function check(Request $request)
    {

        $this->validate($request, [
            'cnic' => 'required|numeric|min:13',
        ]);

        $electionStatus = DB::table('elections')
        ->join('voters', 'elections.id', '=', 'voters.election_id')
        ->where('voters.cnic', $request->cnic)
        ->select('elections.status')
        ->first();
        // dd($electionStatus);

        $checkVoterExist = DB::table('voters')->where('cnic', $request->cnic)->first();
        // dd($checkVoterExist);

        $checkVoteCaster = DB::table('voters')
        ->join('votes', 'voters.id', '=', 'votes.voter_id')
        ->where('voters.cnic', $request->cnic)
        ->select('votes.voter_id')
        ->first();
        // dd($checkVoteCaster);

        
        if($checkVoterExist){
            if(!$checkVoteCaster){
                if($electionStatus == "0"){
                
                    return redirect('/vote_now');
                }
                else{
                    return redirect('/verify_vote')->with('fail', 'Voting session has been ended');
                }
            }
            else{
                return redirect('/verify_vote')->with('fail', 'You are already cast your vote');
            }
            
        }
        else{
            return redirect('/verify_vote')->with('fail', 'You are not in voter list');
        }

    }

    public function create()
    {
        return view('admin.vote.create');
    }

    public function store(Request $request)
    {
        
    }

}
