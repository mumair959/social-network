<div class="iq-top-navbar">
   <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar p-lg-0">
      <div class="container-fluid navbar-inner">
         <div class="d-flex align-items-center flex-lg-row-reverse gap-3 pb-2 pb-lg-0">
            <!-- <a class="sidebar-toggle" data-toggle="sidebar" data-active="true" href="javascript:void(0);">
               <div class="icon material-symbols-outlined iq-burger-menu">
                  menu
               </div>
            </a> -->
            <a href="{{route('home')}}"
               class="d-flex align-items-center gap-2 iq-header-logo">
               <svg width="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                     d="M1.67733 9.50001L7.88976 20.2602C9.81426 23.5936 14.6255 23.5936 16.55 20.2602L22.7624 9.5C24.6869 6.16666 22.2813 2 18.4323 2H6.00746C2.15845 2 -0.247164 6.16668 1.67733 9.50001ZM14.818 19.2602C13.6633 21.2602 10.7765 21.2602 9.62181 19.2602L9.46165 18.9828L9.46597 18.7275C9.48329 17.7026 9.76288 16.6993 10.2781 15.8131L12.0767 12.7195L14.1092 16.2155C14.4957 16.8803 14.7508 17.6132 14.8607 18.3743L14.9544 19.0239L14.818 19.2602ZM16.4299 16.4683L19.3673 11.3806C18.7773 11.5172 18.172 11.5868 17.5629 11.5868H13.7316L15.8382 15.2102C16.0721 15.6125 16.2699 16.0335 16.4299 16.4683ZM20.9542 8.63193L21.0304 8.5C22.1851 6.5 20.7417 4 18.4323 4H17.8353L17.1846 4.56727C16.6902 4.99824 16.2698 5.50736 15.9402 6.07437L13.8981 9.58676H17.5629C18.4271 9.58676 19.281 9.40011 20.0663 9.03957L20.9542 8.63193ZM14.9554 4C14.6791 4.33499 14.4301 4.69248 14.2111 5.06912L12.0767 8.74038L10.0324 5.22419C9.77912 4.78855 9.48582 4.37881 9.15689 4H14.9554ZM6.15405 4H6.00746C3.69806 4 2.25468 6.50001 3.40938 8.50001L3.4915 8.64223L4.37838 9.04644C5.15962 9.40251 6.00817 9.58676 6.86672 9.58676H10.2553L8.30338 6.22943C7.9234 5.57587 7.42333 5.00001 6.8295 4.53215L6.15405 4ZM5.07407 11.3833L7.88909 16.2591C8.05955 15.7565 8.28025 15.2702 8.54905 14.8079L10.4218 11.5868H6.86672C6.26169 11.5868 5.66037 11.5181 5.07407 11.3833Z"
                     fill="currentColor" />
               </svg>
               <h3 class="logo-title d-none d-sm-block" data-setting="app_name">BuzzNStuff</h3>
            </a>
            
         </div>
         
         <div class="iq-search-bar device-search  position-relative">
            <form action="#" class="searchbox">
               <a class="search-link d-none d-lg-block" href="javascript:void(0);">
                  <span class="material-symbols-outlined">search</span>
               </a>
               <input type="text" class="text search-input form-control bg-soft-primary  d-none d-lg-block"
                  placeholder="Search here...">
               <a class="d-lg-none d-flex d-none d-lg-block" href="javascript:void(0);">
                  <span class="material-symbols-outlined">search</span>
               </a>
            </form>
         </div>

         <ul class="navbar-nav navbar-list">
            <li class="nav-item d-lg-none">
               <div class="iq-search-bar device-search  position-relative">
                  <form action="#" class="searchbox">
                     <a class="search-link d-none d-lg-block" href="javascript:void(0);">
                        <span class="material-symbols-outlined">search</span>
                     </a>
                     <input type="text" class="text search-input form-control bg-soft-primary  d-none d-lg-block"
                        placeholder="Search here...">
                     <a class="d-lg-none d-flex" href="javascript:void(0);">
                        <span class="material-symbols-outlined">search</span>
                     </a>
                  </form>
               </div>
            </li>
            
            <li class="nav-item dropdown">
               <!-- <a href="javascript:void(0);" class="search-toggle dropdown-toggle d-flex align-items-center"
                  id="notification-drop" data-bs-toggle="dropdown">
                  <i class="material-symbols-outlined">notifications</i>
               </a> -->
               <div class="sub-drop dropdown-menu" aria-labelledby="notification-drop">
                  <div class="card shadow-none m-0">
                     <div class="card-header d-flex justify-content-between bg-primary">
                        <div class="header-title bg-primary">
                           <h5 class="mb-0 text-white">All Notifications</h5>
                        </div>
                        <small class="badge  bg-light text-dark">0</small>
                     </div>
                     <div class="card-body p-0">
                        <div class="text-center py-3">
                           <p class="mb-0">
                                 <i class="icon material-symbols-outlined font-50">
                                    search
                                 </i>
                           </p>
                           <h6 class="mb-0">No Notifications Found</h6>
                        </div>
                        <!-- <a href="javascript:void(0);" class="iq-sub-card">
                           <div class="d-flex align-items-center">
                              <div class="">
                                 <img class="avatar-40 rounded" src="{{asset('assets/images/user/01.jpg')}}" alt="">
                              </div>
                              <div class="ms-3 w-100">
                                 <h6 class="mb-0 ">Emma Watson Bni</h6>
                                 <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">95 MB</p>
                                    <small class="float-right font-size-12">Just Now</small>
                                 </div>
                              </div>
                           </div>
                        </a> -->
                     </div>
                  </div>
               </div>
            </li>
            <li class="nav-item d-none d-lg-none">
               <a href="https://templates.iqonic.design/socialv/bs5/html/dist/app/chat.html" class="dropdown-toggle d-flex align-items-center" id="mail-drop-1"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-symbols-outlined">mail</i>
                  <span class="mobile-text  ms-3">Message</span>
               </a>
            </li>
            <li class="nav-item dropdown user-dropdown">
               <a href="javascript:void(0);" class="d-flex align-items-center dropdown-toggle" id="drop-down-arrow"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{Auth::user()->userInfo->profile_image}}" class="img-fluid rounded-circle me-3" alt="user"
                     loading="lazy">
                  <div class="caption d-none d-lg-block">
                     <h6 class="mb-0 line-height">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h6>
                  </div>
               </a>
               <div class="sub-drop dropdown-menu caption-menu" aria-labelledby="drop-down-arrow">
                  <div class="card shadow-none m-0">
                     <div class="card-header ">
                        <div class="header-title">
                           <h5 class="mb-0 ">Hello {{Auth::user()->first_name.' '.Auth::user()->last_name}}</h5>
                        </div>
                     </div>
                     <div class="card-body p-0 ">
                        <div class="d-flex align-items-center iq-sub-card border-0">
                           <span class="material-symbols-outlined">
                              line_style
                           </span>
                           <div class="ms-3">
                              <a href="{{route('profile')}}" class="mb-0 h6">
                                 My Profile
                              </a>
                           </div>
                        </div>
                        <div class="d-flex align-items-center iq-sub-card border-0">
                           <span class="material-symbols-outlined">
                              edit_note
                           </span>
                           <div class="ms-3">
                              <a href="{{route('edit_profile')}}" class="mb-0 h6">
                                 Edit Profile
                              </a>
                           </div>
                        </div>
                        @if(Auth::user()->isAdmin())
                           <div class="d-flex align-items-center iq-sub-card border-0">
                              <span class="material-symbols-outlined">
                                 people
                              </span>
                              <div class="ms-3">
                                 <a href="{{route('admin_dashboard')}}" class="mb-0 h6">
                                    Admin Panel
                                 </a>
                              </div>
                           </div>
                        @endif
                        <div class="d-flex align-items-center iq-sub-card">
                           <span class="material-symbols-outlined">
                              login
                           </span>
                           <div class="ms-3">
                                 <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mb-0 h6">
                                    Sign out
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                 </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
         </ul>        
      </div>
   </nav>

   <nav class="navbar navbar-expand-lg border-top">
      <div>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
      </div>
      <div class="container justify-content-center center-align">
         <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active bg-soft-primary'  : ''}}" aria-current="page" href="{{route('home')}}">
                     <i class="icon material-symbols-outlined pull-left">
                        dashboard
                     </i>
                     <span class="item-name nav-item-font">User Dashboard</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ Route::currentRouteName() == 'explore' ? 'active bg-soft-primary'  : ''}}" href="{{route('explore')}}">
                     <i class="icon material-symbols-outlined pull-left">
                        newspaper
                     </i>
                     <span class="item-name nav-item-font">Explore</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active bg-soft-primary'  : ''}}" href="{{route('profile')}}">
                     <i class="icon material-symbols-outlined pull-left">
                        person
                     </i>
                     <span class="item-name nav-item-font">Profile</span>
                  </a>
               </li>
               <!-- <li class="nav-item">
                  <a class="nav-link {{ Route::currentRouteName() == 'notifications' ? 'active bg-soft-primary'  : ''}}" href="{{route('notifications')}}">
                     <i class="icon material-symbols-outlined pull-left">
                        notifications
                     </i>
                     <span class="item-name nav-item-font">Notifictions</span>
                  </a>
               </li> -->
               <li class="nav-item">
                  <a class="nav-link {{ Route::currentRouteName() == 'faqs' ? 'active bg-soft-primary'  : ''}}" href="{{route('faqs')}}">
                     <i class="icon material-symbols-outlined pull-left">
                        message
                     </i>
                     <span class="item-name nav-item-font">FAQs</span>
                  </a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="icon material-symbols-outlined pull-left">
                        lock
                     </i>   
                     <span class="item-name nav-item-font">Admin Section</span>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="{{route('admin_users_list')}}">Users Management</a></li>
                     <li><a class="dropdown-item" href="{{route('admin_posts_list')}}">Posts Management</a></li>
                     <li><a class="dropdown-item" href="{{route('admin_comments_list')}}">Comments Management</a></li>
                     <li><a class="dropdown-item" href="{{route('admin_problem_reported_list')}}">Disputes Management</a></li>
                     <li><a class="dropdown-item" href="{{route('admin_faqs_list')}}">FAQs Management</a></li>
                     <li><a class="dropdown-item" href="{{route('admin_tags_list')}}">Tags Management</a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>
   </nav>
</div>  