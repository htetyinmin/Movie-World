@extends('layouts.frontend')
@section('title','Movie World | Package Page')
@section('content')

<div class="main" id="main">
      <!-- Start Sub Header Section -->
      <div class="sub-header">
          <div class="container-fluid">
              <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                          <h2 class="Page-title">Package Plans</h2>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-home"></i>
                                  <a href="{{url('/')}}">Home</a>
                                  <i class="fa fa-angle-right"></i>
                              </li>
                              <li><a href="#">Package</a></li>
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
      <!-- Sub Header Section End -->
      <!-- Start Main Content -->
      <div class="main-content">
          <!-- Start Pricing Section -->
          <section class="pricing">
              <div class="container">
                <section>
                    <form action="{{ route('pricing') }}" method="post" id="reactivateForm">
                    @csrf
                        <input type="hidden" name="planid" id="planid">

                        <h3 style="margin-bottom: 37px;">Choose Your Plan?</h3>
                        <div class="grid">

                            @foreach($packages as $key => $package)
                            @php
                                $data = json_decode($package->description,true);
                            @endphp
                            <div class="grid-item @if($key == 0) active @endif" id="{{ $package->id }}">
                                <div class="thumb" id="{{ $package->id }}">
                                    <h3> {{ $package->title }} Plan </h3>
                                    <h5> {{ $package->period }} </h5>
                                    <div class="pb-2 pt-5">
                                        @foreach($data as $result)
                                          <p  class=""> 
                                            <i class="fa fa-check-circle text-success mr-2"></i> {{$result}} 
                                          </p>
                                        @endforeach
                                    </div>
                                    
                                </div>
                                <div class="heading">{{ $package->fees }}</div>
                            </div>

                            @endforeach
                            
                        </div>

                        <div class="text-right">
                            <a class="btn btn-primary hvr-sweep-to-right text-uppercase purchaseBtn" href="
                                @if(Auth::user())
                                    {{route('index')}}
                                @else
                                    {{route('login')}}
                                @endif
                            ">Purchase</a>
                        </div>
                    </form>
                </section>
                  
                  {{-- <div class="row">
                      @foreach ($packages as $package)
                        @php
                            $data = json_decode($package->description,true);
                        @endphp
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">{{$package->title}}</h5>
                                    <h6 class="card-price text-center">{{$package->fees}}<span class="period"><br>{{$package->period}}</span></h6>
                                    <hr>
                                    <ul class="pl-0">
                                        @foreach($data as $result)
                                              <p  class=""> 
                                                <i class="fa fa-check-circle text-success mr-2"></i> {{$result}} 
                                              </p>
                                            @endforeach
                                        
                                    </ul>
                                    <a href="#" class="btn btn-block btn-primary hvr-sweep-to-right text-uppercase">Purchase</a>
                                </div>
                                
                            </div>
                           
                        </div>
                      @endforeach
                      
                  </div> --}}
                  <!-- Row End -->
              </div>
              <!-- Container End -->
          </section>
          <!-- Pricing Section End -->
      </div>
      <!-- Main Content End -->
      
      <!-- To Top Button Start-->
      <div class="back-to-top-btn">
          <div class="back-to-top" style="display: block;">
              <a aria-hidden="true" class="fas fa-angle-up" href="#"></a>
          </div>
      </div>
      <!-- To Top Button End -->
  </div>
  <!-- Main Class End -->

@endsection

@section('script')
    <script type="text/javascript">
        var planid;
        $(document).ready(function(){
            planid = $("#reactivateForm div.active").attr('id');

            $('.grid .grid-item').click(function(){
                $('.grid .grid-item').removeClass('active');

                $(this).addClass('active');
                planid = $("#reactivateForm div.active").attr('id');

            })
        });

        $('#reactivateForm').on('click', '.purchaseBtn', function (){

            $('#planid').val(planid);

            form.submit();
        });
    </script>
@endsection