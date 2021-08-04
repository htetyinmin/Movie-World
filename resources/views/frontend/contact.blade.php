@extends('layouts.frontend')
@section('title','Movie World | Contact Page')
@section('content')

<!-- Main Class Start -->
<div class="main" id="main">
      <!-- Start Sub Header Section -->
      <div class="sub-header">
          <div class="container-fluid">
              <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center breadcrumb-nav">
                          <h2 class="Page-title">Contact Us</h2>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-home"></i>
                                  <a href="#">Home</a>
                                  <i class="fa fa-angle-right"></i>
                              </li>
                              <li><a href="#">Contact Us</a></li>
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
          <!-- Start Contact Us Section -->
          <section class="contact-us">
              <div class="container">
                  <div class="row text-center intro">
                      <div class="col-12">
                          <h2>How Can We Help?</h2>
                          <p class="text-max-800 text-secondary">Talk to one of our consultants today and learn how to start leveraging your business.</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12">
                          <!-- Start Form -->
                          <form id="contact-form" action="contact-form.php" method="post">
                              <div class="error-container"></div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Name</label>
                                          <input class="form-control form-control-name" name="visitor_name" id="name" placeholder="" type="text" required>
                                      </div>
                                  </div>
                                  <!-- Col End -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Email</label>
                                          <input class="form-control form-control-email" name="visitor_email" id="email" placeholder="" type="email" required>
                                      </div>
                                  </div>
                                  <!-- Col End -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Subject</label>
                                          <input class="form-control form-control-title" name="email_title" id="title" placeholder="" required>
                                      </div>
                                  </div>
                                  <!-- Col End -->
                              </div>
                              <!-- Row End -->
                              <div class="form-group">
                                  <label>Message</label>
                                  <textarea class="form-control form-control-message" name="visitor_message" id="message" placeholder="" rows="10" required></textarea>
                              </div>
                              <div>
                                  <button class="btn hvr-sweep-to-right" type="submit">Send Message</button>
                              </div>
                          </form>
                          <!-- Form End -->
                      </div>
                      <!-- Col End -->
                  </div>
                  <!-- Row End -->
              </div>
              <!-- Container End -->
          </section>
          <!-- Contact Us Section End -->
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