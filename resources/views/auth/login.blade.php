<!DOCTYPE html>

<html lang="en" class="light-style   layout-menu-fixed>



<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>AppointCMS</title>
  <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
  <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="WvBWUaGOEAeS2gsLIheEdLTVLRVTvO3HBUC8dIP9">
  <!-- Canonical SEO -->
  <link rel="canonical" href="">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="" />


<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxiconsc4a7.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome8a69.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons80a8.css')}}" />
<!-- Core CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/corea8ac.css')}}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default4c4b.css')}}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{asset('assets/css/demob77a.css')}}" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbare482.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead05d2.css')}}" />

<!-- Vendor Styles -->
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}" />


<!-- Page Styles -->
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

<script src="{{asset('assets/vendor/js/helpers.js')}}"></script>

  <script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>

  <script src="{{asset('assets/js/config.js')}}"></script>
</head>

<body>
  
<!-- Content -->
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
          <!-- Login -->
          <div class="card">
              <div class="card-body">
                  <div class="app-brand justify-content-center">
                      <a href="bootstrap-html-laravel-admin-template/demo-1" class="app-brand-link gap-2">
                          <span class="app-brand-logo demo"><svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <!-- Your SVG logo content -->
                          </svg></span>
                          <span class="app-brand-text demo text-body fw-bold">AppointCMS</span>
                      </a>
                  </div>
                  <h4 class="mb-2">Welcome to AppointCMS 👋</h4>
                  <p class="mb-4">Please sign-in to your account and start the adventure</p>

                  <form method="POST" action="{{ route('login') }}">
                      @csrf

                      <div class="mb-3">
                          <label for="email" class="form-label">Email or Username</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
                      </div>
                      <div class="mb-3 form-password-toggle">
                          <div class="d-flex justify-content-between">
                              <label class="form-label" for="password">Password</label>
                              <a href="">
                                  <small>Forgot Password?</small>
                              </a>
                          </div>
                          <div class="input-group input-group-merge">
                              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                      </div>
                      <div class="mb-3">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember">
                              <label class="form-check-label" for="remember">
                                  Remember Me
                              </label>
                          </div>
                      </div>
                      <div class="mb-3">
                          <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                      </div>
                  </form>

                  <p class="text-center">
                      <span>New on our platform?</span>
                      <a href="{{ route('register') }}">
                          <span>Create an account</span>
                      </a>
                  </p>

                  <div class="divider my-4">
                      <div class="divider-text">or</div>
                  </div>

                  <div class="d-flex justify-content-center">
                      <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                          <i class="tf-icons bx bxl-facebook"></i>
                      </a>

                      <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                          <i class="tf-icons bx bxl-google-plus"></i>
                      </a>

                      <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                          <i class="tf-icons bx bxl-twitter"></i>
                      </a>
                  </div>
              </div>
          </div>
          <!-- /Login -->
      </div>
  </div>
</div>
<!--/ Content -->



<script src="assets/vendor/libs/jquery/jquery1e84.js"></script>
<script src="assets/vendor/libs/popper/popper0a73.js"></script>
<script src="assets/vendor/js/bootstrapcfc4.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js"></script>
<script src="assets/vendor/libs/hammer/hammer2de0.js"></script>
<script src="assets/vendor/libs/typeahead-js/typeahead60e7.js"></script>
<script src="assets/vendor/js/menu2dc9.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/js/maind63d.js')}}"></script>


<script src="{{asset('assets/js/pages-auth.js')}}"></script>
<!-- END: Page JS-->

</body>
</html>
