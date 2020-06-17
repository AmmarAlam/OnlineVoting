@extends('layouts.template')

@section('title', 'Election | List')

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
                    <h4 class="card-title" id="basic-layout-form-center">Election List</h4>
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
                      <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                            <th>Title</th>
                            <th>Voting Date</th>
                            <th>Description</th>
                            <th>Options</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach ($elections as $election)
                        <tr>
                          <td>{{$election->title}}</td>
                          <td>{{$election->voting_date}}</td>
                          <td>{{$election->description}}</td>
                          <td>
                            <a href="{{url('/election/'.$election->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      </table>

                      <!-- Modal -->
                      <div class="modal fade text-xs-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel4">Delete</h4>
                          </div>
                          <div class="modal-body">
                            <p>Do you want to delete record?</p>
                          </div>
                          <div class="modal-footer">
                            <form action="{{url('/election/'.$election->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Yes</button>
                              <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                            </form>
                          </div>
                        </div>
                        </div>
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
