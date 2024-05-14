<!doctype html>
<html lang="en" class="theme-fs-md">
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>BuzzNStuff</title>
      <!-- Config Options -->
      
      <!-- End Config Options -->
      <link rel="shortcut icon" href="https://templates.iqonic.design/socialv/bs5/html/dist/assets/images/favicon.ico" />
      <link rel="stylesheet" href="{{asset('assets/css/libs.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/socialv006a.css?v=5.0.2')}}">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&amp;display=swap" rel="stylesheet">
      <!-- flatpickr css -->
      <link rel="stylesheet" href="{{asset('assets/vendor/flatpickr/dist/flatpickr.min.css')}}" />
      <!-- Sweetlaert2 css -->
      <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}"/>
      
      <!-- vanillajs css -->
      <link rel="stylesheet" href="{{asset('assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css')}}">
      <!-- color customizer css -->
      <link rel="stylesheet" href="{{asset('assets/css/customizer.css')}}">
  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
    <section class="sign-in-page">
        <div id="container-inside">
            <div id="circle-small"></div>
            <div id="circle-medium"></div>
            <div id="circle-large"></div>
            <div id="circle-xlarge"></div>
            <div id="circle-xxlarge"></div>
        </div>
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-md-6 text-center pt-5">
                    <div class="sign-in-detail text-white">
                        <a class="sign-in-logo mb-5" href="#"><img src="{{asset('assets/images/logo-full.png')}}" class="img-fluid" alt="logo" loading="lazy"></a>
                        <div class="sign-slider overflow-hidden ">
                            <ul  class="swiper-wrapper list-inline m-0 p-0 ">
                                <li class="swiper-slide">
                                    <img src="{{asset('assets/images/login/1.png')}}" class="img-fluid mb-4" alt="logo" loading="lazy">
                                    <h4 class="mb-1 text-white">Find new friends</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </li>
                                <li class="swiper-slide">
                                    <img src="{{asset('assets/images/login/2.png')}}" class="img-fluid mb-4" alt="logo"> 
                                    <h4 class="mb-1 text-white">Connect with the world</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </li>
                                <li class="swiper-slide">
                                    <img src="{{asset('assets/images/login/3.png')}}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Create new events</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                @yield('content')
                
            </div>
        </div>
    </section>   
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="{{asset('assets/js/libs.min.js')}}"></script>
    <!-- Lodash Utility -->
    <script src="{{asset('assets/vendor/lodash/lodash.min.js')}}"></script>
    <!-- Utilities Functions -->
    <script src="{{asset('assets/js/setting/utility.js')}}"></script>
    <!-- Settings Script -->
    <script src="{{asset('assets/js/setting/setting.js')}}"></script>
    <!-- Settings Init Script -->
    <script src="{{asset('assets/js/setting/setting-init.js')}}" defer></script>
    <!-- slider JavaScript -->
    <script src="{{asset('assets/js/slider.js')}}"></script>
    <!-- masonry JavaScript --> 
    <script src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{asset('assets/js/enchanter.js')}}"></script>
    <!-- Sweet-alert Script -->
    <script src="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}" async></script>
    <script src="{{asset('assets/js/sweet-alert.js')}}" defer></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('assets/js/customizer.js')}}"></script>
    <!-- app JavaScript -->
    <script src="{{asset('assets/js/charts/weather-chart.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <!-- Flatpickr Script -->
    <script src="{{asset('assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
    <!-- fslightbox Script -->
    <script src="{{asset('assets/js/fslightbox.js')}}" defer></script> 
    <!-- vanilla Script -->
    <script src="{{asset('assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>
    <!--lottie Script -->
    <script src="{{asset('assets/js/lottie.js')}}"></script>
    <!--select2 Script -->
    <script src="{{asset('assets/js/select2.js')}}"></script>
    
  </body>

<!-- Mirrored from templates.iqonic.design/socialv/bs5/html/dist/dashboard/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Oct 2023 16:09:09 GMT -->
</html>