@extends('layouts.template')

@section('title', 'Election | Edit')

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
                    <h4 class="card-title" id="basic-layout-form-center">Edit Election</h4>
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
                      <form class="form" action="{{url('/election/'.$election->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <div class="form-body">
                              <div class="form-group">
                              <label>Title</label>
                              <input type="text" name="title" class="form-control" value="{{$election->title}}">
                              </div>
                            <div class="form-group">
                              <label>Voting Date</label>
                              <input type="text" name="voting_date" class="form-control" value="{{$election->voting_date}}">
                            </div>
                            <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="form-control">
                                <option value="0" {{$election->status == 0 ? 'selected':''}}>Stop session</option>
                                <option value="1" {{$election->status == 1 ? 'selected':''}}>Start session</option>
                                <option value="2" {{$election->status == 2 ? 'selected':''}}>Voting date</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Description</label>
                              <textarea type="text" name="description" class="form-control" rows="5">{{$election->description}}</textarea>
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