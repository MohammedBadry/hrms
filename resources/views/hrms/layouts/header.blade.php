<header class="navbar navbar-fixed-top bg-system">
    <div class="navbar-logo-wrapper">
        <a class="navbar-logo-text" href="#">
            <img src="{{ URL::asset('assets/img/logo.png') }}" width="200px" height="50px" alt="avatar">
        </a>
        <span id="sidebar_left_toggle" class="ad ad-lines"></span>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <!--li class="hidden-xs">
            <a class="navbar-fullscreen toggle-active" href="#">
                <span class="glyphicon glyphicon-fullscreen"></span>
            </a>
        </li-->
        <li class="dropdown dropdown-fuse">
            <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                <span class="hidden-xs"><name>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'عربي' : 'English' }}</name> </span>
                <span class="fa fa-caret-down hidden-xs mr15"></span>
            </a>
            </a>
                <ul class="dropdown-menu list-group keep-dropdown w150" role="menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="dropdown-footer text-center">
                            <a class="btn btn-primary btn-sm btn-bordered w150" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $localeCode == 'ar' ? 'عربي' : 'English' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-fuse">
            <div class="navbar-btn btn-group">
        <li class="dropdown dropdown-fuse">
            <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                <span class="hidden-xs"><name>{{\Auth::user()->name}}</name> </span>
                <span class="fa fa-caret-down hidden-xs mr15"></span>
                @if(\Auth::user()->employee->photo)
                    <img src="{{\Auth::user()->employee->photo}}" width="50px" height="50px" style="border-radius: 50px" alt="avatar" class="mw55">
                @else
                <img src="{{ URL::asset('assets/img/avatars/profile_pic.png') }}" width="50px" height="50px" alt="avatar" style="border-radius: 25px" class="mw55">
                    @endif
            </a>
            </a>
                <ul class="dropdown-menu list-group keep-dropdown" role="menu">
                    <li class="dropdown-footer text-center">
                        <a href="/profile" class="btn btn-primary btn-sm btn-bordered w150">
                            <span class="fa fa-user pr5"></span> {{ trans('main.profile') }} </a>
                    </li>
                    @if(\Route::getFacadeRoot()->current()->uri() != 'change-password')
                    <li class="dropdown-footer text-center">
                        <a href="/change-password" class="btn btn-primary btn-sm btn-bordered w150">
                            <span class="fa fa-lock pr5"></span> {{ trans('main.change_password') }} </a>
                    </li>
                    @endif
                    <li class="dropdown-footer text-center">
                        <a href="/logout" class="btn btn-primary btn-sm btn-bordered w150">
                            <span class="fa fa-power-off pr5"></span> {{ trans('main.logout') }} </a>
                    </li>
                </ul>
        </li>
    </ul>
</header>