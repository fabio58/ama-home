<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/applicants') }}"><i class="nav-icon fa fa-plus-circle"></i> {{ trans('admin.applicant.title') }}</a></li>

           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-cogs"></i> {{ trans('admin.sidebar.settings.general') }}
                </a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/states') }}"><i class="nav-icon fa fa-globe"></i> {{ trans('admin.state.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/cities') }}"><i class="nav-icon fa fa-building"></i> {{ trans('admin.city.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/contact-methods') }}"><i class="nav-icon fa fa-compress"></i> {{ trans('admin.contact-method.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/disabilities') }}"><i class="nav-icon fa fa-wheelchair"></i> {{ trans('admin.disability.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/diseases') }}"><i class="nav-icon fa fa-medkit"></i> {{ trans('admin.disease.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/education-levels') }}"><i class="nav-icon fa fa-book"></i> {{ trans('admin.education-level.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/applicant-relationships') }}"><i class="nav-icon fa fa-retweet"></i> {{ trans('admin.applicant-relationship.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/statuses') }}"><i class="nav-icon fa fa-sitemap"></i> {{ trans('admin.status.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/questionnaire-types') }}"><i class="nav-icon fa fa-file"></i> {{ trans('admin.questionnaire-type.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/questionnaire-templates') }}"><i class="nav-icon fa fa-file-text"></i> {{ trans('admin.questionnaire-template.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>

                </ul>
            </li>



            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.access') }}</li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>

            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
