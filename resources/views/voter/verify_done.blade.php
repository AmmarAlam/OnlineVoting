@extends('layouts.voter.voter_template')

@section('title', 'Voter')

@section('main-content')
  
    <div style="min-height:100%;margin-left:0;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">vote verification</h2>
          </div>
        </div>
        @include('layouts.message')
        <div class="content-body">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-xs-12 mt-1 mb-3">
                </div>
            </div>
            {{-- <h3 class="mb-3">{{$election->title}}</h3> --}}
                <div class="row">
                    <div class="col-xs-4 mt-1 mb-3">
                    @if($cnicConfirm)
                        <h4>Your vote for {{$candidateName->name}}</h4>
                    @else
                        <h4>Your cnic does not match</h4>
                    @endif
                    </div>
                </div>
        </section>
        </div>
      </div>
    </div>
    
@endsection