<div class="col-lg-3">
    <div class="d-sidebar">
        <h3>{{ __('candidate_dashboard') }}</h3>
        <ul class="sidebar-menu">
            <li>
                <a class="{{ request()->routeIs('candidate.dashboard') ? 'active' : '' }}"
                    href="{{ route('candidate.dashboard') }}">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-left tw-flex tw-items-center">
                            <i class="ph-stack"></i>
                        </span>
                        <span class="button-text">
                            {{ __('overview') }}
                        </span>
                    </span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('candidate.appliedjob') ? 'active' : '' }}"
                    href="{{ route('candidate.appliedjob') }}">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-left tw-flex tw-items-center">
                            <i class="ph-suitcase-simple"></i>
                        </span>
                        <span class="button-text">
                            {{ __('applied_jobs') }}
                        </span>
                    </span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('candidate.bookmark') ? 'active' : '' }}"
                    href="{{ route('candidate.bookmark') }}">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-left tw-flex tw-items-center">
                            <i class="ph-bookmark-simple"></i>
                        </span>
                        <span class="button-text">
                            {{ __('favorite_jobs') }}
                        </span>
                    </span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('candidate.job.alerts') ? 'active' : '' }}"
                    href="{{ route('candidate.job.alerts') }}">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-left tw-flex tw-items-center">
                            <i class="ph-bell-ringing"></i>
                        </span>
                        <span class="button-text">
                            {{ __('job_alert') }}
                        </span>
                    </span>
                </a>
            </li>
            @if (auth()->user('user')->status == 1)
            <li>
                <a class="{{ request()->routeIs('candidate.setting') ? 'active' : '' }}"
                    href="{{ route('candidate.setting') }}">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-left tw-flex tw-items-center">
                            <i class="ph-user-circle-gear"></i>
                        </span>
                        <span class="button-text">
                            {{ __('profile_update') }}
                        </span>
                    </span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('candidate.account-setting') ? 'active' : '' }}"
                    href="{{ route('candidate.account-setting') }}">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-left tw-flex tw-items-center">
                            <i class="ph-gear"></i>
                        </span>
                        <span class="button-text">
                            {{ __('account_setting') }}
                        </span>
                    </span>
                </a>
            </li>
                
            @endif
            <li>
                <a class="{{ request()->routeIs('logout') ? 'active' : '' }}" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-left tw-flex tw-items-center">
                            <i class="ph-sign-out"></i>
                        </span>
                        <span class="button-text">
                            {{ __('log_out') }}
                        </span>
                    </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

</div>
