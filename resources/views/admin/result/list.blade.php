@extends('layouts.template')

@section('title', 'Results | List')

@section('main-content')
  
    <div style="min-height:100%;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Results</h2>
          </div>
        </div>
        @include('layouts.message')
        <div class="content-body">
          <section id="basic-form-layouts">
            <div class="row match-height">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Result list</h4>
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
                            <th>Election Title</th>
                            <th>Total No of Votes</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($viewResults as $vr)
                            <tr>
                              <td>
                                <a href="{{url('/result-by-election/'.$vr->id)}}">{{$vr->title}}</a>
                              </td>
                              {{-- <td>{{$vr->title}}</td> --}}
                              <td style="text-align:right;">{{$vr->total_votes}}</td>
                            </tr>
                          @endforeach
                      </tbody>
                      </table>
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
