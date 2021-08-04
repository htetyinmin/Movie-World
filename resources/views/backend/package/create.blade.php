@extends('layouts.backend')
@section('content')
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Packages Create Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Packages Data</li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{route('package.index')}}" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
      </div>

      <!-- Form Elements -->
      <div class="col-lg-12">
            <div class="block">
              <div class="title"><strong>Create Package Data</strong></div>
              <div class="block-body">
                <form class="form-horizontal" action="{{route('package.store')}}" method="post">
                  @csrf
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Fees</label>
                        <div class="col-sm-9">
                        <input type="text" name="fees" class="form-control">
                        </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Period</label>
                        <div class="col-sm-9">
                          <input type="text" name="period" class="form-control">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Description</label>
                        <div class="col-sm-9">
                              <textarea name="description" cols="30" rows="4" class="form-control"></textarea>
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
                  $('.input-images').imageUploader();
            })
      </script>

@endsection