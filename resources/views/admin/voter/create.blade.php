@extends('layouts.template')

@section('title', 'Voter | Create')

@section('main-content')
  
    <div style="min-height:100%;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Voter</h2>
          </div>
        </div>
        @include('layouts.message')
        <div class="content-body">
          <section id="basic-form-layouts">
            <div class="row match-height">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Add Voter</h4>
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
                      <form class="form" action="{{url('/voter')}}" method="post">
                      @csrf
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <div class="form-body">
                              
                              <div class="form-group">
                                <label>Election For <span class="red">*</span></label>
                                <select name="election_id" class="form-control">
                                  <option value="none" selected disabled>--Select Election For--</option>
                                    @foreach ($elections as $election)
                                      <option value="{{$election->id}}">{{$election->title}}</option>        
                                    @endforeach
                                </select>
                                @if($errors->has('election_id'))
                                    <small class="red">{{ $errors->first('election_id')}}</small>
                                @endif
                              </div>

                              <div class="form-group">
                                <label>CNIC (without dash)<span class="red">*</span></label>
                                <input type="text" name="cnic" class="form-control" value="{{old('cnic')}}">
                                @if($errors->has('cnic'))
                                    <small class="red">{{ $errors->first('cnic')}}</small>
                                @endif
                              </div>

                              <div class="form-group">
                                <label>Email<span class="red">*</span></label>
                                <input type="email" name="email" class="form-control" autocomplete="off" value="{{old('email')}}">
                                @if($errors->has('email'))
                                    <small class="red">{{ $errors->first('email')}}</small>
                                @endif
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="form-actions center">
                          <button type="button" class="btn btn-warning mr-1">
                            <i class="icon-cross2"></i> Cancel
                          </button>
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

