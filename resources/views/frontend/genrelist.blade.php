@extends('layouts.frontend')
@section('title','Movie World | Genrelist Page')
@section('content')

<!-- Main Class Start -->
<div class="main" id="main">
      <!-- Start Sub Header Section -->
      <div class="sub-header">
          <div class="container-fluid">
              <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                          <h2 class="Page-title">Comedy</h2>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-home"></i>
                                  <a href="{{url('/')}}">Home</a>
                                  <i class="fa fa-angle-right"></i>
                              </li>
                              <li><a href="#">genres</a></li>
                          </ol>
                      </nav>
                      <!-- Breadcrumb End -->
                  </div>
                  <!-- Col End -->
              </div>
              <!-- Row End -->
          </div>
          <!-- Container end -->
      </div>
      <!-- Sub Header Section End -->
      <!-- Start Main Content -->
      <section class="hollywood-movies">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="block-title">Comedy Movies</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($movies as $movie)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="video-block">
                            <div class="video-thumb position-relative thumb-overlay">
                                <a href="#"><img class="img-fluid" src="{{asset('storage/'.$movie->photo)}}" alt=""></a>
                                <div class="box-content">
                                    <ul class="icon">
                                        <li><a href="watch-movie.html"><i class="fas fa-play"></i></a></li>
                                        <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                        <li><a href="{{route('moviedetail', $movie->id)}}"><i class="fas fa-info"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Box Content End -->
                            </div>
                            <!-- Video Thumb End -->
                            <div class="video-content">
                                <h2 class="video-title"><a href="movie-single.html">{{$movie->name}}</a></h2>
                                <div class="video-info d-flex align-items-center">
                                    <span class="video-year">{{$movie->year}}</span>
                                    <span class="video-age">{{$movie->duration}}</span>
                                    <span class="video-type">Action</span>
                                </div>
                            </div>
                            <!-- video Content End -->
                        </div>
                        <!-- video Block End -->
                    </div>
                    @endforeach
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </section>
      <!-- Main Content End -->
      
      <!-- To Top Button Start-->
      <div class="back-to-top-btn">
          <div class="back-to-top" style="display: block;">
              <a aria-hidden="true" class="fas fa-angle-up" href="#"></a>
          </div>
      </div>
      <!-- To Top Button End -->
</div>
  <!-- Main Class End -->

@endsection