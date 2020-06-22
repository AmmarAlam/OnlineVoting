<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Auth;
use DB;

class VoterDashboardController extends Controller
{
    public function welcome()
    {
        $userId = Auth::user()->id;
        // dd($userId);

        $election = DB::table('voters')
        ->join('users', 'users.id', '=', 'voters.user_id')
        ->join('elections', 'elections.id', '=', 'voters.election_id')
        ->select('elections.title', 'elections.description')
        ->where('users.id', '=', $userId)
        ->first();
        
        $electionStatus = DB::table('voters')
        ->join('elections', 'elections.id', '=', 'voters.election_id')
        ->select('elections.status', 'elections.voting_date')
        ->where('voters.user_id', $userId)
        ->first();
        
        $voterExists = DB::table('voters')
        ->join('votes', 'voters.id', '=', 'votes.voter_id')
        ->select('votes.voter_id')
        ->where('voters.user_id', $userId)
        ->first();

        // $voter_id =  DB::table('users')
        // ->join('voters', 'users.id', '=', 'voters.user_id')
        // ->join('elections', 'elections.id', '=', 'voters.election_id')
        // ->join('votes', 'votes.election_id', '=', 'voters.election_id')
        // ->select('votes.id')
        // ->where('users.id', '=', $userId)
        // ->first();
        // dd($voter_id);

        // $electionId = DB::table('users')
        // ->join('voters', 'users.id', '=', 'voters.user_id')
        // ->select('voters.election_id')
        // ->where('voters.user_id', $userId)
        // ->first();
        // dd($electionId);
        
        // $encrypted = DB::table('votes')->select('voter_id')->where('election_id', $electionId->election_id)->first();

        // dd($encrypted);

        // $decrypted = decrypt($encrypted->voter_id);

        // dd($decrypted);

        return view('voter.welcome', compact('voterExists', 'election', 'electionStatus'));
    }

    public function castYourVote()
    {
        $userId = Auth::user()->id;

        $election =  DB::table('voters')
        ->join('users', 'users.id', '=', 'voters.user_id')
        ->join('elections', 'elections.id', '=', 'voters.election_id')
        ->select('elections.id', 'elections.title')
        ->where('users.id', '=', $userId)
        ->first();  
        
        $candidates = DB::table('voters')
        ->join('users', 'users.id', '=', 'voters.user_id')
        ->join('candidates', 'candidates.election_id', '=', 'voters.election_id')
        ->select('candidates.id', 'candidates.name', 'candidates.description')
        ->where('users.id', '=', $userId)
        ->orderBy('id', 'asc')
        ->get();

        $voterExists = DB::table('voters')
        ->join('votes', 'voters.id', '=', 'votes.voter_id')
        ->select('votes.voter_id')
        ->where('voters.user_id', $userId)
        ->first();

        if(!$voterExists)
        {
            return view('voter.vote_now', compact('election', 'candidates'));
        }
        else{
            return redirect('/welcome');
        }
    }

    public function store(Request $request)
    { 
        $userId = Auth::user()->id;
        $voterId = DB::table('voters')->select('id')->where('user_id', $userId)->first();

        $vote = [
            'election_id' => $request->election_id,
            'candidate_id' => $request->candidate_id,
            'voter_id' => $voterId->id
            // 'voter_id' => encrypt($voter_id->id)
        ];

        DB::table('votes')->insert($vote);

        return redirect('/welcome');
    }

    public function verifyYourVote()
    {
        $userId = Auth::user()->id;

        $election =  DB::table('voters')
        ->join('users', 'users.id', '=', 'voters.user_id')
        ->join('elections', 'elections.id', '=', 'voters.election_id')
        ->select('elections.title')
        ->where('users.id', '=', $userId)
        ->first();  
        
        return view('voter.verify_vote', compact('election'));
    }

    public function verifyNow(Request $request)
    {
        $userId = Auth::user()->id;

        $candidateName = DB::table('voters')
        ->join('votes', 'voters.id', '=', 'votes.voter_id')
        ->join('users', 'users.id', '=', 'voters.user_id')
        ->join('candidates', 'candidates.id', '=', 'votes.candidate_id')
        ->select('candidates.name', 'voters.cnic')
        // ->where('voters.cnic', $request->cnic)
        ->where('users.id', $userId)
        ->first();

        $cnicConfirm = $request->input('cnic') == $candidateName->cnic;

        return view('voter.verify_done', compact('candidateName', 'cnicConfirm'));

    }
}
