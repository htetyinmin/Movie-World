@extends('layouts.frontend')
@section('title','Movie World | Cast Detail Page')
@section('content')


@foreach ($casts as $cast)

<div class="sub-header">
      <div class="container-fluid">
          <div class="row align-items-center">
              <div class="col-sm-12">
                  <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                      <h2 class="Page-title">About - <a href="#">{{$cast->name}}</a></h2>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-home"></i>
                              <a href="{{url('/')}}">Home</a>
                              <i class="fa fa-angle-right"></i>
                          </li>
                          <li><a href="#">{{$cast->status}}</a></li>
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
                                <img class="img-fluid" src="{{asset('storage/'.$cast->photo)}}" alt="">
                            </div>
                        </div>
                        <!-- Col End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Col End -->
                <div class="col-md-9">
                    <div class="play-details-content">
                        <div class="title-block d-flex align-items-center justify-content-between">
                            <h2 class="play-title"> {{$cast->name}} </h2>
                        </div>
                        
                        <div class="details-info mb-4">
                              <span><i class="icofont-user mr-2"></i> {{$cast->gender}}</span>
                              <span><i class="icofont-birthday-cake mr-2"></i> {{Carbon\Carbon::parse($cast->dob)->format('d-M-Y')}} </span>
                              <span><i class="icofont-movie mr-2"></i> {{$cast->status}} </span>
                            <span><i class="icofont-location-pin mr-2"></i> {{$cast->pob}} </span>
                            {{-- <span><i class="icofont-world mr-2" aria-hidden="true"></i> {{$movie->language}} </span> --}}
                        </div>
                        
                        <div class="details-desc">
                            <p>{{$cast->bio}}</p>
                        </div>

                        <div class="details-buttons">
                            <div class="row d-flex align-items-center">
                                <div class="col-6 col-xl mb-xl-0 mb-3">
                                    <a href="#" class="btn d-block hvr-sweep-to-right" tabindex="0"><i class="icofont-star mr-2" aria-hidden="true"></i>150</a>
                                </div>
                                <!-- Col End -->
                                <div class="col-6 col-xl mb-xl-0 mb-3">
                                    <a href="#" class="btn d-block hvr-sweep-to-right" tabindex="0"><i class="icofont-film mr-2" aria-hidden="true"></i>300</a>
                                </div>
                                <!-- Col End -->
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
                    <h2 class="block-title">Photos</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($gallerys as $gallery)
                  <div class="">
                    <a class="image-link" href="{{asset('storage/'.$gallery)}}">
                      <img class="p-2 my-img" src="{{asset('storage/'.$gallery)}}" alt="Photo">
                    </a>
                  </div>
                @endforeach
                
            </div> 
        </div>
    </section>

    <section class="pupular">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="block-title"> Movies by {{$cast->name}} </h2>
                    <!-- Start Pupular Slider -->
                    <div class="owl-carousel owl-theme" id="pupular-slider">
                        @foreach ($cast->movies as $movie)
                            <div class="item">
                                <div class="video-block">
                                    <div class="video-thumb position-relative thumb-overlay">
                                        <a href="#"><img alt="" class="img-fluid" src="{{asset('storage/'.$movie->photo)}}"></a>
                                        <div class="box-content">
                                            <ul class="icon">
                                                <li>
                                                    <a @if(Auth::user()) href="{{route('watchmovie', $movie->id)}}" @else href="route('login')" @endif ><i class="fas fa-play"></i></a>

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

</div>

@endforeach

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.image-link').magnificPopup({type:'image'});
    })
  </script>
@endsection