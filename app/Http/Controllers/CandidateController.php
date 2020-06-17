<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use DB;


class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('admin.candidate.list', compact('candidates', $candidates));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elections = DB::table('elections')->select('title', 'id')->get();
        return view('admin.candidate.create', compact('elections', $elections));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'election_id' => 'required'
        ]);

        $candidate = new Candidate;

        $candidate->name = $request->input('name');
        $candidate->description = $request->input('description');
        $candidate->election_id = $request->input('election_id');

        $candidate->save();

        return redirect('/candidate/create')->with('success', 'Record has been added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $elections = DB::table('elections')->select('title', 'id')->get();
        return view('admin.candidate.edit', compact('candidate', $candidate, 'elections', $elections));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'election_id' => 'required'
        ]);

        $candidate->name = $request->name;
        $candidate->description = $request->description;
        $candidate->election_id = $request->election_id;

        $candidate->save();

        session()->flash('update', 'Record has been updated');
        return redirect('/candidate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        session()->flash('delete', 'Record has been deleted');
        return redirect('/candidate');
    }
}
