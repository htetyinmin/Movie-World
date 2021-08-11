@extends('layouts.backend')
@section('content')
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Movie Edit Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('movie.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Movie Data</li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{route('movie.index')}}" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
      </div>

      <!-- Form Elements -->
      <div class="col-lg-12">
            <div class="block">
              <div class="title"><strong>Edit Movies Data</strong></div>
              <div class="block-body">
                <form class="form-horizontal" action="{{route('movie.update', $movie->id)}}" method="post" enctype="multipart/form-data"> 
                  @csrf
                  @method('PUT')
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$movie->name}}">
                      @if ($errors->has('name'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Cover</label>
                        <div class="col-sm-9">
                          <input type="file" name="photo" class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}">
                          @if ($errors->has('photo'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('photo') }}</strong>
                            </span>
                          @endif
                          <img src="{{asset('storage/'.$movie->photo)}}" alt="" class="img-fluid w-25 mt-3">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                      <label for="genres" class="col-sm-3 form-control-label">Genres</label>
                      <div class="col-sm-9">
                        <select class="form-control multiple-select{{ $errors->has('genres') ? ' is-invalid' : '' }}" name="genres[]" multiple="multiple" id="genres">
                          @foreach ($genres as $genre)
                              <option value="{{$genre->id}}" 
                                @foreach($movie->genres as $gen_mov) <?php if($genre->id==$gen_mov->pivot->genre_id) { ?> selected <?php }; ?> 
                                @endforeach>
                                {{$genre->name}}
                              </option>
                          @endforeach
                        </select>
                        @if ($errors->has('genres'))
                          <span class="invalid-feedback">
                          <strong>{{ $errors->first('genres') }}</strong>
                          </span>
                        @endif
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="casts" class="col-sm-3 form-control-label">Casts</label>
                    <div class="col-sm-9">
                      <select class="form-control multiple-select{{ $errors->has('casts') ? ' is-invalid' : '' }}" name="casts[]" multiple="multiple" id="casts">
                        @foreach ($casts as $cast)
                            <option value="{{$cast->id}}" 
                              @foreach($movie->casts as $cast_mov) <?php if($cast->id==$cast_mov->pivot->cast_id) { ?> selected <?php }; ?> 
                              @endforeach>
                              {{$cast->name}}
                            </option>
                        @endforeach
                      </select>
                      @if ($errors->has('casts'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('casts') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Year</label>
                        <div class="col-sm-9">
                              <input type="text" name="year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" value="{{$movie->year}}">
                              @if ($errors->has('year'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('year') }}</strong>
                                </span>
                              @endif
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Language</label>
                        <div class="col-sm-9">
                          <select name="language" class="form-control">
                            <option value="English">English</option>
                            <option value="Korea">Korea</option>
                            <option value="Thai">Thai</option>
                            <option value="Myanmar">Myanmar</option>
                          </select>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Duration</label>
                        <div class="col-sm-9">
                              <input type="text" name="duration" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" value="{{$movie->duration}}">
                              @if ($errors->has('duration'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('duration') }}</strong>
                                </span>
                              @endif
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Overview</label>
                        <div class="col-sm-9">
                              <textarea name="overview" cols="30" rows="4" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}">{{$movie->overview}}</textarea>
                              @if ($errors->has('overview'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('overview') }}</strong>
                                </span>
                              @endif
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Trailer</label>
                        <div class="col-sm-9">
                          <input type="text" name="trailer" class="form-control{{ $errors->has('trailer') ? ' is-invalid' : '' }}" value="{{$movie->trailer}}">
                          @if ($errors->has('trailer'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('trailer') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Gallery</label>
                        <div class="col-sm-9">
                              <div class="input-images">

                              </div>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Video</label>
                        <div class="col-sm-9">
                          <input type="file" name="video" class="form-control-file{{ $errors->has('video') ? ' is-invalid' : '' }}">
                          @if ($errors->has('video'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('video') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Status</label>
                        <div class="i-checks col-sm-2">
                              <input id="radioCustom1" type="radio" value="Free" name="status" class="radio-template" @if($movie->status == 'Free') {{'checked'}} @endif>
                              <label for="radioCustom1">Free</label>
                        </div>
                        <div class="i-checks col-sm-2">
                              <input id="radioCustom1" type="radio" value="Premium" name="status" class="radio-template" @if($movie->status == 'Premium') {{'checked'}} @endif>
                              <label for="radioCustom1">Premium</label>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                      <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

</div>
@endsection

@section('script')

  <script src="{{asset('backend-assets/select2/select2.min.js')}}"></script>
  <script>
    $(function () {
      $('select').each(function () {
          $(this).select2({
            theme: 'bootstrap4',
            width: 'style',
            placeholder: $(this).attr('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
          });
      });
    });

    $(document).ready(function() {
      $("#movie").addClass("active");
      
        $('.multiple-select').select2({
    			theme: 'bootstrap4',
      			width: 'style',
      			placeholder: $(this).attr('Choose Language'),
    		})

        var dbgallery = "{{$movie->gallery}}";
        if (dbgallery) {
              var images = <?= json_encode($movie->gallery) ?>;
              var img_array = $.parseJSON(images);
              console.log(img_array);

              var imgpre_arr=[];


              for (i = 0; i < img_array.length; i++) 
              {
                    var imgpre_obj={};

                    imgpre_obj.id = i;
                    var img = img_array[i];
                    imgpre_obj.src = "/storage/"+img;

                    imgpre_arr.push(imgpre_obj);

              }

              $('.input-images').imageUploader({
                    preloaded: imgpre_arr,
                    preloadedInputName: 'oldPhoto',
              });
        }else{
              $('.input-images').imageUploader();
        }
    });
  </script>
      
@endsection