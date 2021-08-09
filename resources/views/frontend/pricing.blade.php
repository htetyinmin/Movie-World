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
                  <div class="row text-center intro">
                      <div class="col-12">
                          <h2>Our Monthly Plans</h2>
                          <p class="text-max-800">Choose the ideal plan for what you need. We work with affordable prices for all types of pocket.</p>
                      </div>
                      <!-- Col End -->
                  </div>
                  <!-- Row End -->
                  <div class="row">
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
                                        {{-- <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>{{$package->description}}</strong></li> --}}
                                        
                                    </ul>
                                    <a href="#" class="btn btn-block btn-primary hvr-sweep-to-right text-uppercase">Purchase</a>
                                </div>
                                <!-- Card Body End -->
                            </div>
                            <!-- Card End -->
                        </div>
                      @endforeach
                      
                  </div>
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