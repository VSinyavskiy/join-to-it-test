<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu tree" data-widget="tree">

      <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
      	<a href="{{ route('admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>{{ __('admin_layout.global.dashboard_title') }}</span>
        </a>
      </li>
      <li class="header">{{ __('admin.sidebar.resources_header') }}</li>

      <li class="{{ \Request::is('*employees*') ? 'active' : '' }}">
        <a href="{{ route('admin.employees.index') }}">
          <i class="fa fa-users"></i> <span>{{ __('admin.sidebar.employees_resource') }}</span>
        </a>
      </li>

    </ul>
  </section>
</aside>
