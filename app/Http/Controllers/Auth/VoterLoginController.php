<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use Auth;
use Session;
use Redirect;
use App\Voter;

class VoterLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/voter_dashboard';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function ShowVoterLogin()
    {
        return view('auth.voter_login');
    }

    public function VoterLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('voter')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('voter')->voter();
            dd($user);
            // return redirect('/voter_dashboard');
        }else{
                echo 'Invalid credentials';
            // return back()->with('error','your username and password are wrong.');
        }

        // $request->validate([
        //     'email' => 'required|unique:email',
        //     'password' => 'required'
        // ]);

        // $emailPassword = Voter::where(['email' => $request->email, 'AND', 'password' => $request->password])->select('email', 'password')->first();
        
        // if ($emailPassword)
        // {
            //     return redirect('/voter_dashboard');
        // } 
        // else {
            //     // Session()->flash('message', "Invalid Credentials , Please try again." );
            //     echo 'Invalid credentials';
            //     return redirect('/voter_login');
        // }

    }

    public function logout()
    {
        
    }
}
