@extends('layouts.voter.voter_template')

@section('title', 'Voter')

@section('main-content')
  
    <div style="min-height:100%;margin-left:0;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Verify your vote</h2>
          </div>
        </div>
        @include('layouts.message')
        <div class="content-body">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-xs-12 mt-1 mb-3">
                    {{-- <h4>Select your Candidate</h4> --}}
                    <hr>
                </div>
            </div>
            <h3 class="mb-3">{{$election->title}}</h3>
                <form action="{{url('/verifyyourvote')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xs-4 mt-1 mb-3">
                            <input type="text" name="cnic" class="form-control" autocomplete=off>
                            {{-- <h4>Your vote for {{$candidateName->name}}</h4> --}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Verify Now</button>
                </form>
        </section>
        </div>
      </div>
    </div>
@endsection