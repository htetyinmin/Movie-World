@extends('layouts.frontend')
@section('title','Movie World | Search Page')
@section('content')

<!-- Start Swiper Slider -->
{{-- <div class="swiper-container loading">
    <div class="swiper-wrapper">
        @foreach ($lastmovies as $lastmovie)

        @php 
            $images = json_decode($lastmovie->gallery)
        @endphp
        <div class="swiper-slide swiper-bg" style="background-image:url({{asset('storage/'.$images[0])}})">
            <img src="{{asset('storage/'.$lastmovie->photo)}}" class="entity-img" alt="">
            <div class="top-badge">
                <div class="video-badge">
                    <img class="img-fluid" src="{{asset('frontend_assets/images/top-movies.png')}}" alt="">
                </div>
            </div>
            <div class="content">
                <p class="title" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7">{{$lastmovie->name}}</p>
                <span class="caption mb-4" data-swiper-parallax="-20%">{{$lastmovie->overview}}</span>
                <div class="slider-buttons d-flex align-items-center" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7">
                    <a @if(Auth::user()) href="{{route('watchmovie', $lastmovie->id)}}" @else href="route('login')" @endif class="btn hvr-sweep-to-right"  tabindex="0"><i class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                    <a href="#" class="btn hvr-sweep-to-right ml-3" tabindex="0"><i class="fas fa-plus mr-2"></i>My List</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Swiper Wrapper -->
    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
    <!-- navigation buttons -->
</div> --}}
<!-- End Swiper Slider -->
<!-- Start Main Content -->
<div class="main-content">
    <section class="hollywood-movies">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="block-title">Here's what you search...</h2>
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
                                    <li><a @if(Auth::user()) href="{{route('watchmovie', $movie->id)}}" @else href="route('login')" @endif><i class="fas fa-play"></i></a></li>
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
                                {{-- <span class="video-age">{{$movie->duration}}</span> --}}
                                <span class="video-age badge badge-pill badge-warning text-dark">{{$movie->status}}</span>
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
</div>
<!-- Main Content End -->

@endsection