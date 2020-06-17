<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();    

Route::get('/', function () {
    return view('auth.login');
});

// "logout" is a custom middleware to prevent from login back cache in Kernel.php
Route::group(['middleware' => ['auth', 'logout']], function () {
    
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/voter', 'VoterController@index');
    Route::get('/voter/create', 'VoterController@create');
    Route::post('/voter', 'VoterController@store');
    
    Route::resource('/election', 'ElectionController');
    Route::resource('/candidate', 'CandidateController');
    Route::get('/result', 'ResultController@index');
    Route::get('/result-by-election/{id}', 'ResultController@resultByElection');
    
});


Route::get('/welcome', 'VoterDashboardController@welcome')->middleware('voter');
Route::get('/castyourvote', 'VoterDashboardController@castYourVote')->middleware('voter');
Route::post('/castyourvote', 'VoterDashboardController@store');
Route::get('/verifyyourvote', 'VoterDashboardController@verifyYourVote')->middleware('voter');
Route::post('/verifyyourvote', 'VoterDashboardController@verifyNow')->middleware('voter');


// Route::get('/voter_login', 'Auth\VoterLoginController@ShowVoterLogin');
// Route::post('/voter_login', 'Auth\VoterLoginController@VoterLogin');


// Route::get('/verify_vote', 'VoteController@index');
// Route::post('/votecheck', 'VoteController@check');
// Route::get('/vote_now', 'VoteController@create');
// Route::post('/vote', 'VoteController@store');
// Route::get('/vote_now', 'VoteController@create')->middleware('CheckElectionStatus');


// Route::get('/home', 'HomeController@index')->name('home');