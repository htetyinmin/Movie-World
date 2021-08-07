@extends('layouts.backend')
@section('content')

  <div class="page-content">
      <div class="page-header d-flex">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Cast Details</h2>
        </div>
        <div class="p-4 flex-shrink-1 bd-highlight">
            <a href="{{route('cast.index')}}" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
      </div>
      
      <section class="no-padding-bottom">
        <div class="container-fluid block">
          <div class="row m-5">
                <div class="col-lg-4">
                      <div class="user-block text-center">
                            <img src="{{asset('storage/'.$cast->photo)}}" alt="Photo" class="img-fluid border border-dark rounded">
                      </div>
                </div>
                <div class="col-lg-8">
                      <div class="">
                            <h2 class="text-uppercase text-white mb-3 f-size">{{$cast->name}}</h2>
                      </div>
                      <div class="mb-3">
                            <span class="mr-3"><i class="fa fa-user mr-1" aria-hidden="true"></i> {{$cast->gender}} </span>
                            <span class="mr-3"><i class="fa fa-birthday-cake mr-1" aria-hidden="true"></i> {{$cast->dob}} </span>
                            <span class="mr-3"><i class="fa fa-film mr-1" aria-hidden="true"></i> {{$cast->status}} </span>
                            <span class="mr-3"><i class="fa fa-globe mr-1" aria-hidden="true"></i> {{$cast->pob}} </span>
                      </div>
                      <div class="">
                            <p> {{$cast->bio}} </p>
                      </div>
                      <div class="details-buttons">
                            <div class="row d-flex align-items-center">
                                <div class="mb-3">
                                    <a href="#" type="button" class="btn btn-primary mr-3 px-5"><i class="fa fa-film mr-1" aria-hidden="true"></i>150</a>
                                </div>
                                <!-- Col End -->
                                <div class="mb-3">
                                    <a href="#" type="button" class="btn btn-primary mr-3 px-5"><i class="fa fa-star mr-1" aria-hidden="true"></i>250</a>
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
        </div>
      </section>

       
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.image-link').magnificPopup({type:'image'});
      $("#cast").addClass("active");
      $('.deletebtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#deleteModalForm').attr('action',id);
        $('#deleteModal').modal('show');
      })

      var dbgallery = "{{$cast->gallery}}";
      if (dbgallery) {
        var images = <?= json_encode($cast->gallery) ?>;
        var img_array = $.parseJSON(images);
        console.log(img_array);
      }
    })
  </script>
@endsection