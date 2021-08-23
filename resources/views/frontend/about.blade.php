@extends('layouts.frontend')
@section('title','Movie World')
@section('content')

<div class="main" id="main">
     
      <!-- Start Sub Header Section -->
      <div class="sub-header">
          <div class="container-fluid">
              <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                          <h2 class="Page-title">About Us</h2>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-home"></i>
                                  <a href="#">Home</a>
                                  <i class="fa fa-angle-right"></i>
                              </li>
                              <li><a href="#">About Us</a></li>
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
          <!-- Start Our Statistics Section -->
          <section class="statistics">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <h2 class="block-title">Our Statistics</h2>
                      </div>
                      <!-- Col End -->
                  </div>
                  <!-- Row End -->
                  <div class="row">
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                          <div class="icon-box text-center">
                              <div class="icon"><i class="fas fa-video"></i></div>
                              <div class="number count1" data-from="10" data-to="9300" data-time="1000">0</div>
                              <p>Movies</p>
                          </div>
                          <!-- Icon Box End -->
                      </div>
                      <!-- Col End -->
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                          <div class="icon-box text-center">
                              <div class="icon"><i class="fas fa-eye"></i></div>
                              <div class="number count2" data-from="10" data-to="7400" data-time="1000">0</div>
                              <p>Shows</p>
                          </div>
                          <!-- Icon Box End -->
                      </div>
                      <!-- Col End -->
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                          <div class="icon-box text-center">
                              <div class="icon"><i class="fas fa-users"></i></div>
                              <div class="number count3" data-from="10" data-to="1500" data-time="1000">0</div>
                              <p>Members</p>
                          </div>
                          <!-- Icon Box End -->
                      </div>
                      <!-- Col End -->
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                          <div class="icon-box text-center">
                              <div class="icon"><i class="fas fa-trophy"></i></div>
                              <div class="number count4" data-from="10" data-to="860" data-time="1000">0</div>
                              <p>Awards</p>
                          </div>
                          <!-- Icon Box End -->
                      </div>
                      <!-- Col End -->
                  </div>
                  <!-- Row end -->
              </div>
              <!-- Container end -->
          </section>
          <!-- Our Statistics Section End -->
          <div class="gap-50"></div>
          <!-- Start Subscribe Section -->
          <section class="subscribe section-parallax">
              <div class="container">
                  <div class="row">
                      <div class="col-md-6">
                          <img class="img-fluid mb-4" src="{{asset('frontend_assets/images/about/05.png')}}" alt="">
                      </div>
                      <!-- Col End -->
                      <div class="col-md-6">
                          <h2 class="mb-4">And If You
                              Join the Experience?</h2>
                          <p class="mb-4">True friendship is perhaps the only relation that survives the trials and tribulations of time and remains unconditional. A unique blend of affection, loyalty, love, respect, trust and loads of fun is perhaps what describes the true meaning of friendship. Similar interests, mutual respect and strong attachment with each other are what friends share between each other. These are just the general traits of a friendship. To experience what is friendship, one must have true friends, who are indeed rare treasure.</p>
                          <a class="btn hvr-sweep-to-right">Subscribe Now</a>
                      </div>
                      <!-- Col End -->
                  </div>
                  <!-- Row end -->
              </div>
              <!-- Container end -->
          </section>
          <!-- Subscribe Section End -->
          <div class="gap-50"></div>
          <!-- Start Our Team Section -->
          <section class="our-team">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <h2 class="block-title">Our Team</h2>
                      </div>
                      <!-- Col End -->
                  </div>
                  <!-- Row end -->
                  <div class="row">
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                          <div class="card team-box">
                              <div class="team-box-img">
                                  <img src="{{asset('frontend_assets/images/about/ab2.jpg')}}" class="img-fluid img-zoom" alt="">
                              </div>
                              <div class="card-body">
                                  <h2 class="card-title team-box-name">Kyaw Win Tun</h2>
                                  <span>Admin</span>
                              </div>
                          </div>
                          <!-- Team Box End -->
                      </div>
                      <!-- Col End -->
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                          <div class="card team-box">
                              <div class="team-box-img">
                                  <img src="{{asset('frontend_assets/images/about/ab1.jpg')}}" class="img-fluid img-zoom" alt="">
                              </div>
                              <div class="card-body">
                                  <h2 class="card-title team-box-name">Htet Yin Min</h2>
                                  <span>Developer</span>
                              </div>
                          </div>
                          <!-- Team Box End -->
                      </div>
                      <!-- Col End -->
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                          <div class="card team-box">
                              <div class="team-box-img">
                                  <img src="{{asset('frontend_assets/images/about/ab3.jpg')}}" class="img-fluid img-zoom" alt="">
                              </div>
                              <div class="card-body">
                                  <h2 class="card-title team-box-name">Lisa</h2>
                                  <span>Designer</span>
                              </div>
                          </div>
                      </div>
                      <!-- Col End -->
                      <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="card team-box">
                            <div class="team-box-img">
                                <img src="{{asset('frontend_assets/images/about/ab4.png')}}" class="img-fluid img-zoom" alt="">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title team-box-name">Rose</h2>
                                <span>Data Manager</span>
                            </div>
                        </div>
                    </div>
                    <!-- Col End -->
                  </div>
                  <!-- Row end -->
              </div>
              <!-- Container end -->
          </section>
          <!-- Our Team Section End -->
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