@extends('layouts.frontend')
@section('title','Movie World | User Detail Page')
@section('content')


<div class="sub-header">
      <div class="container-fluid">
          <div class="row align-items-center">
              <div class="col-sm-12">
                  <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                      <h2 class="Page-title">About - <a href="#">Kvim</a></h2>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-home"></i>
                              <a href="{{url('/')}}">Home</a>
                              <i class="fa fa-angle-right"></i>
                          </li>
                          <li><a href="#">User</a></li>
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


@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.image-link').magnificPopup({type:'image'});
    })
  </script>
@endsection