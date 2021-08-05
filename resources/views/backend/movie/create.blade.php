@extends('layouts.backend')
@section('content')
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Movie Create Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
              <div class="title"><strong>Create Movies Data</strong></div>
              <div class="block-body">
                <form class="form-horizontal" action="{{route('movie.store')}}" method="post" enctype="multipart/form-data"> 
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Cover</label>
                        <div class="col-sm-9">
                          <input type="file" name="photo" class="form-control-file">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                      <label for="genres" class="col-sm-3 form-control-label">Genres</label>
                      <div class="col-sm-9">
                        <select class="form-control multiple-select" name="genres[]" multiple="multiple" id="genres">
                          @foreach ($genres as $genre)
                              <option value="{{$genre->id}}">{{$genre->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="casts" class="col-sm-3 form-control-label">Casts</label>
                    <div class="col-sm-9">
                      <select class="form-control multiple-select" name="casts[]" multiple="multiple" id="casts">
                        @foreach ($casts as $cast)
                            <option value="{{$cast->id}}">{{$cast->name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Year</label>
                        <div class="col-sm-9">
                              <input type="text" name="year" class="form-control">
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
                              <input type="text" name="duration" class="form-control">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Overview</label>
                        <div class="col-sm-9">
                              <textarea name="overview" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Trailer</label>
                        <div class="col-sm-9">
                          <input type="text" name="trailer" class="form-control">
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
                          <input type="file" name="video" class="form-control-file">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Status</label>
                        <div class="i-checks col-sm-2">
                              <input id="radioCustom1" type="radio" value="Free" name="status" class="radio-template" checked>
                              <label for="radioCustom1">Free</label>
                        </div>
                        <div class="i-checks col-sm-2">
                              <input id="radioCustom1" type="radio" value="Premium" name="status" class="radio-template">
                              <label for="radioCustom1">Premium</label>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                      <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Create </button>
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

      $('.input-images').imageUploader();

      $('.multiple-select').select2({
        theme: 'bootstrap4',
          width: 'style',
          placeholder: $(this).attr('Choose Language'),
        }
      );

    });
  </script>
      
@endsection