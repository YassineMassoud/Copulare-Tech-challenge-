<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url("/") }}" class="sidebar-brand" style="width: 100%;">
{{--            MEDICAL<span>CRM</span>--}}
{{--            Doctor's Letter--}}
            <img src="{{URL::asset('assets/images/logo.png')}}" alt="Logo" width="90%">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">

        <ul class="nav">


            @can('super_admin_permission')
                <li class="nav-item nav-category">Dashboard</li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

{{--                <li class="nav-item nav-category">Organizations</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">--}}
{{--                        <i class="link-icon" data-feather="mail"></i>--}}
{{--                        <span class="link-title">Organizations</span>--}}
{{--                        <i class="link-arrow" data-feather="chevron-down"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse" id="emails">--}}
{{--                        <ul class="nav sub-menu">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{url('super-admin/view-organization')}}" class="nav-link">View Organizations</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li class="nav-item nav-category">Packages</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">--}}
{{--                        <i class="link-icon" data-feather="feather"></i>--}}
{{--                        <span class="link-title">Packages</span>--}}
{{--                        <i class="link-arrow" data-feather="chevron-down"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse" id="uiComponents">--}}
{{--                        <ul class="nav sub-menu">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="pages/ui-components/accordion.html" class="nav-link">View Packages</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
            @endcan
        </ul>
    </div>
</nav>
