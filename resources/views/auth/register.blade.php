@extends('admin.layouts.auth')
@section('content')

    <div class="card col-sm-12 mx-auto p-0">
        <div class="card-header text-center">
            <img class="img-fluid img-thumbnail rounded-circle border border-5 border-primary-600"
                style="border-color: #1c458e" width="100" height="100" src="{{ asset('images/welfare-logo.png') }}"
                alt="welfarelogo">
        </div>
        <div class="card-body p-2">
            <div class="auth-box2">
                <form id="registerForm" action="{{ route('register') }}" method="POST" class="rt-form">
                    @csrf
                    <div class="row">
                        <div class="text-center" style="color: #2e3397">
                            <b class="rt-mb-20">{{ __('create_account') }}</b>
                            <span class="d-block body-font-3 text-gray-600 mb-2">
                                {{ __('already_have_account') }}
                                <span>
                                    <a href="{{ route('login') }}"><strong
                                            style="color: #2e3397">{{ __('log_in') }}</strong></a>
                                </span>
                            </span>
                        </div>
                        {{-- <div class="col-12">
                            <div class="tw-bg-[#F1F2F4] tw-rounded-lg tw-mb-6 tw-p-3">
                                <p class="tw-text-[#767F8C] tw-text-xs tw-font-medium tw-text-center tw-mb-2">
                                    {{ __('create_account_as_a') }}
                                </p>
                                <div class="switcher-container tw-px-0 tw-w-full tw-border-2 tw-border-red-600 tw-flex">
                                    <input id="switcher-toggle-on" class="switcher-toggle switcher-toggle-left tw-w-full"
                                        name="role" value="candidate" type="radio" checked="">
                                    <label for="switcher-toggle-on"
                                        class="switcher-button tw-w-full tw-rounded-tl-md  tw-rounded-bl-md" id="web-btn">
                                        <span>
                                            <x-svg.candidate-profile-icon />
                                        </span>
                                        <span>{{ __('candidate') }}</span>
                                    </label>
                                    <input id="switcher-toggle-off" class="switcher-toggle switcher-toggle-right tw-w-full"
                                        name="role" value="company" type="radio">
                                    <label for="switcher-toggle-off"
                                        class="switcher-button tw-w-full  tw-rounded-tr-md tw-rounded-br-md" id="wp-btn">
                                        <span>
                                            <x-svg.employer-profile-icon />
                                        </span>
                                        <span>{{ __('employer') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-12">
                            <div class="tw-bg-[#F1F2F4] tw-rounded-lg tw-mb-6 tw-p-3">
                                <p class="tw-text-[#767F8C] tw-text-xs tw-font-medium tw-text-center tw-mb-2">
                                    {{ __('create_account_as_a') }}
                                </p>
                                <div class="btn-group d-flex row" data-toggle="buttons">
                                    <div class="col-sm-12 col-md-6">
                                        <input type="radio" name="role" id="candidate" value="candidate" checked />
                                        <label for="candidate" class="btn btn-default d-block"> <span>
                                                <x-svg.candidate-profile-icon />
                                            </span>
                                            <span>{{ __('candidate') }}</span> </label>
                                    </div>
                                    <div class="col-sm-12 col-md-6">

                                        <input type="radio" name="role" id="company" value="company" />
                                        <label for="company" class="btn btn-default  d-block"> <span>
                                                <x-svg.employer-profile-icon />
                                            </span>
                                            <span>{{ __('employer') }}</span> </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="fromGroup rt-mb-15">
                                <input name="name" id="name" value="{{ old('name') }}"
                                    class="field form-control @error('name') is-invalid @enderror" type="text"
                                    placeholder="{{ __('full_name') }}" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-sm-12 col-md-6">
                            <div class="fromGroup rt-mb-15">
                                <input name="username" id="username" value=""
                                    class="field form-control @error('username') is-invalid @enderror" type="text"
                                    placeholder="user name">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="col-sm-12 col-md-6">
                            <div class="fromGroup rt-mb-15">
                                <input type="number" pattern="\d*" id="phone" value="{{ old('phone') }}"
                                    name="phone" class="field form-control @error('phone') is-invalid @enderror"
                                    placeholder="{{ __('phone') }}" >
                                @error('phone')
                                    <span class="invalid-feedback" id="phone_error" role="alert">{{ __($message) }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="fromGroup rt-mb-15">
                                <input type="email" id="email" value="{{ old('email') }}" name="email"
                                    class="field form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('email_address') }}(Optional)">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="rt-mb-15 col-md-6">
                            <div class="d-flex fromGroup">
                                <input name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" type="password"
                                    placeholder="{{ __('password') }}" >
                                <div onclick="passToText('password','eyeIcon')" id="eyeIcon" class="has-badge">
                                    <i class="ph-eye @error('password') m-3 @enderror"></i>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger" role="alert">{{ __($message) }}</span>
                            @enderror
                        </div>
                        <div class="rt-mb-15  col-md-6">
                            <div class="d-flex fromGroup">
                                <input name="password_confirmation" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    type="password" placeholder="{{ __('confirm_password') }}" >
                                <div onclick="passToText('password_confirmation','eyeIcon2')" id="eyeIcon2"
                                    class="has-badge">
                                    <i class="ph-eye @error('password_confirmation') m-3 @enderror"></i>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger" role="alert">{{ __($message) }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="rt-mb-15 col-md-6">
                            <div class="d-flex fromGroup">
                                <input name="password" id="password"
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
                        <div class="rt-mb-15  col-md-6">
                            <div class="d-flex fromGroup">
                                <input name="password_confirmation" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    type="password" placeholder="{{ __('confirm_password') }}">
                                <div onclick="passToText('password_confirmation','eyeIcon2')" id="eyeIcon2"
                                    class="has-badge">
                                    <i class="ph-eye @error('password_confirmation') m-3 @enderror"></i>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger" role="alert">{{ __($message) }}</span>
                            @enderror
                        </div>
                    </div> --}}
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
                    <div class="rt-mb-30">
                        <div class="form-check from-chekbox-custom align-items-center">
                            <input id="term" class="form-check-input" type="checkbox" value="1" required>
                            <label class="form-check-label pointer text-gray-700 f-size-14" for="term">
                                {{ __('i_have_read_and_agree_with') }}
                            </label>
                            <a href="{{ url('terms-condition') }}" target="_blank"
                                class="body-font-4 text-primary-500 text-theme">
                                <strong style="color: #2e3397">{{ __('terms_of_service') }}</strong>
                            </a>
                        </div>

                    </div>
                    <button id="submitButton" type="submit" class="btn btn-primary d-block rt-mb-15">
                        <span class="button-content-wrapper ">
                            <span class="button-icon align-icon-right">
                                <x-svg.rightarrow-icon />
                            </span>
                            <span class="button-text">
                                {{ __('create_account') }}
                            </span>
                        </span>
                    </button>

                    @php
                        $google = config('zakirsoft.google_active') && config('zakirsoft.google_id') && config('zakirsoft.google_secret');
                        $facebook = config('zakirsoft.facebook_active') && config('zakirsoft.facebook_id') && config('zakirsoft.facebook_secret');
                        $twitter = config('zakirsoft.twitter_active') && config('zakirsoft.twitter_id') && config('zakirsoft.twitter_secret');
                        $linkedin = config('zakirsoft.linkedin_active') && config('zakirsoft.linkedin_id') && config('zakirsoft.linkedin_secret');
                        $github = config('zakirsoft.github_active') && config('zakirsoft.github_id') && config('zakirsoft.github_secret');
                    @endphp
                    @if ($google || $facebook || $twitter || $linkedin || $github)
                        <p class="or text-center">{{ __('or') }}</p>
                    @endif
                    <div class="d-flex justify-content-between btn-group flex-column">
                        <div class="row">
                            @if ($google)
                                <div class="col-12 rt-mb-15">
                                    <button onclick="LoginService('google')" type="button"
                                        class=" w-100 btn btn-outline-plain  custom-padding me-3 rt-mb-xs-10 ">
                                        <span class="button-content-wrapper ctr">
                                            <span class="button-icon align-icon-left">
                                                <x-svg.google-icon />
                                            </span>
                                            <span class="button-text">
                                                {{ __('signup_with_google') }}
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            @endif

                            @if ($facebook)
                                <div class="d-flex justify-content-center col-12 rt-mb-15">
                                    <button onclick="LoginService('facebook')" type="button"
                                        class="w-100 btn btn-outline-plain custom-padding ">
                                        <span class="button-content-wrapper ctr">
                                            <span class="button-icon align-icon-left">
                                                <x-svg.facebook-icon />
                                            </span>
                                            <span class="button-text">
                                                {{ __('signup_with_facebook') }}
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            @endif

                            @if ($twitter)
                                <div class="d-flex justify-content-center col-12 rt-mb-15">
                                    <button onclick="LoginService('twitter')" type="button"
                                        class="w-100 btn btn-outline-plain custom-padding ">
                                        <span class="button-content-wrapper ctr">
                                            <span class="button-icon align-icon-left">
                                                <x-svg.twitter-icon fill="#007ad9" />
                                            </span>
                                            <span class="button-text">
                                                {{ __('signup_with_twitter') }}
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            @endif

                            @if ($linkedin)
                                <div class="d-flex justify-content-center col-12 rt-mb-15">
                                    <button onclick="LoginService('linkedin')" type="button"
                                        class="w-100 btn btn-outline-plain custom-padding ">
                                        <span class="button-content-wrapper ctr">
                                            <span class="button-icon align-icon-left">
                                                <x-svg.linkedin-icon />
                                            </span>
                                            <span class="button-text">
                                                {{ __('signup_with_linkedin') }}
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            @endif

                            @if ($github)
                                <div class="w-100 d-flex justify-content-center col-12 rt-mb-15">
                                    <button onclick="LoginService('github')" type="button"
                                        class="btn btn-outline-plain custom-padding ">
                                        <span class="button-content-wrapper ctr">
                                            <span class="button-icon align-icon-left">
                                                <x-svg.github-icon />
                                            </span>
                                            <span class="button-text">
                                                {{ __('signup_with_github') }}
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
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
    <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js'></script>
    <script>
        // $('input[type="radio"]:checked')
        $('input[name="role"]').change(function(e) {
            let role = $(this).val();

            if (role == "company") {
                $("#name").attr("placeholder", "Company Name");
            } else {
                $("#name").attr("placeholder", "Full Name");
            }

        });

        // $(document).ready(function() {

        //     $("form[id='registerForm']").validate({ // initialize the plugin
        //         rules: {
        //             name: {
        //                 required: true,
        //             },
        //             phone: {
        //                 required: true,
        //                 minlength: 11,
        //                 maxlength: 11
        //             },
        //             password: {
        //                 required: true,
        //                 minlength: 8
        //             },
        //             password_confirmation: {
        //                 required: true,
        //                 minlength: 8
        //             },
        //         },
        //         messages: {
        //             name: {
        //                 required: 'Please enter your full name'
        //             },
        //             phone: {
        //                 required: 'Please enter your 11 digit mobile number',
        //                 minlength: 'Please enter your 11 digit mobile number',
        //                 maxlength: 'Please enter your 11 digit mobile number',
        //             },
        //             password: {
        //                 required: 'Please enter a strong password of atleast 8 digit'
        //             },
        //             password_confirmation: {
        //                 required: 'Should be same as password'
        //             },
        //         },
        //         submitHandler: function(form) {
        //             form.submit();
        //         }

        //         // ,
        //         // submitHandler: function(form) { // for demo
        //         //     alert('valid form submitted'); // for demo
        //         //     return false; // for demo
        //         // }
        //     });

        // });
    </script>
@endsection

@section('backend_auth_link')
    <style>
        .custom-control-input:checked~.custom-control-label::before {
            background-color: #007bff;
        }

        .custom-control-label::before {
            border-color: #007bff;
        }

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
            padding: 6px 12px;
            border-style: solid;
            border-width: 1px;
        }


        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked+label {
            color: #fff;
            background-color: #042852;
            box-shadow: 0 3px 16px rgba(24, 25, 28, .04);
            border-radius: 5px;
            transition: .2s cubic-bezier(.77, 0, .175, 1);
        }
    </style>
@endsection
