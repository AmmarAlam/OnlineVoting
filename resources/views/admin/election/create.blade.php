@extends('layouts.template')

@section('title', 'Election | Create')

@section('main-content')
  
    <div style="min-height:100%;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Election</h2>
          </div>
        </div>
        @include('layouts.message')
        <div class="content-body">
          <section id="basic-form-layouts">
            <div class="row match-height">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Add Election</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body collapse in">
                    <div class="card-block">
                      <form class="form" action="{{url('/election')}}" method="post">
                      @csrf
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <div class="form-body">
                              <div class="form-group">
                                <label>Title <span class="red">*</span></label>
                                <input type="text" name="title" class="form-control">
                                @if($errors->has('title'))
                                    <small class="red">{{ $errors->first('title')}}</small>
                                @endif
                              </div>

                              <div class="form-group">
                                <label>Voting Date</label>
                                <input type="text" name="voting_date" class="form-control datepicker" autocomplete='off' placeholder="dd/mm/yyyy">
                              </div>
                              
                              <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="form-control"></textarea>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="form-actions center">
                          <button type="submit" class="btn btn-primary">
                            <i class="icon-check2"></i> Save
                          </button>
                        </div>
                      </form>	
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







{{-- @extends('layouts.main')

@section('title', 'Vote | Create')

@section('main-content')

<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="h5 mt-3">Add Vote</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
<br>

<div class="container">
  <div class="row">
    <div class="col-12">
    @include('layouts.message')
    </div>
  </div>
  <div class="row">
    <div class="col-5">
      <form action="{{url('/election')}}" method="post">
      @csrf
        <div class="form-group">
          <label>Title <span class='text-danger'>*</span></label>
          <input type="text" name="title" class="form-control">
          @if($errors->has('title'))
              <small class="text-danger">{{ $errors->first('title')}}</small>
          @endif
        </div>
        <div class="form-group">
          <label>Num of Votes <span class='text-danger'>*</span></label>
          <input type="text" name="num_of_votes" class="form-control">
          @if($errors->has('num_of_votes'))
              <small class="text-danger">{{ $errors->first('num_of_votes')}}</small>
          @endif
        </div>
        <div class="form-group">
          <label>Voting Date</label>
          <input type="text" class="form-control datepicker" name="voting_date" placeholder="dd/mm/yyyy"><span class="input-group-addon">
          <i class="glyphicon glyphicon-th"></i></span>
        </div>

        <div class="form-group">
          <label>Description</label>
          <textarea type="text" name="description" class="form-control" rows="5"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
</div>
</main>

@endsection --}}