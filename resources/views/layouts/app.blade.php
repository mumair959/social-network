
<!doctype html>
<html lang="en" class="theme-fs-md">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Buzz N Stuff</title>
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
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

  <!-- vanillajs css -->
  <link rel="stylesheet" href="{{asset('assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css')}}">
  <!-- color customizer css -->
  <link rel="stylesheet" href="{{asset('assets/css/customizer.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">


  @vite(['resources/js/app.js'])
</head>

<body class="  ">
  <!-- loader Start -->
  <div id="loading">
        <div id="loading-center">
        </div>
  </div>
  <!-- loader END -->
  <!-- Wrapper Start -->
  @include('layouts.top_navbar')

  <!-- Left Sidebar Here -->

   <div id="app">
      <div class="position-relative">
      </div>

      @yield('content')
      
      <!-- Wrapper End-->
      <!-- offcanvas start -->

      <!-- Friends Sidebar Here -->
   </div>

   @include('layouts.footer')

   <!-- Live Customizer start -->
   <!-- Setting offcanvas start here -->
   @include('layouts.settings_sidebar')
   <!-- Settings sidebar end here -->
   
   <a class="btn btn-fixed-end btn-danger btn-icon btn-setting" id="settingbutton"
         data-bs-toggle="offcanvas" data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
         <span class="icon material-symbols-outlined animated-rotate text-white">
            settings
         </span>
   </a>  
   <!-- Live Customizer end -->

  <!-- <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn" aria-labelledby="shareBottomLabel">
     <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
         <div class="close-icon" data-bs-dismiss="offcanvas">
              <svg xmlns="http://www.w3.org/2000/svg"  width="24px" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
          </div>
     </div>
     <div class="offcanvas-body small">
        <div class="d-flex flex-wrap align-items-center">
           <div class="text-center me-3 mb-3">
              <img src="{{asset('assets/images/icon/08.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
              <h6>Facebook</h6>
           </div>
           <div class="text-center me-3 mb-3">
              <img src="{{asset('assets/images/icon/09.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
              <h6>Twitter</h6>
           </div>
           <div class="text-center me-3 mb-3">
              <img src="{{asset('assets/images/icon/10.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
              <h6>Instagram</h6>
           </div>
           <div class="text-center me-3 mb-3">
              <img src="{{asset('assets/images/icon/11.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
              <h6>Google Plus</h6>
           </div>
           <div class="text-center me-3 mb-3">
              <img src="{{asset('assets/images/icon/13.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
              <h6>LinkedIn</h6>
           </div>
           <div class="text-center me-3 mb-3">
              <img src="{{asset('assets/images/icon/12.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
              <h6>YouTube</h6>
           </div>
        </div>
     </div>
  </div>   -->
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

  <script src="{{asset('assets/js/charts/admin.js')}}"></script>
  
</body>

</html>