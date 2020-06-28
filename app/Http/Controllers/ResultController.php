<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use DB;
use App\Candidate;

class ResultController extends Controller
{
    public function index()
    {
        $viewResults = DB::table('votes')
        ->join('elections', 'elections.id', '=', 'votes.election_id')
        ->select('elections.id',
                 'elections.title',
                 DB::raw('COUNT(votes.candidate_id) as total_votes'))
        ->groupBy('elections.id', 'elections.title')
        ->get();

        return view('admin.result.list', compact('viewResults'));
    }

    public function resultByElection($id)
    {
        
        $resultByElection = DB::table('candidates')
        ->join('elections', 'elections.id', '=', 'candidates.election_id')
        ->join('votes', 'candidates.id', '=', 'votes.candidate_id')
        ->select('candidates.name',
                DB::raw('COUNT(votes.candidate_id) as totalVotes'))
        ->where('elections.id', $id)
        ->groupBy('candidates.name')
        ->get();

        $electionTitle = DB::table('candidates')
        ->join('elections', 'elections.id', '=', 'candidates.election_id')
        ->select('elections.title')
        ->where('elections.id', $id)
        ->first();

        // $election = DB::table('candidates')->wheredont

        // $electionId = DB::table('elections')->where('id', $id)->first();

        // $candi = Candidate::doesntHave('votes')->where('election_id', $id)->get()->dd();

        // $candidates = Candidate::whereDoesntHave('votes', function (Builder $query) {
        //     $query->where('id', $id)
        //     ->select('id')
        //     ->groupBy('id');
        // })->get()->dd();

        // $candidates = DB::table('candidates')
        // ->join('votes', 'candidates.id', '=', 'votes.candidate_id')
        // ->join('elections', 'elections.id', '=', 'votes.election_id')
        // ->select('candidates.id' ,'candidates.name')
        // ->whereNotExists('elections.id', $id)
        // ->groupBy('candidates.id' ,'candidates.name')
        // ->get()
        // ->dd();

        // $election = DB::table('elections')->where('id', $id)->first();
        // $candidates = DB::table('candidates')
        // ->join('elections', 'elections.id', '=', 'candidates.election_id')
        // ->select('elections.id', 'candidates.id', 'candidates.name')
        //     ->whereNotExists(function($query) use ($election) {
        //         $query->select(DB::raw(1))
        //             ->from('votes')
        //             ->whereRaw('votes.candidate_id = candidates.id')
        //             ->where('votes.election_id', '=', 'elections'.$election->id);
        //    })->groupBy('elections.id', 'candidates.id', 'candidates.name')
        //    ->get()->dd();
        
            // $candidate = DB::table('candidates')
            // ->join('elections', 'elections.id', '=', 'candidates.election_id')
            // ->join('votes', 'votes.candidate_id', '=', 'candidates.id')
            // ->select('elections.id', DB::raw('COUNT(votes.candidate_id) as totalVotes'))
            // ->where('elections.id', $id)
            // ->groupBy('elections.id')
            // ->get()->dd();

        // $getElectionTitle = $resultByElection->addSelect('elections.title')->get();

        // dd($resultByElection);

        return view('admin.result.resultByElection', compact('resultByElection', 'electionTitle'));
    }


}
