<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VoterMail;
use App\Voter;
use App\User;
use DB;

class VoterController extends Controller
{

    public function index()
    {
        $voters = Voter::all();
        return view('admin.voter.list', compact('voters', $voters));
    }


    public function create()
    {
        $elections = DB::table('elections')->select('title', 'id')->get();
        return view('admin.voter.create', compact('elections', $elections));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'election_id' => 'required',
            'cnic' => 'required|numeric|unique:voters,cnic',
            'email' => 'required|unique:users,email',
            
        ]);

        $actual_password = Str::random('10');
        $password = Hash::make($actual_password);
            
        $user_input = [
            'role' => 'voter',
            'name' => 'voter',
            'email' => $request->input('email'),
            // 'password' => Hash::make('123456'),
            'password' => $password,
        ];
        $user = User::create($user_input);
    
        $arr1 = [
            'user_id' => $user->id,
            'election_id' => $request->election_id,
            'cnic' => $request->cnic
        ];
        $voters = Voter::create($arr1); 
        
        // $voter_email = $request->email;

        $data = [
            'password' => $actual_password,
        ];

        Mail::to($request->email)->send(new VoterMail($data));

        return redirect('/voter/create')->with('success', 'Record has been added');

    }

}
