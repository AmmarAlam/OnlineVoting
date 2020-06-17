@extends('layouts.voter.voter_template')

@section('title', 'Voter | Welcome')

@section('main-content')
  
    <div style="min-height:100%;margin-left:0;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
          </div>
        </div>
        <div class="content-body">
          <section id="basic-form-layouts">
            <div class="row match-height">
              <div class="col-md-12">
                <div class="card" style="background:none;box-shadow:none;border:none;">
                  <div class="card-body collapse in">
                  <div class="card-block">
                    <div class="mb-0" style="background-color: #1E90FF;text-align: center;height: 170px;padding-top: 55px;border-top-left-radius: 30px;border-top-right-radius: 30px;">
                      <h2 class="white"><i class="fas fa-bullhorn" style="font-size:30px;color:yellow;"></i>&nbsp;&nbsp;Welcome !</h2>
                      <h4 class="white text-bold-400 mt-2">{{$election->title}}</h4>
                    </div>
                    <div class="p-3" style="border:1px solid;border-top:none;background:#fff;">
                      <p class="font-medium-2">Hello Voter !</p>
                      @if($electionStatus->status == '1')
                        @if (!$voterExists)
                        <p class="font-medium-1">{{$election->description}}</p>
                        <a href="{{url('/castyourvote')}}" class="btn btn-info mt-2">Cast your vote</a>
                        {{-- @elseif($election->status == '0') --}}
                        {{-- <p class="font-medium-1">Voting session will start on {{$election->voting_date}}</p> --}}
                        @else
                        <p class="font-medium-1">You have been casted your vote</p>
                        <a href="{{url('/verifyyourvote')}}" class="btn btn-info mt-2">Verify your vote</a>
                        @endif
                      @else
                        <p class="font-medium-1">Voting session has been end</p>
                      @endif

                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
@endsection