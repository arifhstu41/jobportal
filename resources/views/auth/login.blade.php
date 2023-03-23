@extends('admin.layouts.auth')
@section('content')



<div class="card col-sm-12 col-md-10 mx-auto p-0">
    <div class="card-header text-center">
        <img class="img-fluid img-thumbnail rounded-circle border border-5 border-primary-600" style="border-color: #1c458e" width="100" height="100" src="{{ asset('images/welfare-logo.png') }}" alt="welfarelogo">
    </div>
    <div class="card-body p-2">
        <div class="auth-box2">
            <form action="{{ route('login') }}" method="POST" class="rt-form" id="login_form">
                @csrf
                <div class="text-center" style="color: #2e3397">
                    <b class="rt-mb-20">LOGIN into WELFARE Account</b>
                <span class="d-block body-font-3 text-gray-600 rt-mb-32">
                    {{ __('dont_have_account') }}
                    <span>
                        <a href="{{ route('register') }}"><strong style="color: #2e3397">{{ __('create_account') }}</strong>
                        </a>
                    </span>
                </span>
                </div>
                <div class="fromGroup rt-mb-15">
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="{{ __('Mobile Number') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                    @enderror
                </div>
                <div class="rt-mb-15">
                    <div class="d-flex fromGroup">
                        <input name="password" id="password" value=""
                            class="form-control @error('password') is-invalid @enderror" type="password"
                            placeholder="{{ __('password') }}">
                        <div onclick="passToText('password','eyeIcon')" id="eyeIcon" class="has-badge">
                            <i class="ph-eye @error('password') m-3 @enderror"></i>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger" role="alert">{{ __($message) }}</span>
                    @enderror
                </div>
                @if (config('captcha.active'))
                    <div class="rt-mb-15">
                        <div class="g-custom-css">
                            {!! NoCaptcha::display() !!}
                        </div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger text-sm">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                @endif
                <div class="d-flex flex-wrap rt-mb-30">
                    <div class="flex-grow-1">
                        <div class="form-check from-chekbox-custom">
                            <input name="remember" id="remember" class="form-check-input" type="checkbox"
                                value="1">
                            <label class="form-check-label pointer text-gray-700 f-size-14" for="remember">
                                {{ __('keep_me_logged') }}
                            </label>
                        </div>
                    </div>
                    <div class="flex-grow-0">
                        <span class="body-font-4">
                            <a href="{{ route('password.request') }}" class="text-primary-500">
                                {{ __('forget_password') }}
                            </a>
                        </span>
                    </div>
                </div>
                <button id="submitButton" type="submit" class="btn btn-primary d-block rt-mb-15">
                    <span class="button-content-wrapper ">
                        <span class="button-icon align-icon-right">
                            <x-svg.rightarrow-icon />
                        </span>
                        <span class="button-text">
                            {{ __('log_in') }}
                        </span>
                    </span>
                </button>
            </form>
            @php
                $google = config('zakirsoft.google_active') && config('zakirsoft.google_id') && config('zakirsoft.google_secret');
                $facebook = config('zakirsoft.facebook_active') && config('zakirsoft.facebook_id') && config('zakirsoft.facebook_secret');
                $twitter = config('zakirsoft.twitter_active') && config('zakirsoft.twitter_id') && config('zakirsoft.twitter_secret');
                $linkedin = config('zakirsoft.linkedin_active') && config('zakirsoft.linkedin_id') && config('zakirsoft.linkedin_secret');
                $github = config('zakirsoft.github_active') && config('zakirsoft.github_id') && config('zakirsoft.github_secret');
            @endphp
            <div>
                @if ($google || $facebook || $twitter || $linkedin || $github)
                    <p class="or text-center">{{ __('or') }}</p>
                @endif
                <div class="row">
                    @if ($google)
                        <div class="justify-content-center col-12 rt-mb-15">
                            <a href="{{ route('social.login', 'google') }}"
                                class="btn btn-outline-plain d-block custom-padding me-3 rt-mb-xs-10 ">
                                <span class="button-content-wrapper">
                                    <span class="button-icon align-icon-left">
                                        <x-svg.google-icon />
                                    </span>
                                    <span class="button-text">
                                        {{ __('login_with_google') }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endif
                    @if ($facebook)
                        <div class="justify-content-center col-12 rt-mb-15">
                            <a href="{{ route('social.login', 'facebook') }}"
                                class="btn btn-outline-plain d-block custom-padding me-3 rt-mb-xs-10 ">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-left">
                                        <x-svg.facebook-icon />
                                    </span>
                                    <span class="button-text">
                                        {{ __('login_with_facebook') }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endif
                    @if ($twitter)
                        <div class="justify-content-center col-12 rt-mb-15">
                            <a href="{{ route('social.login', 'twitter') }}"
                                class="btn btn-outline-plain d-block custom-padding me-3 rt-mb-xs-10 ">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-left">
                                        <x-svg.twitter-icon fill="#007ad9" />
                                    </span>
                                    <span class="button-text">
                                        {{ __('login_with_twitter') }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endif
                    @if ($linkedin)
                        <div class="justify-content-center col-12 rt-mb-15">
                            <a href="{{ route('social.login', 'linkedin') }}"
                                class="btn btn-outline-plain d-block custom-padding me-3 rt-mb-xs-10 ">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-left">
                                        <x-svg.linkedin-icon />
                                    </span>
                                    <span class="button-text">
                                        {{ __('login_with_linkedin') }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endif
                    @if ($github)
                        <div class="justify-content-center col-12 rt-mb-15">
                            <a href="{{ route('social.login', 'github') }}"
                                class="btn btn-outline-plain d-block custom-padding me-3 rt-mb-xs-10 ">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-left">
                                        <x-svg.github-icon />
                                    </span>
                                    <span class="button-text">
                                        {{ __('login_with_github') }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-center mx-auto px-0 pt-0">
        <img class="img-fluid img-thumbnail" src="{{ asset('images/welfare-banner.png') }}" alt="welfarelogo">
    </div>
</div>
@endsection

@section('backend_auth_script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
