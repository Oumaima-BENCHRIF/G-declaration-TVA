<header class="header navbar navbar-expand-sm">
   
    <ul class="navbar-item flex-row ">
        <!-- Using Switch option -->
        <li class="nav-item dropdown  fullscreen-dropdown">
            <a class="nav-link night-light-mode"  href="javascript:void(0);">
                <i class="las la-cloud-moon"id="darkModeIcon"></i>
            </a>
        </li>
        <li class="nav-item dropdown fullscreen-dropdown d-none d-lg-flex">
            <a class="nav-link full-screen-mode" href="javascript:void(0);">
                <i class="las la-compress" id="fullScreenIcon"></i>
            </a>
        </li>
        <li class="nav-item dropdown user-profile-dropdown">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <img src="{{ url('assets/img/images2.jpg') }}" alt="avatar">
            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="nav-drop is-account-dropdown" >
                    <div class="inner">
                        <div class="nav-drop-header">
                            <span class="text-primary font-15">Bienvenue</span>
                        </div>
                        <div class="nav-drop-body account-items pb-0">
                     
                            <a class="account-item" >
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-user font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong"> {{ auth()->user()->email }}</h6>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item" href="{{ url('/pages/timeline') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-briefcase font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('My Activity') }}</h6>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item settings">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-cog font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('Settings') }}</h6>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item" href="{{ url('/authentications/style3/locked') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-lock font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('Lock Screen') }}</h6>
                                    </div>
                                </div>
                            </a>
                            <hr class="account-divider">
                            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="badge outline-badge-primary" style="border:none">
        <div class="media align-center">
            <div class="icon-wrap">
                <i class="las la-sign-out-alt font-20"></i>
            </div>
            <div class="media-content ml-3">
                <h6 class="font-13 mb-0 strong">{{ __('Logout') }}</h6>
            </div>
        </div>
    </button>
    
</form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
     
</header>
