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
                <li class="breadcrumb-item active">Movie Data           </li>
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
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control">
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
                        <label class="col-sm-3 form-control-label">Language</label>
                        <div class="col-sm-9">
                          <select name="account" class="form-control mb-3 mb-3">
                            <option>English</option>
                            <option>Korea</option>
                            <option>Thailand</option>
                          </select>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Duration</label>
                        <div class="col-sm-9">
                              <input type="text" class="form-control">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Overview</label>
                        <div class="col-sm-9">
                              <textarea name="bio" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Trailer</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Gallery</label>
                        <div class="col-sm-9">
                          <input type="file" name="photo" class="form-control-file">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Video</label>
                        <div class="col-sm-9">
                          <input type="file" name="photo" class="form-control-file">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Status</label>
                        <div class="i-checks col-sm-2">
                              <input id="radioCustom1" type="radio" value="option1" name="a" class="radio-template">
                              <label for="radioCustom1">Free</label>
                        </div>
                        <div class="i-checks col-sm-2">
                              <input id="radioCustom1" type="radio" value="option1" name="a" class="radio-template">
                              <label for="radioCustom1">Premium</label>
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <a href="#" type="button" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

</div>
@endsection