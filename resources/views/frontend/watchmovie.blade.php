@extends('layouts.frontend')
@section('title','Movie World | Movie Watch Page')
@section('content')


	<!-- Start Video Player -->
        <div class="video-container">
            <video class="video d-block" controls="" loop="">
                <source src="{{asset('storage/'.$movie->video)}}" type="video/mp4">
            </video>
        </div>
    <!-- Video Player End -->


@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.image-link').magnificPopup({type:'image'});
    })
  </script>
@endsection