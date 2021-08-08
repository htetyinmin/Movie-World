@extends('layouts.backend')
@section('content')

<div class="page-content">
      <div class="page-header d-flex">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Movie Details</h2>
        </div>
        <div class="p-4 flex-shrink-1 bd-highlight">
            <a href="{{route('movie.index')}}" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
      </div>
      
      <section class="no-padding-bottom">
        <div class="container-fluid block">
          <div class="row mb-5">
                <div class="col-lg-4">
                      <div class="user-block text-center">
                        <img src="{{asset('storage/'.$movie->photo)}}" alt="Photo" class="img-fluid border border-dark rounded">
                      </div>
                </div>
                <div class="col-lg-8">
                      <div class="">
                            <h1 class="text-uppercase text-primary mb-5 f-size">{{$movie->name}}</h1>
                      </div>
                      <div class="mb-5">
                            {{-- <span class="mr-2"><i class="fa fa-user mr-1" aria-hidden="true"></i> +18</span> --}}
                            <span class="mr-2"><i class="fa fa-clock mr-1" aria-hidden="true"></i> {{$movie->duration}} </span>
                            <span class="mr-2"><i class="fa fa-smile mr-1" aria-hidden="true"></i> {{$movie->year}} </span>
                            <span class="mr-2"><i class="fa fa-film mr-1" aria-hidden="true"></i>@foreach ($movie->genres as $genre)
                                {{$genre->name}}
                            @endforeach </span>
                            <span class="mr-2"><i class="fa fa-globe mr-1" aria-hidden="true"></i> {{$movie->language}}</span>
                      </div>
                      <div class="mb-5">
                            <p>{{$movie->overview}}</p>
                      </div>
                      <!-- Details Desc -->
                      <div class="row mb-4">
                            <div class="col-6">
                                <h5 class="title">Director</h5>
                                <p class="name">Christopher Nolan</p>
                            </div>
                            <!-- Person Block -->
                            <div class="col-6">
                                <h5 class="title">Cast</h5>
                                @foreach ($movie->casts as $cast)
                                  <a href="#" class="text-gray cast-a">{{$cast->name}}</a>
                                @endforeach
                            </div>
                            <!-- Person Block -->
                      </div>
                      <div class="details-buttons">
                            <div class="row d-flex align-items-center">
                                <div class="mb-3">
                                    <a href="#" type="button" class="btn btn-primary mr-3 px-5"><i class="fa fa-play mr-2" aria-hidden="true"></i>Play</a>
                                </div>
                                <!-- Col End -->
                                <div class="mb-3">
                                    <a href="#" type="button" class="btn btn-primary mr-3 px-5"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Add List</a>
                                </div>
                              <!-- Col End -->
                                <div class="mb-3">
                                  <a href="#" type="button" class="btn btn-primary mr-3 px-5"><i class="fa fa-film mr-2" aria-hidden="true"></i>Trailer</a>
                                </div>
                              <!-- Col End -->
                                <div class="mb-3">
                                  <a href="#" type="button" class="btn btn-primary mr-3 px-5"><i class="fa fa-share mr-2" aria-hidden="true"></i>Share</a>
                                </div>
                            </div>
                            <!-- Row End -->
                      </div>
                </div>
          </div>

          <hr>
          
          <div class="row">
                  <!-- Start Related Photo Section -->
            <section class="mb-2">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <h2 class="block-title">Gallery</h2>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
                <div class="row">
                    @foreach ($gallerys as $gallery)
                      <div class="">
                        <a class="image-link" href="{{asset('storage/'.$gallery)}}">
                          <img class="p-2" width="auto" height="200" src="{{asset('storage/'.$gallery)}}" alt="Photo">
                        </a>
                      </div>
                    @endforeach
                </div>
              </div>
            <!-- Container End -->
            </section>

          </div>

          <hr>

          <div class="row">
                  <!-- Start Related Movie Section -->
            <section class="mb-2">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <h2 class="block-title">Video</h2>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12" >

                        {{-- <iframe width="700" height="500" src="https://www.youtube.com/embed/07d2dXHYb94" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                        <video src="{{asset('storage/'.$movie->video)}}" style="border: 2px solid #000000; border-radius: 3px;" controls></video>
                    </div>

                  </div>
                </div>
              </div>
            </section>

          </div>
        </div>
      </section>
</div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.image-link').magnificPopup({type:'image'});
      $("#movie").addClass("active");
      
      $('.deletebtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#deleteModalForm').attr('action',id);
        $('#deleteModal').modal('show');
      })
    })
  </script>
@endsection