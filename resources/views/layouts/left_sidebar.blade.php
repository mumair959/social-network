<aside class="sidebar sidebar-default sidebar-base navs-rounded-all " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
      <div class="sidebar-body pt-0 data-scrollbar">
          <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Social</span>
                        <span class="mini-icon" data-bs-toggle="tooltip" title="Social" data-bs-placement="right">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active'  : ''}}" aria-current="page"
                        href="{{route('home')}}">
                        <i class="icon material-symbols-outlined">
                            newspaper
                        </i>
                        <span class="item-name">User Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'explore' ? 'active'  : ''}}" aria-current="page"
                        href="{{route('explore')}}">
                        <i class="icon material-symbols-outlined">
                            newspaper
                        </i>
                        <span class="item-name">Explore</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active'  : ''}}" href="{{route('profile')}}" role="button" aria-expanded="false"
                        aria-controls="profile">
                        <i class="icon material-symbols-outlined">
                            person
                        </i>
                        <span class="item-name">Profile</span>
                    </a>    
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#friend-list" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon material-symbols-outlined">
                            people
                        </i>
                        <span class="item-name">Friend</span>
                        <i class="right-icon material-symbols-outlined">chevron_right</i>
                    </a>
                    <ul class="sub-nav collapse" id="friend-list" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link "
                                href="{{route('friends')}}">
                                <i class="icon material-symbols-outlined filled">
                                    fiber_manual_record
                                </i>
                                <i class="sidenav-mini-icon"> FL </i>
                                <span class="item-name"> Friend List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page"
                                href="{{route('friend_requests')}}">
                                <i class="icon material-symbols-outlined filled">
                                    fiber_manual_record
                                </i>
                                <i class="sidenav-mini-icon"> FR </i>
                                <span class="item-name">Friend Request</span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'notifications' ? 'active'  : ''}}" aria-current="page"
                        href="{{route('notifications')}}">
                        <i class="icon material-symbols-outlined">
                            notifications
                        </i>
                        <span class="item-name">Notification</span>
                    </a>
                </li>
                <!-- <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Featured</span>
                        <span class="mini-icon" data-bs-toggle="tooltip" title="Social" data-bs-placement="right">-</span>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link " aria-current="page"
                        href="#" target="_blank">
                        <i class="icon material-symbols-outlined">
                            message
                        </i>
                        <span class="item-name">Chat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page"
                        href="#">
                        <i class="icon material-symbols-outlined">
                            calendar_month
                        </i>
                        <span class="item-name">Calendar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page"
                        href="#">
                        <i class="icon material-symbols-outlined">
                            cake
                        </i>
                        <span class="item-name">Birthday</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'faqs' ? 'active'  : ''}}" aria-current="page"
                        href="{{route('faqs')}}">
                        <i class="icon material-symbols-outlined">
                            message
                        </i>
                        <span class="item-name">FAQs</span>
                    </a>
                </li>
                @if(Auth::user()->isAdmin())
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Admin Section</span>
                        <span class="mini-icon" data-bs-toggle="tooltip" title="Social" data-bs-placement="right">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin_users_list' ? 'active'  : ''}}" href="{{route('admin_users_list')}}" role="button" aria-expanded="false"
                        aria-controls="users">
                        <i class="icon material-symbols-outlined">
                            people
                        </i>
                        <span class="item-name">Users Management</span>
                    </a>    
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin_groups_list')}}" role="button" aria-expanded="false"
                        aria-controls="groups">
                        <i class="icon material-symbols-outlined">
                            people
                        </i>
                        <span class="item-name">Groups Management</span>
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin_pages_list')}}" role="button" aria-expanded="false"
                        aria-controls="pages">
                        <i class="icon material-symbols-outlined">
                            message
                        </i>
                        <span class="item-name">Pages Management</span>
                    </a>    
                </li> -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin_problem_reported_list' ? 'active'  : ''}}" href="{{route('admin_problem_reported_list')}}" role="button" aria-expanded="false"
                        aria-controls="reports">
                        <i class="icon material-symbols-outlined">
                            calendar_month
                        </i>
                        <span class="item-name">Disputes Management</span>
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin_posts_list' ? 'active'  : ''}}" href="{{route('admin_posts_list')}}" role="button" aria-expanded="false"
                        aria-controls="posts">
                        <i class="icon material-symbols-outlined">
                            message
                        </i>
                        <span class="item-name">Posts Management</span>
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin_comments_list' ? 'active'  : ''}}" href="{{route('admin_comments_list')}}" role="button" aria-expanded="false"
                        aria-controls="comments">
                        <i class="icon material-symbols-outlined">
                            message
                        </i>
                        <span class="item-name">Comments Management</span>
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin_faqs_list' ? 'active'  : ''}}" href="{{route('admin_faqs_list')}}" role="button" aria-expanded="false"
                        aria-controls="comments">
                        <i class="icon material-symbols-outlined">
                            message
                        </i>
                        <span class="item-name">FAQs Management</span>
                    </a>    
                </li>
                @endif
            </ul>
            <!-- Sidebar Menu End -->        
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>