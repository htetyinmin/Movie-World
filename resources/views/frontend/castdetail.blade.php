@extends('layouts.frontend')
@section('title','Movie World | Cast Detail Page')
@section('content')


@foreach ($casts as $cast)

<div class="sub-header">
      <div class="container-fluid">
          <div class="row align-items-center">
              <div class="col-sm-12">
                  <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                      <h2 class="Page-title">About {{$cast->name}}</h2>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-home"></i>
                              <a href="#">Home</a>
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
                                    <a href="watch-movie.html" class="btn d-block hvr-sweep-to-right" tabindex="0"><i class="icofont-ui-play mr-2" aria-hidden="true"></i>Play</a>
                                </div>
                                <!-- Col End -->
                                <div class="col-6 col-xl mb-xl-0 mb-3">
                                    <a href="watch-movie.html" class="btn d-block hvr-sweep-to-right" tabindex="0"><i class="icofont-plus mr-2" aria-hidden="true"></i>MY List</a>
                                </div>
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
                                                    <video class="video d-block" controls="" loop="">
                                                        <source src="video/01-video.mp4" type="video/mp4">
                                                    </video>
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