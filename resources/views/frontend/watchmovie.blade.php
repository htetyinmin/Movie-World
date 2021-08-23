@extends('layouts.frontend')
@section('title','Movie World')
@section('content')


	<!-- Start Video Player -->
        {{-- <div class="video-container">
            <video class="video d-block" controls="" loop="">
                <source src="{{asset('storage/'.$movie->video)}}" type="video/mp4">
            </video>
        </div> --}}
    <!-- Video Player End -->

    <div class="container-fluid">
      <div class="row justify-content-center">
          <iframe src="{{$movie->video}}" height="500" width="800" allow="autoplay" allowfullscreen></iframe>
      </div>
    </div>

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.image-link').magnificPopup({type:'image'});
    })
  </script>
@endsection