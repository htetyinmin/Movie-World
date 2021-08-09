@extends('layouts.frontend')
@section('title','Movie World | Movie Detail Page')
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

<!-- Start Banner Section -->
@php 
    $images = json_decode($movie->gallery)
@endphp

<div class="banner-single banner-wrap banner-bg movie-bg" style="background-image:url({{asset('storage/'.$images[0])}})">

    <div class="container-fluid">
        <div class="banner-content">
            <div class="transparent-block">
                <div class="banner-caption">
                    <div class="position-relative mb-4">
                        @foreach ($playmovies as $playmovie)
                            
                        <a class="d-flex align-items-center" @if(Auth::user()) href="{{route('watchmovie', $playmovie->id)}}" @else href="route('login')" @endif tabindex="0">
                        @endforeach
                        {{-- <a href="watch-movie.html" class="d-flex align-items-center"> --}}
                            <div class="play-icon">
                                <div class="circle pulse"></div>
                                <div class="circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                        <polygon points="40,30 65,50 40,70"></polygon>
                                    </svg>
                                </div>
                            </div>
                            <h2 class="banner-name text-white font-weight-700">{{$movie->name}}</h2>
                        </a>
                    </div>
                </div>
                <!-- Banner Caption End -->
            </div>
            <!-- Transparent Block End -->
        </div>
        <!-- Banner Content End -->
    </div>
    <!-- Container End -->
</div>


<!-- Banner Section End -->
<!-- Start Main Content -->
<div class="main-content">
    <!-- Start Play Details Section -->
    <section class="play-details">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="play-thumb mb-4">
                                <img class="img-fluid" src="{{asset('storage/'.$movie->photo)}}" alt="">
                                <div class="top-badge">
                                    <div class="video-badge">
                                        <img class="img-fluid" src="images/top-movies.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- Play Thumb End -->
                            <div class="thumb-details text-center">
                                <span> 1080p</span>
                                <span>24p</span>
                                <span><img class="img-fluid" src="{{asset('frontend_assetss/images/dts-logo.png')}}" alt=""></span>
                                <span>7.1</span>
                            </div>
                            <!-- Thumb Details End -->
                        </div>
                        <!-- Col End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Col End -->
                <div class="col-md-9">
                    <div class="play-details-content">
                        <div class="title-block d-flex align-items-center justify-content-between">
                            <h2 class="play-title">{{$movie->name}}</h2>
                        </div>
                        <!-- Title Block -->
                        <div class="details-info mb-4">
                            <span><i class="icofont-clock-time mr-2" aria-hidden="true"></i> {{$movie->duration}} </span>
                            <span><i class="icofont-simple-smile mr-2" aria-hidden="true"></i> {{$movie->year}} </span>
                            <span><i class="icofont-world mr-2" aria-hidden="true"></i> {{$movie->language}} </span>
                            <span><i class="fa fa-film mr-2" aria-hidden="true"></i> @foreach ($movie->genres as $genre)
                                {{$genre->name}}@if (!$loop->last),@endif
                            @endforeach
                            </span>
                        </div>
                        <!-- Details Info -->
                        <div class="details-desc">
                            <p>{{$movie->overview}}</p>
                        </div>

                        <!-- Details Desc -->
                        <div class="movie-persons mb-4">
                            <div class="person-block">
                                <h5 class="title">Director</h5>
                                @foreach ($movie->casts->where('status', 'Director') as $director)
                                    <a href="{{route('castdetail', $director->id)}}" class="mr-3">{{$director->name}}</a>
                                @endforeach
                            </div>
                            <!-- Person Block -->
                            <div class="person-block">
                                <h5 class="title">Cast</h5>

                                <span>@foreach ($movie->casts->whereNotIn('status', 'Director') as $cast)
                                    <a href="{{route('castdetail', $cast->id)}}">{{$cast->name}}@if (!$loop->last),@endif</a>
                                @endforeach</span>
                            </div>
                            <!-- Person Block -->
                        </div>
                        <!-- Movie Persons -->
                        <div class="details-buttons">
                            <div class="row d-flex align-items-center">
                                <div class="col-6 col-xl mb-xl-0 mb-3">
                                    @if($movie->video)

                                        <a @if(Auth::user()) href="{{route('watchmovie', $movie->id)}}" @else href="route('login')" @endif  class="btn d-block hvr-sweep-to-right" tabindex="0">
                                            <i class="icofont-ui-play mr-2" aria-hidden="true"></i>Play
                                        </a>
                                    @endif
                                </div>
                                <!-- Col End -->
                                @if($movie->video)

                                    <div class="col-6 col-xl mb-xl-0 mb-3">
                                        <a class="btn d-block hvr-sweep-to-right" tabindex="0" <?php 
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
                                            <i class="fas fa-download mr-2" aria-hidden="true"></i>Download
                                        </a>
                                    </div>
                                @endif
                                <!-- Col End -->
                                <div class="col-6 col-xl mb-xl-0 mb-3">
                                    <a id="trailer" class="btn d-block hvr-sweep-to-right" tabindex="0" data-toggle="modal" data-target="#trailer-modal" aria-hidden="true"><i class="icofont-ui-movie mr-2" aria-hidden="true"></i>Trailer</a>
                                    <!-- Modal Trailer -->
                                    <div class="modal fade" id="trailer-modal" tabindex="0" role="dialog" aria-labelledby="trailer-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document" id="trailerModal">
                                            <!-- Modal Content -->
                                            <div class="modal-content">
                                                <!-- modal header -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Trailer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                    </button>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="{{ $movie->trailer }}" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- Modal Body -->
                                            </div>
                                            <!-- Modal Content -->
                                        </div>
                                        <!-- Modal Dialog -->
                                    </div>
                                    <!-- Modal Trailer -->
                                </div>
                                <!-- Col End -->
                                <div class="col-6 col-xl mb-xl-0">
                                    <a id="share" class="btn hvr-sweep-to-right d-block" tabindex="0" data-toggle="modal" data-target="#share-modal">
                                        <i class="icofont-share mr-2" aria-hidden="true"></i>Share</a>
                                    <!-- Modal Share -->
                                    <div class="modal fade" id="share-modal" tabindex="0" role="dialog" aria-labelledby="share-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document" id="sharemodal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Share</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                    </button>
                                                </div>
                                                <!-- modal header End -->
                                                <div class="modal-body">
                                                    <div class="icon-container d-flex">
                                                        <div class="icon-block"><i class="social-icon fab fa-twitter fa-2x"></i>
                                                            <p>Twitter</p>
                                                        </div>
                                                        <div class="icon-block"><i class="social-icon fab fa-facebook fa-2x"></i>
                                                            <p>Facebook</p>
                                                        </div>
                                                        <div class="icon-block"><i class="social-icon fab fa-instagram fa-2x"></i>
                                                            <p>Instagram</p>
                                                        </div>
                                                        <div class="icon-block"><i class="social-icon fab fa-telegram fa-2x"></i>
                                                            <p>Telegram</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Body End -->
                                            </div>
                                            <!-- Modal Content End -->
                                        </div>
                                        <!-- Modal Dialog End -->
                                    </div>
                                    <!-- Modal Share End -->
                                </div>
                                <!-- Col End -->
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Details Buttons End -->
                    </div>
                    <!-- Details Content End -->
                </div>
                <!-- Col End -->
            </div>
            <!-- row End -->
        </div>
        <!-- Container End -->
    </section>
   
    {{-- Gallery --}}
    <section class="hollywood-movies">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="block-title">Gallery</h2>
                </div>
            </div>
            <div class="row">
                

                @foreach($images as $key => $image)

                <div class="">
                    <div class="gallery-block">
                        <div class="video-thumb position-relative thumb-overlay">
                            <a class="image-link" href="{{asset('storage/'.$image)}}">
                                <img class="p-2 my-img" src="{{asset('storage/'.$image)}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>

    {{-- Casts --}}
    <section class="hollywood-movies">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="block-title">Casts</h2>
                </div>
            </div>
            <div class="row">
                @foreach($movie->casts as $cast)
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2 gallery">
                    <div class="gallery-wrap">
                            <img src="{{asset('storage/'.$cast->photo)}}" class="my-img" alt="CastPhoto">
                        <div class="gallery-info">
                            <div class="gallery-links">
                                <a href="{{route('castdetail', $cast->id)}}"><h6 class="my-a"> {{ $cast->name }} </h6>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>  

        </div>
    </section>

    

</div>
<!-- Main Content End -->


@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.image-link').magnificPopup({type:'image'});
    })
  </script>
@endsection