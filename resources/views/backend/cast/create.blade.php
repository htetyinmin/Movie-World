@extends('layouts.backend')
@section('content')
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Casts Create Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('cast.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Casts Data</li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{route('cast.index')}}" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
      </div>

      <!-- Form Elements -->
      <div class="col-lg-12">
            <div class="block">
              <div class="title"><strong>Create Cast Data</strong></div>
              <div class="block-body">
                <form class="form-horizontal" action="{{route('cast.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                        @if ($errors->has('name'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                              </span>
                        @endif
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Photo</label>
                        <div class="col-sm-9">
                          <input type="file" name="photo" class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}">
                          @if ($errors->has('photo'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('photo') }}</strong>
                              </span>
                          @endif
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Gender</label>
                        <div class="i-checks col-sm-2">
                              <input id="male" type="radio" value="Male" name="gender" class="radio-template" checked>
                              <label for="male">Male</label>
                        </div>
                        <div class="i-checks col-sm-2">
                              <input id="female" type="radio" value="Female" name="gender" class="radio-template">
                              <label for="female">Female</label>
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Date Of Birth</label>
                        <div class="col-sm-9">
                          <input type="date" name="dob" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}">
                          @if ($errors->has('dob'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('dob') }}</strong>
                              </span>
                          @endif
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Place Of Birth</label>
                        <div class="col-sm-9">
                          <input type="text" name="pob" class="form-control{{ $errors->has('pob') ? ' is-invalid' : '' }}">
                          @if ($errors->has('pob'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('pob') }}</strong>
                              </span>
                          @endif
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Bio</label>
                        <div class="col-sm-9">
                              <textarea name="bio" cols="30" rows="4" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}"></textarea>
                              @if ($errors->has('bio'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                              @endif
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Gallery</label>
                        <div class="col-sm-9">
                          <div class="input-images">

                          </div>
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Status</label>
                        <div class="i-checks col-sm-2">
                              <input id="director" type="radio" value="Director" name="status" class="radio-template" checked>
                              <label for="director">Director</label>
                        </div>
                        <div class="i-checks col-sm-2">
                              <input id="actor" type="radio" value="Actor" name="status" class="radio-template">
                              <label for="actor">Actor</label>
                        </div>
                        <div class="i-checks col-sm-2">
                              <input id="actress" type="radio" value="Actress" name="status" class="radio-template">
                              <label for="actress">Actress</label>
                        </div>
                  </div>
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

      <script>
            $(document).ready(function(){
                  $("#cast").addClass("active");
                  $('.input-images').imageUploader();
            })
      </script>

@endsection