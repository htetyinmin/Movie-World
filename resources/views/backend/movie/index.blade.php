@extends('layouts.backend')
@section('content')

<!-- Sidebar Navigation end-->
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Movies Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Movie      </li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{route('movie.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
          </div>
      <!-- Breadcrumb-->
      <section class="no-padding-top">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="block">
                <div class="title"><strong>Movies Data Table</strong></div>
                <div class="table-responsive"> 
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Cover</th>
                        <th>Year</th>
                        <th>Language</th>
                        <th>Duration</th>
                        {{-- <td>Overview</td> --}}
                        {{-- <th>Trailer</th> --}}
                        {{-- <th>Gallery</th> --}}
                        {{-- <th>Video</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>End Game</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/mv-it1.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>2019</td>
                        <td>English</td>
                        <td>2hr 30min</td>
                        <td>Free</td>
                        <td>
                              <a href="#" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Fast & Furious 9</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/mv-it2.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>2020</td>
                        <td>English</td>
                        <td>2hr 30min</td>
                        <td>Premium</td>
                        <td>
                              <a href="#" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>IT II</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/mv-it7.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>2021</td>
                        <td>Korea</td>
                        <td>2hr 30min</td>
                        <td>Premium</td>
                        <td>
                              <a href="#" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

@endsection