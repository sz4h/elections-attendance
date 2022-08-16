<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                @can('dashboard_access')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("admin.home") }}">
                            <i class="fas fa-fw fa-tachometer-alt nav-icon">
                            </i>
                            <p>
                                {{ trans('global.dashboard') }}
                            </p>
                        </a>
                    </li>
                @endcan

                @can('attend_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.attends.index") }}"
                           class="nav-link {{ request()->is("admin/attends") || request()->is("admin/attends/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-sign">
                            </i>
                            <p>
                                {{ trans('cruds.attends.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('report_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.reports.index") }}"
                           class="nav-link {{ request()->is("admin/reports") || request()->is("admin/reports/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-print">

                            </i>
                            <p>
                                {{ trans('cruds.report.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('result_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.results.index") }}"
                           class="nav-link {{ request()->is("admin/results") || request()->is("admin/results/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.result.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('voter_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.voters.index") }}"
                           class="nav-link {{ request()->is("admin/voters") || request()->is("admin/voters/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-thumbs-up">

                            </i>
                            <p>
                                {{ trans('cruds.voter.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('basic_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/candidates*") ? "menu-open" : "" }} {{ request()->is("admin/committees*") ? "menu-open" : "" }} {{ request()->is("admin/areas*") ? "menu-open" : "" }} {{ request()->is("admin/genders*") ? "menu-open" : "" }} {{ request()->is("admin/letters*") ? "menu-open" : "" }} {{ request()->is("admin/assignments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.basic.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('candidate_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.candidates.index") }}"
                                       class="nav-link {{ request()->is("admin/candidates") || request()->is("admin/candidates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-award">

                                        </i>
                                        <p>
                                            {{ trans('cruds.candidate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('committee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.committees.index") }}"
                                       class="nav-link {{ request()->is("admin/committees") || request()->is("admin/committees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-pin">

                                        </i>
                                        <p>
                                            {{ trans('cruds.committee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('area_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.areas.index") }}"
                                       class="nav-link {{ request()->is("admin/areas") || request()->is("admin/areas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-globe-asia">

                                        </i>
                                        <p>
                                            {{ trans('cruds.area.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('gender_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.genders.index") }}"
                                       class="nav-link {{ request()->is("admin/genders") || request()->is("admin/genders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-genderless">

                                        </i>
                                        <p>
                                            {{ trans('cruds.gender.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('letter_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.letters.index") }}"
                                       class="nav-link {{ request()->is("admin/letters") || request()->is("admin/letters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sort-alpha-down">

                                        </i>
                                        <p>
                                            {{ trans('cruds.letter.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('assignment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.assignments.index") }}"
                                       class="nav-link {{ request()->is("admin/assignments") || request()->is("admin/assignments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hands-helping">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assignment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}"
                                       class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}"
                                       class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}"
                                       class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}"
                                       class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('importer_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.importers.index") }}"
                           class="nav-link {{ request()->is("admin/importers") || request()->is("admin/importers/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-download">

                            </i>
                            <p>
                                {{ trans('cruds.importer.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                               href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                        <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>