@extends('layouts.frontend')
@section('title','Movie World | Home Page')
@section('content')

<?php

    if(Auth::user()){
        $authuser = Auth::user();

        $authuser_package = $authuser->payments->last()->package_id;

        $payment = $authuser->payments->last();

        $installmentdate = $payment->date;

        $todaydate = Carbon\Carbon::now();

        $status = 1;



        if ($authuser_package == 2) {
            $expiredate = Carbon\Carbon::parse($installmentdate)->addMonths(1);
            $diff = $todaydate->diffInDays(Carbon\Carbon::parse($expiredate), false);

            if($diff <= 0 ){
                $status = 0; // Expired [ 1 Month ]
            }
        }

        if ($authuser_package ==3) {
            $expiredate = Carbon\Carbon::parse($installmentdate)->addYear();
            $diff = $todaydate->diffInDays(Carbon\Carbon::parse($expiredate), false);

            if($diff <= 0 ){
                $status = 0; // Expired [ 1 Year ]
            }
        }

    }


?>

<!-- Start Main Slider -->
<div class="main-slider" id="main-slider">
    <div class="slider big-slider slider-wrap">
        
        @foreach ($newmovies as $key => $newmovie)

        @php 
            $images = json_decode($newmovie->gallery)
        @endphp
        
        <div class="slide slick-bg bg-{{ $newmovie->id }}" style="background-image: url({{asset('storage/'.$images[0])}});">
            <div class="container-fluid position-relative h-100">
                <div class="slider-content h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <h3 data-animation-in="fadeInUp" data-delay-in="1"><span class="badge bg-warning text-dark">New</span></h3>
                            <h1 data-animation-in="fadeInUp" data-delay-in="1">{{$newmovie->name}}</h1>
                            <div class="slide-info" data-animation-in="fadeInUp" data-delay-in="1">
                                <span>{{$newmovie->year}}</span> <span class="radius">{{$newmovie->status}}</span> <span>{{$newmovie->duration}}</span>
                            </div>
                            <p data-animation-in="fadeInUp" data-delay-in="1">{{$newmovie->overview}}</p>
                            <div class="slider-buttons d-flex align-items-center" data-animation-in="fadeInUp" data-delay-in="1">
                                <a class="btn hvr-sweep-to-right"
                                
    <?php 
        if (Auth::user()) {
            $route = route('watchmovie', $newmovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($newmovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
                                
                                tabindex="0">
                                    <i aria-hidden="true" class="fa fa-play mr-2"></i>Play Now
                                </a> 
                                <a class="btn hvr-sweep-to-right ml-3" href="{{route('moviedetail', $newmovie->id)}}" tabindex="0">
                                    <i class="fas fa-info mr-2"></i> View More 
                                </a>
@if($newmovie->video)
<li>
    <a class="btn hvr-sweep-to-right ml-3"
    <?php 
        if (Auth::user()) {
            $route = route('downloadmovie', $newmovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($newmovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
>
    <i class="fas fa-download"></i>
    </a>
</li>
@endif

                            </div>
                        </div>
                        <!-- Col End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Slider Content End -->
            </div>
            <!-- Container End -->
        </div>

        @endforeach
    </div>
    <!-- Slide Wrap End -->
</div>
<!-- Main Slider End -->

    <div class="main-content">
        <!-- Start Main Tabs Section -->
        <section class="main-tabs">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="season-tabs">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-toggle="pill" href="#pills-additions" role="tab" aria-selected="true">Free</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="pill" href="#pills-movies" role="tab" aria-selected="false">Premium</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Season Tabs End -->
                        <div class="tab-content" id="pills-tabContent">
                            <div id="pills-additions" class="tab-pane animated fadeInRight show active">
                                <div class="row">
                                    
                                        @foreach ($newfreemovies as $newfreemovie)
                                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                                <div class="video-block">
                                                    <div class="video-thumb position-relative thumb-overlay">
                                                        <a href="#"><img alt="" class="img-fluid" src="{{asset('storage/'.$newfreemovie->photo)}}"></a>
                                                        <div class="box-content">
                                                            <ul class="icon">
                                                                <li>
                                                                    <a @if(Auth::user()) href="{{route('watchmovie', $newfreemovie->id)}}" @else href="{{route('login')}}" @endif
                                                                    ><i class="fas fa-play"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route('moviedetail', $newfreemovie->id)}}"><i class="fas fa-info"></i></a>
                                                                </li>
@if($newfreemovie->video)
<li>
    <a 
    <?php 
        if (Auth::user()) {
            $route = route('downloadmovie', $newfreemovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($newfreemovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }

        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
>
    <i class="fas fa-download"></i>
    </a>
</li>
@endif
                                </ul>
                            </div>
                            <!-- Box Content End -->
                        </div>
                        <!-- Video Thumb End -->
                        <div class="video-content">
                            <h2 class="video-title"><a href="movie-single.html">{{$newfreemovie->name}}</a></h2>
                            <div class="video-info d-flex align-items-center">
                                <span class="video-year">{{$newfreemovie->year}}</span><span class="video-age badge badge-pill badge-warning text-dark">{{$newfreemovie->status}}</span>
                            </div>
                        </div>
                        <!-- video Content End -->
                    </div>
                    <!-- video Block End -->
                </div>   
            @endforeach
        </div>
        <!-- Col End -->
    
    <!-- Row End -->
</div>
<!-- Tap Pane 1 End -->
<div id="pills-movies" class="tab-pane animated fadeInRight">
    <div class="row">
        @foreach ($newpremiummovies as $newpremiummovie)

            <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                    <div class="video-block">
                        <div class="video-thumb position-relative thumb-overlay">
                            <a href="#"><img alt="" class="img-fluid" src="{{asset('storage/'.$newpremiummovie->photo)}}"></a>
                            <div class="box-content">
                                <ul class="icon">
                                    <li>
    <a 
        <?php 
            if (Auth::user()) {
                $route = route('watchmovie', $newpremiummovie->id);

                if($status == 0){
                    echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
                }else{
                    if($newpremiummovie->status == "Premium"){

                        if ($authuser_package > 1 ) {
                            echo "href=$route";
                        }
                        else{
                            echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                        }
                    }

                    else {
                        echo "href=$route";
                    }

                    
                }
            }
            else{
                $route = route('login');
                echo "href=$route";
            }
        ?>
    ><i class="fas fa-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{route('moviedetail', $newpremiummovie->id)}}"><i class="fas fa-info"></i></a>
                                    </li>

@if($newpremiummovie->video)
<li>
    <a 
    <?php 
        if (Auth::user()) {
            $route = route('downloadmovie', $newpremiummovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($newpremiummovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
>
    <i class="fas fa-download"></i>
    </a>
</li>
@endif

                                                                
                                                            </ul>
                                                        </div>
                                                        <!-- Box Content End -->
                                                    </div>
                                                    <!-- Video Thumb End -->
                                                    <div class="video-content">
                                                        <h2 class="video-title"><a href="movie-single.html">{{$newpremiummovie->name}}</a></h2>
                                                        <div class="video-info d-flex align-items-center">
                                                            <span class="video-year">{{$newpremiummovie->year}}</span> <span class="video-age badge badge-pill badge-warning text-dark">{{$newpremiummovie->status}}</span> 
                                                        </div>
                                                    </div>
                                                    <!-- video Content End -->
                                                </div>
                                                <!-- video Block End -->
                                            </div>  
                                    @endforeach

                                    <!-- Col End -->
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- Tap Pane 2 End -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </section>
        <!-- Main Tabs Section End -->
        <!-- Start Pupular Section -->
        <section class="pupular">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="block-title">Pupular Movies</h2>
                        <!-- Start Pupular Slider -->
                        <div class="owl-carousel owl-theme" id="pupular-slider">
                            @foreach ($movies as $movie)
                                <div class="item">
                                    <div class="video-block">
                                        <div class="video-thumb position-relative thumb-overlay">
                                            <a href="#"><img alt="" class="img-fluid" src="{{asset('storage/'.$movie->photo)}}"></a>
                                            <div class="box-content">
                                                <ul class="icon">
                                                    <li>
            <a

            <?php 
            if (Auth::user()) {
                $route = route('watchmovie', $movie->id);
    
                if($status == 0){
                    echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
                }else{
                    if($movie->status == "Premium"){
    
                        if ($authuser_package > 1 ) {
                            echo "href=$route";
                        }
                        else{
                            echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                        }
                    }
    
                    else {
                        echo "href=$route";
                    }
    
                    
                }
            }
            else{
                $route = route('login');
                echo "href=$route";
            }
        ?>
                
            ><i class="fas fa-play"></i></a>

                                                    <li>
                                                        <a href="{{route('moviedetail', $movie->id)}}"><i class="fas fa-info"></i></a>
                                                    </li>

@if($movie->video)
<li>
    <a 
    <?php 
        if (Auth::user()) {
            $route = route('downloadmovie', $movie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($movie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
>
    <i class="fas fa-download"></i>
    </a>
</li>
@endif

                                                </ul>
                                            </div>
                                            <!-- Box Content End -->
                                        </div>
                                        <!-- Video Thumb End -->
                                        <div class="video-content">
                                            <h2 class="video-title"><a href="{{route('moviedetail', $movie->id)}}">{{$movie->name}}</a></h2>
                                            <div class="video-info d-flex align-items-center">
                                                <span class="video-year">{{$movie->year}}</span>
                                                <span class="video-age badge badge-pill badge-warning text-dark">{{$movie->status}}</span> 
                                            </div>
                                        </div>
                                        <!-- video Content End -->
                                    </div>
                                    <!-- video Block End -->
                                </div>
                            @endforeach
                        </div>
                        <!-- Pupular Slider End -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </section>
        <!-- Pupular Section End -->
        <!-- Start Office Box Section -->
        <section class="office-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="block-title">TOP 10 BOX OFFICE</h2>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Swiper Slider -->
                        <div class="swiper-container loading pt-0">
                            <div class="swiper-wrapper">
                                @foreach($currentyearmovies as $currentyearmovie)
                                <div class="swiper-slide swiper-bg" style="background-image:url({{asset('storage/'.$currentyearmovie->photo)}})">
                                    <img alt="" class="entity-img" src="{{asset('storage/'.$currentyearmovie->photo)}}">
                                    {{-- <div class="top-badge">
                                        <div class="video-badge"><img alt="" class="img-fluid" src="{{asset('storage/'.$currentyearmovie->photo)}}"></div>
                                    </div> --}}
                                    <div class="content">
                                        <p class="title" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7">
                                            {{$currentyearmovie->name}}
                                        </p>
                                        <span class="caption mb-4" data-swiper-parallax="-20%">{{ $currentyearmovie->overview }}</span>
                                    </div>
                                    <div class="my-content">
                                        <div class="slider-buttons d-flex align-items-center" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7">
        <a class="btn hvr-sweep-to-right" 

        <?php 
        if (Auth::user()) {
            $route = route('watchmovie', $currentyearmovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($currentyearmovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
         
        tabindex="0"><i aria-hidden="true" class="fa fa-play mr-2"></i>Play Now</a> 
                                            <a class="btn hvr-sweep-to-right ml-3" href="{{route('moviedetail', $currentyearmovie->id)}}" tabindex="0"><i class="fas fa-plus mr-2"></i>View Detail</a>

@if($currentyearmovie->video)
<li>
    <a class="btn hvr-sweep-to-right ml-3"
    <?php 
        if (Auth::user()) {
            $route = route('downloadmovie', $currentyearmovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($currentyearmovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
>
    <i class="fas fa-download"></i>
    </a>
</li>
@endif
                                        </div>  
                                    </div>
                                </div>
                                @endforeach

                                <!-- Slide 5 End -->
                            </div>
                            <!-- Swiper Wrapper End -->
                            <div class="swiper-button-prev swiper-button-white"></div>
                            <div class="swiper-button-next swiper-button-white"></div>
                            <!-- Navigation Buttons End -->
                        </div>
                        <!-- End Swiper Slider -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </section>
        <!-- Office Box Section End -->
        <!-- Start Trending Section -->
        <section class="trending">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="block-title">Trending Now</h2>
                        <div class="row">
                            @foreach($trendingmovies as $trendingmovie)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                <div class="video-block">
                                        <div class="video-thumb position-relative thumb-overlay">
                                            <a href="#"><img alt="" class="img-fluid" src="{{asset('storage/'.$trendingmovie->photo)}}"></a>
                                            <div class="box-content">
                                                <ul class="icon">
                                                    <li>
        <a

        <?php 
        if (Auth::user()) {
            $route = route('watchmovie', $trendingmovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($trendingmovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
    ><i class="fas fa-play"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('moviedetail', $trendingmovie->id)}}"><i class="fas fa-info"></i></a>
                                                    </li>
@if($trendingmovie->video)
<li>
    <a 
    <?php 
        if (Auth::user()) {
            $route = route('downloadmovie', $trendingmovie->id);

            if($status == 0){
                echo "data-toggle='tooltip' data-placement='top' title='Your plan has expired. Please update your payment details to reactivate it'";
            }else{
                if($trendingmovie->status == "Premium"){

                    if ($authuser_package > 1 ) {
                        echo "href=$route";
                    }
                    else{
                        echo "data-toggle='tooltip' data-placement='top' title='Your choosing plan is not available'";
                    }
                }

                else {
                    echo "href=$route";
                }

                
            }
        }
        else{
            $route = route('login');
            echo "href=$route";
        }
    ?>
>
    <i class="fas fa-download"></i>
    </a>
</li>
@endif
                                                </ul>
                                            </div>
                                            <!-- Box Content End -->
                                        </div>
                                        <!-- Video Thumb End -->
                                        <div class="video-content">
                                            <h2 class="video-title"><a href="{{route('moviedetail', $trendingmovie->id)}}">{{$trendingmovie->name}}</a></h2>
                                            <div class="video-info d-flex align-items-center">
                                                <span class="video-year">{{$trendingmovie->year}}</span> <span class="video-age badge badge-pill badge-warning text-dark">{{$trendingmovie->status}}</span>
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
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </section>
        <!-- Trending Section End -->
        <!-- Start Last Seasons Section -->
        {{-- <section class="last-seasons pb-0">
            <div class="last-season" style="background-image: linear-gradient(to top, #202020, rgb(2 2 2 / 90%)), url({{asset('frontend_assets/images/parallax/best-series.jpg')}});">
                <div class="container-fluid">
                    <div class="season-header text-center">
                        <h5 class="mb-4">featured</h5>
                        <h2 class="mb-4">Best Series</h2>
                        <p class="mb-4">News Season 5 Just flown in Watch and debate.</p>
                    </div>
                    <!-- Season Header End -->
                    <div class="season-tabs">
                        <ul class="nav nav-pills mb-3 justify-content-center mb-5" id="pills-tab-seasons" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-toggle="pill" href="#pills-drama" role="tab" aria-selected="true">Drama</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-toggle="pill" href="#pills-action" role="tab" aria-selected="false">Action</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-toggle="pill" href="#pills-romance" role="tab" aria-selected="false">Romance</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tab-Content">
                            <div id="pills-drama" class="tab-pane animated fadeInRight show active">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-drama/01.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">A happy life</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-drama/02.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">A mirage</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-drama/03.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">Box</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-drama/04.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">The price</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-drama/05.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">Sand</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-drama/06.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">The sky</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- Tab Pane 1 End -->
                            <div id="pills-action" class="tab-pane animated fadeInRight">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-action/01.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">The End</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-action/02.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">the beginning</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-action/03.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">The Search</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-action/04.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">The Treasures</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-action/05.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">Problems</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-action/06.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">life is Beautiful</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- Tab Pane 2 End -->
                            <div id="pills-romance" class="tab-pane animated fadeInRight">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-romance/01.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">End of Sorrows</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-romance/02.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">the thief</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-romance/03.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">Millionaire</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-romance/04.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">The Dreams</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-romance/05.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">Black Color</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                                        <div class="video-block">
                                            <div class="video-thumb position-relative thumb-overlay">
                                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/best-romance/06.jpg')}}"></a>
                                                <div class="box-content">
                                                    <ul class="icon">
                                                        <li>
                                                            <a href="watch-show.html"><i class="fas fa-play"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-plus"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="shows-single.html"><i class="fas fa-info"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Box Content End -->
                                            </div>
                                            <!-- Video Thumb End -->
                                            <div class="video-content">
                                                <h2 class="video-title"><a href="shows-single.html">The Ocean</a></h2>
                                                <div class="video-info d-flex align-items-center">
                                                    <span class="video-year">2021</span> <span class="video-seasons">4 Season</span>
                                                </div>
                                            </div>
                                            <!-- video Content End -->
                                        </div>
                                        <!-- video Block End -->
                                    </div>
                                    <!-- Col End -->
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- Tab Pane 3 End -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- Season tabs End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Last Season End -->
        </section> --}}
        <!-- Last Seasons Section End -->
        <!-- Start Suggested Section -->
        {{-- <section class="suggested pt-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="block-title">Suggested For You</h2>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="video-block">
                            <div class="video-thumb position-relative thumb-overlay">
                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/suggested/01.jpg')}}"></a>
                                <div class="box-content">
                                    <ul class="icon">
                                        <li>
                                            <a href="watch-movie.html"><i class="fas fa-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="movie-single.html"><i class="fas fa-info"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Box Content End -->
                            </div>
                            <!-- Video Thumb End -->
                            <div class="video-content">
                                <h2 class="video-title"><a href="movie-single.html">The Colors</a></h2>
                                <div class="video-info d-flex align-items-center">
                                    <span class="video-year">2021</span> <span class="video-age">Premium</span> <span class="video-type">Action</span>
                                </div>
                            </div>
                            <!-- video Content End -->
                        </div>
                        <!-- video Block End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="video-block">
                            <div class="video-thumb position-relative thumb-overlay">
                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/suggested/02.jpg')}}"></a>
                                <div class="box-content">
                                    <ul class="icon">
                                        <li>
                                            <a href="watch-movie.html"><i class="fas fa-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="movie-single.html"><i class="fas fa-info"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Box Content End -->
                            </div>
                            <!-- Video Thumb End -->
                            <div class="video-content">
                                <h2 class="video-title"><a href="movie-single.html">The Devastation</a></h2>
                                <div class="video-info d-flex align-items-center">
                                    <span class="video-year">2021</span> <span class="video-age">Premium</span> <span class="video-type">Action</span>
                                </div>
                            </div>
                            <!-- video Content End -->
                        </div>
                        <!-- video Block End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="video-block">
                            <div class="video-thumb position-relative thumb-overlay">
                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/suggested/03.jpg')}}"></a>
                                <div class="box-content">
                                    <ul class="icon">
                                        <li>
                                            <a href="watch-movie.html"><i class="fas fa-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="movie-single.html"><i class="fas fa-info"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Box Content End -->
                            </div>
                            <!-- Video Thumb End -->
                            <div class="video-content">
                                <h2 class="video-title"><a href="movie-single.html">The Beauty</a></h2>
                                <div class="video-info d-flex align-items-center">
                                    <span class="video-year">2021</span> <span class="video-age">Premium</span> <span class="video-type">Action</span>
                                </div>
                            </div>
                            <!-- video Content End -->
                        </div>
                        <!-- video Block End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="video-block">
                            <div class="video-thumb position-relative thumb-overlay">
                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/suggested/04.jpg')}}"></a>
                                <div class="box-content">
                                    <ul class="icon">
                                        <li>
                                            <a href="watch-movie.html"><i class="fas fa-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="movie-single.html"><i class="fas fa-info"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Box Content End -->
                            </div>
                            <!-- Video Thumb End -->
                            <div class="video-content">
                                <h2 class="video-title"><a href="movie-single.html">The Silence</a></h2>
                                <div class="video-info d-flex align-items-center">
                                    <span class="video-year">2021</span> <span class="video-age">Premium</span> <span class="video-type">Action</span>
                                </div>
                            </div>
                            <!-- video Content End -->
                        </div>
                        <!-- video Block End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="video-block">
                            <div class="video-thumb position-relative thumb-overlay">
                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/suggested/05.jpg')}}"></a>
                                <div class="box-content">
                                    <ul class="icon">
                                        <li>
                                            <a href="watch-movie.html"><i class="fas fa-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="movie-single.html"><i class="fas fa-info"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Box Content End -->
                            </div>
                            <!-- Video Thumb End -->
                            <div class="video-content">
                                <h2 class="video-title"><a href="movie-single.html">the door is open</a></h2>
                                <div class="video-info d-flex align-items-center">
                                    <span class="video-year">2021</span> <span class="video-age">Premium</span> <span class="video-type">Action</span>
                                </div>
                            </div>
                            <!-- video Content End -->
                        </div>
                        <!-- video Block End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="video-block">
                            <div class="video-thumb position-relative thumb-overlay">
                                <a href="#"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/suggested/06.jpg')}}"></a>
                                <div class="box-content">
                                    <ul class="icon">
                                        <li>
                                            <a href="watch-movie.html"><i class="fas fa-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="movie-single.html"><i class="fas fa-info"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Box Content End -->
                            </div>
                            <!-- Video Thumb End -->
                            <div class="video-content">
                                <h2 class="video-title"><a href="movie-single.html">The Journey</a></h2>
                                <div class="video-info d-flex align-items-center">
                                    <span class="video-year">2021</span> <span class="video-age">Premium</span> <span class="video-type">Action</span>
                                </div>
                            </div>
                            <!-- video Content End -->
                        </div>
                        <!-- video Block End -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </section> --}}
        <!-- Suggested Section End -->
    </div>


@endsection