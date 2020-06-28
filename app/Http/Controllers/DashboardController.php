<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Charts\Voting;

class DashboardController extends Controller
{

    public function index ()
    {
        $elections =  DB::table('elections')->count();
        $candidates =  DB::table('candidates')->count();
        $voters =  DB::table('voters')->count();
        $results =  DB::table('votes')->count();


        // Charts
        // $chart = DB::table('votes')->select('id')->get()->dd();
//         $resultByElection = DB::table('candidates')
//         ->join('elections', 'elections.id', '=', 'candidates.election_id')
//         ->join('votes', 'candidates.id', '=', 'votes.candidate_id')
//         ->pluck('candidates.name', 'votes.candidate_id')
//                 // DB::raw('COUNT(votes.candidate_id) as totalVotes'
//         ->where('elections.id', 17)
//         ->groupBy('candidates.name')
//         ->get();

        // $label = [];
        // $dataset = [];

        // foreach ($resultByElection as $key => $value) {
        //     # code...
        // }

        // $chart = new Voting;

        // $chart->labels();
        // $chart->dataset('Candidates', 'bar', );

        return view('admin.dashboard.index', compact('elections','candidates','voters', 'results'));
    }
}
