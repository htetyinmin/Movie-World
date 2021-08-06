@extends('layouts.frontend')
@section('title','Movie World | Register Page')
@section('content')

<!-- Start Sub Header Section -->
<div class="sub-header">
      <div class="container-fluid">
          <div class="row align-items-center">
              <div class="col-sm-12">
                  <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                      <h2 class="Page-title">Create An Account</h2>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-home"></i>
                              <a href="#">Home</a>
                              <i class="fa fa-angle-right"></i>
                          </li>
                          <li><a href="#">sign up</a></li>
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
      <!-- Start SignUp Section -->
      <section class="signup">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <!-- Start Form -->
                    <form id="signup-form" method="POST" action="{{ route('register') }}">
                        @csrf
                          <div class="error-container"></div>
                          <div class="row justify-content-center"">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>Name</label>

                                    <input class="form-control form-control-name @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" type="text" required autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Col End -->
                        </div>
                          <div class="row justify-content-center"">
                              
                              <div class="col-md-12 col-lg-6">
                                  <div class="form-group">
                                      <label>Email Address</label>
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </div>
                              <!-- Col End -->
                          </div>
                          
                          <div class="row justify-content-center"">
                              <div class="col-md-12 col-lg-6">
                                  <div class="form-group">
                                      <label>Password</label>
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-md-12 col-lg-6">
                                  <div class="form-group">
                                      <label>Confirm Password</label>
                                      <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required name="password_confirmation" autocomplete="new-password">
                                  </div>
                              </div>
                              <!-- Col End -->
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label class="checkbox-inline mb-3" style="width:100%;"><input type="checkbox" required="required"> I accept the <a href="terms.html">Terms of Use</a> &amp; <a href="privacy.html">Privacy Policy</a>.</label>
                                    <div class="text-center">
                                        <button class="btn hvr-sweep-to-right my-3" type="submit">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                      <!-- Form End -->
                      <div class="text-center">Already have an account? <a href="{{ route('login') }}">Login here</a></div>
                  </div>
                  <!-- Col End -->
              </div>
              <!-- Row End -->
          </div>
          <!-- Container End -->
      </section>
      <!-- SignUp Section End -->
  </div>
  <!-- Main Content End -->

@endsection