@extends('layouts.voter.voter_template')

@section('title', 'Voter')

@section('main-content')
  
    <div style="min-height:100%;margin-left:0;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Cast your vote</h2>
          </div>
        </div>
        @include('layouts.message')
        <div class="content-body">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-xs-12 mt-1 mb-3">
                    <h4>Select your Candidate</h4>
                    <hr>
                </div>
            </div>
            <h3 class="mb-3">{{$election->title}}</h3>
                <form action="{{url('/castyourvote')}}" method="post">
                @csrf
                <div class="row">
                <input type="hidden" name="election_id" value="{{$election->id}}">
                @foreach ($candidates as $candidate)
                    <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h4>{{$candidate->name}}</h4>
                                            <span>{{$candidate->description}}</span>
                                        </div><br>
                                        <div class="media-left">
                                            <label class="display-inline-block custom-control custom-radio ml-1">
                                                <input type="radio" name="candidate_id" class="custom-control-input" value="{{$candidate->id}}">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description ml-0">Vote Me</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-info">Vote Now</button>
            </form>
        </section>
        </div>
      </div>
    </div>
@endsection