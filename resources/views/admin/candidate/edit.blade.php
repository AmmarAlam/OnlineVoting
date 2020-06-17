@extends('layouts.template')

@section('title', 'Candidate | Edit')

@section('main-content')
  
    <div style="min-height:100%;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Candidate</h2>
          </div>
        </div>
        @include('layouts.message')
        <div class="content-body">
          <section id="basic-form-layouts">
            <div class="row match-height">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Edit Candidate</h4>
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
                      <form class="form" action="{{url('/candidate/'.$candidate->id)}}" method="post">
                      @csrf
                      @method('PUT')
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <div class="form-body">
                              <div class="form-group">
                                <label>Name <span class="red">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{$candidate->name}}">
                                @if($errors->has('name'))
                                    <small class="red">{{ $errors->first('name')}}</small>
                                @endif
                              </div>

                              <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="form-control">{{$candidate->description}}</textarea>
                                @if($errors->has('description'))
                                    <small class="red">{{ $errors->first('description')}}</small>
                                @endif
                              </div>

                             <div class="form-group">
                                <label>Election For</label>
                                <select name="election_id" class="form-control">
                                  @foreach ($elections as $election)
                                    <option value="{{$election->id}}" {{ $election->id == $candidate->election_id ? 'selected' : '' }}>{{$election->title}}</option>
                                  @endforeach
                                </select>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="form-actions center">
                          <button type="submit" class="btn btn-primary">
                            <i class="icon-check2"></i> Save Changes
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







