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
                      <form id="signup-form" action="#" method="post">
                          <div class="error-container"></div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Username</label>
                                      <input class="form-control form-control-name" name="username" id="username" placeholder="" type="text" required="">
                                  </div>
                              </div>
                              <!-- Col End -->
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Email Address</label>
                                      <input type="email" class="form-control" name="email" required="required">
                                  </div>
                              </div>
                              <!-- Col End -->
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>First Name</label>
                                      <input class="form-control form-control-name" name="username" id="first-name" placeholder="" type="text" required="">
                                  </div>
                              </div>
                              <!-- Col End -->
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Last Name</label>
                                      <input class="form-control form-control-name" name="username" id="last-name" placeholder="" type="text" required="">
                                  </div>
                              </div>
                              <!-- Col End -->
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Password</label>
                                      <input type="password" class="form-control" name="password" id="password" required="required">
                                  </div>
                              </div>
                              <!-- Col End -->
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Confirm Password</label>
                                      <input type="password" class="form-control" name="confirm_password" id="confirm-password" required="required">
                                  </div>
                              </div>
                              <!-- Col End -->
                          </div>
                          <div class="form-group">
                              <label>Select Plan</label>
                              <select class="form-control" name="select-plan" aria-label="Default select example" id="select-plan">
                                  <option value="1">STANDARD - Free</option>
                                  <option value="2">Platinum - $79/mo</option>
                                  <option value="3">Premium - $120/mo</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="checkbox-inline mb-3" style="width:100%;"><input type="checkbox" required="required"> I accept the <a href="terms.html">Terms of Use</a> &amp; <a href="privacy.html">Privacy Policy</a>.</label>
                              <button class="btn hvr-sweep-to-right" type="submit">Sign Up</button>
                          </div>
                      </form>
                      <!-- Form End -->
                      <div class="text-center">Already have an account? <a href="login.html">Login here</a></div>
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