@can('view_dashboard')
<li class="side-menus {{ Request::is('admin') ? 'active' : '' }}">
    <a class="nav-link" href="{{ aurl('/') }}">
        <i class=" fas fa-building"></i><span>@lang('crud.dashboard')</span>
    </a>
</li>
@endcan

@can('view_users')
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown">
        <i class="fas fa-users"></i><span>@lang('models/users.users')</span></a>
    <ul class="dropdown-menu">
        @can('view_roles')
        <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
            <a href="{{ route('admin.roles.index') }}"><i class="fab fa-critical-role"></i><span>@lang('models/roles.plural')</span></a>
        </li>
        @endcan
        @can('view_users')
        <li class="{{ (Request::is('admin/users') && request('role') == '') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i><span>@lang('models/users.users')</span></a>
        </li>
        @endcan
    </ul>
</li>
@endcan

<li class="{{ Request::is('admin/countries*') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('admin.countries.index') }}">
        <i class="fas fa-flag"></i>
        <span>@lang('models/countries.plural')</span>
    </a>
</li>


<li class="side-menus {{ Request::is('admin/themes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.themes.index') }}"><i class="fas fa-photo-video"></i><span>@lang('models/themes.plural')</span></a>
</li>

<li class="side-menus {{ Request::is('admin/sites*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.sites.index') }}"><i class="fas fa-sitemap"></i><span>@lang('models/sites.plural')</span></a>
</li>

@can('view_inquiries')
    <li class="side-menus {{ Request::is('admin/inquiries*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.inquiries.index') }}"><i class="fas fa-question"></i><span>@lang('models/inquiries.plural')</span></a>
    </li>
@endcan

