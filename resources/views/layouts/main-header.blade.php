<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/logo.png') }}"
                        class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">
            <ul class="nav">


                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                    src=" @if ( LaravelLocalization::getCurrentLocale() == 'ar' )
                                    {{ URL::asset('assets/img/flags/egy_flag.jpg') }}
                                       @else
                                        {{ URL::asset('assets/img/flags/us_flag.jpg') }}
                                    @endif     " alt="img"></span>
                            <div class="my-auto">

                            </div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">

                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a  class="dropdown-item d-flex" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span class="avatar  ml-3 align-self-center bg-transparent"><img
                                        src="@if ($properties['native'] !='English')
                                            {{ URL::asset('assets/img/flags/Egypt_Flag.svg') }}
                                            @else
                                             {{ URL::asset('assets/img/flags/us_flag.jpg') }}
                                        @endif
                                        " alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">    {{ $properties['native'] }} </span>

                                </div>
                            </a>

                         @endforeach
        </div>
    </div>
    </li>


    </ul>
    <div class="nav nav-item  navbar-nav-right ml-auto">
        <div class="nav-link" id="bs-example-navbar-collapse-1">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="reset" class="btn btn-default">
                            <i class="fas fa-times"></i>
                        </button>
                        <button type="submit" class="btn btn-default nav-link resp-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </span>
                </div>
            </form>
        </div>

        <div class="nav-item full-screen fullscreen-button">
            <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                    class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize">
                    <path
                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                    </path>
                </svg></a>
        </div>
        <div class="dropdown main-profile-menu nav nav-item nav-link">
            <a class="profile-user d-flex" href=""><img alt="" src="{{ '/uploads/user_images/' . auth()->user()->image }}"></a>
            <div class="dropdown-menu">
                <div class="main-header-profile bg-primary p-3">
                    <div class="d-flex wd-100p">
                        <div class="main-img-user"><img alt="" src="{{ '/uploads/user_images/' . auth()->user()->image }}"
                                class=""></div>
                        <div class="mr-3 my-auto">
                            <h6>{{ auth()->user()->first_Name . ' ' }}{{ auth()->user()->last_Name }}</h6><span>{{ auth()->user()->email}}</span>
                        </div>
                    </div>
                </div>
                <a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
                <a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
                <a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
                <a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
                <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-log-out"></i> @lang('site.logout')</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>
<!-- /main-header -->
