<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>

<ul class="navbar-nav navbar-right">

    @if(auth()->user())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{(auth()->user()->avatar ? url(auth()->user()->avatar): asset('img/logo.png'))}}"
                     class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                    @lang('crud.Hi'), {{auth()->user()->name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                   @lang('crud.Welcome') , {{auth()->user()->name}}</div>
                <a class="dropdown-item has-icon edit-profile" href="" data-id="{{ auth()->id() }}">
                    <i class="fa fa-user"></i> @lang('crud.Edit Profile')</a>

                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @endif
</ul>
