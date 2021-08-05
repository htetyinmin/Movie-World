@extends('layouts.frontend')
@section('title','Movie World | Login Page')
@section('content')

<!-- Main Class Start -->
<div class="main" id="main">
      <!-- Start Sub Header Section -->
      <div class="sub-header">
          <div class="container-fluid">
              <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                          <h2 class="Page-title">Please Login Your Account</h2>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-home"></i>
                                  <a href="#">Home</a>
                                  <i class="fa fa-angle-right"></i>
                              </li>
                              <li><a href="#">Login</a></li>
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
            <!-- Start Login Section -->
            <section class="login">

                <div class="container">

                  <div class="row text-center intro">
                        <div class="col-12">
                            <h2>Welcome Back !</h2>
                            <p class="text-max-800">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <!-- Col End -->
                  </div>
                  <div class="row">

                        <div class="col-lg-6">
                            <!-- Start Form -->
                            <form id="login-form" action="#" method="post" class="mb-4">
                                <div class="error-container"></div>
                                <div class="form-group">
                                    <label class="control-label col-xs-4">Username</label>
                                    <input type="text" class="form-control" name="username" required="required">
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-4">Password</label>
                                    <input type="password" class="form-control" name="password" required="required">
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-inline mb-3"><input type="checkbox" required="required"> Save Password</label>
                                    <button type="submit" class="btn btn-block hvr-sweep-to-right btn-primary btn-lg">Login</button>
                                </div>
                                <a href="reset-password.html">Lost your Password?</a>
                            </form>
                            <!-- Form End -->
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-md-6">
                                    <a href="watch-movie.html" class="btn facebook-color d-block hvr-sweep-to-right mb-3" tabindex="0"><i class="icofont-facebook mr-2" aria-hidden="true"></i>Facebook</a>
                                </div>
                                <!-- Col End -->
                                <div class="col-md-6">
                                    <a href="watch-movie.html" class="btn twitter-color d-block hvr-sweep-to-right mb-3" tabindex="0"><i class="icofont-twitter mr-2" aria-hidden="true"></i>Twitter</a>
                                </div>
                                <!-- Col End -->
                            </div>
                            <!-- Row End -->
                            <p class="text-center">Don't have an account? <a href="{{url('/register')}}">Sign up here!</a></p>
                        </div>
                        <!-- Col End -->
                        <div class="col-lg-6">
                            <img class="img-fluid" src="{{asset('frontend_assets/images/movworld.png')}}" alt="">
                        </div>
                        <!-- Col End -->
                  </div>
                  <!-- Row End -->
                </div>
                <!-- Container End -->
            </section>
            <!-- Login Section End -->
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