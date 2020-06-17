@extends('layouts.template')

@section('title', 'Dashboard')

@section('main-content')

    <div style="min-height:100%;" class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <!-- stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="pink">{{$elections}}</h3>
                                    <span>Elections</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="teal">{{$candidates}}</h3>
                                    <span>Candidates</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="deep-orange">{{$voters}}</h3>
                                    <span>Voters</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-user1 deep-orange font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="cyan">{{$results}}</h3>
                                    <span>Results</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-diagram cyan font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!--/ stats -->
        {{-- <div class="row">
            <div class="col-xl-4">
                <input type="text" class="form-contorl"> 
            </div>
        </div> --}}
          <div class="row">
              <div class="col-xl-12 col-lg-12">
                  <div class="card">
                    <div id="chartdiv"><input type="text" class="form-contorl"></div>
                  </div>
              </div>
          </div>
        </div>
          </div>
        </div>

@endsection