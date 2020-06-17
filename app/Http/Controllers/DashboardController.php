<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{

    public function index ()
    {
        $elections =  DB::table('elections')->count();
        $candidates =  DB::table('candidates')->count();
        $voters =  DB::table('voters')->count();
        $results =  DB::table('votes')->count();

        return view('admin.dashboard.index', compact('elections',$elections ,'candidates', $candidates,'voters', $voters, 'results', $results));
    }
}
