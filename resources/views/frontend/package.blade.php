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
                                  <a href="#">Home</a>
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
                      <!-- Standard Plan -->
                      <div class="col-lg-4">
                          <div class="card mb-5 mb-lg-0">
                              <div class="card-body">
                                  <h5 class="card-title text-muted text-uppercase text-center">Standard</h5>
                                  <h6 class="card-price text-center">$0<span class="period">/month</span></h6>
                                  <hr>
                                  <ul class="fa-ul">
                                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span><strong>New Movies</strong></li>
                                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Streamit Special</li>
                                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>American Tv Shows</li>
                                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Hollywood Movies</li>
                                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>FHD (1080p) Video Quality</li>
                                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Ad Free Entertainment</li>
                                  </ul>
                                  <a href="#" class="btn btn-block btn-primary hvr-sweep-to-right text-uppercase">Purchase</a>
                              </div>
                              <!-- Card Body End -->
                          </div>
                          <!-- Card End -->
                      </div>
                      <!-- Col End -->
                      <!-- Platinum Plan -->
                      <div class="col-lg-4">
                          <div class="card mb-5 mb-lg-0">
                              <div class="card-body">
                                  <h5 class="card-title text-muted text-uppercase text-center">Platinum</h5>
                                  <h6 class="card-price text-center">$79<span class="period">/month</span></h6>
                                  <hr>
                                  <ul class="fa-ul">
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>New Movies</strong></li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Streamit Special</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>American Tv Shows</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Hollywood Movies</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>FHD (1080p) Video Quality</li>
                                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Ad Free Entertainment</li>
                                  </ul>
                                  <a href="#" class="btn btn-block btn-primary hvr-sweep-to-right text-uppercase">Purchase</a>
                              </div>
                              <!-- Card Body End -->
                          </div>
                          <!-- Card End -->
                      </div>
                      <!-- Col End -->
                      <!-- Platinum Premium -->
                      <div class="col-lg-4">
                          <div class="card">
                              <div class="card-body">
                                  <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
                                  <h6 class="card-price text-center">$120<span class="period">/month</span></h6>
                                  <hr>
                                  <ul class="fa-ul">
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>New Movies</strong></li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Streamit Special</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>American Tv Shows</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Hollywood Movies</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>FHD (1080p) Video Quality</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Ad Free Entertainment</li>
                                  </ul>
                                  <a href="#" class="btn btn-block btn-primary hvr-sweep-to-right text-uppercase">Purchase</a>
                              </div>
                              <!-- Card Body End -->
                          </div>
                          <!-- Card End -->
                      </div>
                      <!-- Col End -->
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