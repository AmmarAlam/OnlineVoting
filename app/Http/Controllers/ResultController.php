<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

        $election = DB::table('elections')->where('id', $id)->first();
        // dd($election_data);
        $candidates = DB::table('candidates')
        ->select('candidates.id', 'candidates.name')
            ->whereNotExists(function($query) use ($election) {
                $query->select(DB::raw(1))
                    ->from('votes')
                    ->whereRaw('votes.candidate_id = candidates.id')
                    ->where('votes.election_id', '=', $election->id);
           })
           ->get();
            dd($candidates);
        
        // $getElectionTitle = $resultByElection->addSelect('elections.title')->get();

        // dd($resultByElection);

        return view('admin.result.resultByElection', compact('resultByElection', 'electionTitle'));
    }


}
