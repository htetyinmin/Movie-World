@extends('layouts.frontend')
@section('title','Movie World | User Detail Page')
@section('content')

@foreach ($users as $user)

<div class="sub-header">
      <div class="container-fluid">
          <div class="row align-items-center">
              <div class="col-sm-12">
                  <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                    <h2 class="Page-title"><a href="#">{{$user->name}}</a></h2>
                
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

<section class="play-details">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="play-thumb mb-4">
                    <img class="img-fluid" src="{{asset('frontend_assets/images/play-page/01.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-9">
                <div class="col-4">
                    <h2 class="">{{$user->name}}</h2>
                </div>
                <hr>
                <div class="row mb-5">
                    <div class="details-info col-6">
                        <h4 class="mb-3 ml-3">Acount Member & Billing</h4>
                        <div class="col-8">
                            <a href="#" class="btn d-block hvr-sweep-to-right" tabindex="0">Cancle Membership</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <h6 class="mb-3">{{$user->email}}</h6>
                        <p>Password : **********</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6">
                        <h6 class="mb-3">MOVIE WORLD credit</h6>
                        @foreach ($payments as $payment)
                            <p>Your Plan is started at {{$payment->created_at->format('d M Y')}}.</p>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h4 class="ml-3">Plan Details</h4>
                    </div>
                    <div class="col-6">
                        @foreach ($payments as $payment)
                            @if($payment->package_id == 1)
                            <h4>Free</h4>
                            <span class="badge badge-pill badge-warning text-dark mb-3">Free</span>
                            @else
                            <h4>Premium</h4>
                            <span class="badge badge-pill badge-warning text-dark mb-3">Premium</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h4 class="ml-3">Settings</h4>
                    </div>
                    <div class="col-6 d-block">
                        <ul class=" p-0 mb-3">
                            <li class="mb-2"><a href="">Change Acount Name</a></li>
                            <li class="mb-2"><a href="">Change Password</a></li>
                            <li class="mb-2"><a href="">Management Payment Plan</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"">Sign Out</a></li>
                        </ul>
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
        <!-- row End -->
    </div>
    <!-- Container End -->
</section>
@endforeach

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.image-link').magnificPopup({type:'image'});
    })
  </script>
@endsection