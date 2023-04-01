@extends('admin.layouts.auth')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card col-sm-12 col-md-10 mx-auto p-0">
        <div class="card-header text-center">
            <img class="img-fluid img-thumbnail rounded-circle border border-5 border-primary-600"
                style="border-color: #1c458e" width="100" height="100" src="{{ asset('images/welfare-logo.png') }}"
                alt="welfarelogo">
        </div>
        <div class="card-body">
            <div class="auth-box2">
                <form method="POST" action="{{ route('reset_password_without_token') }}" class="rt-form">
                    @csrf
                    <div class="text-center" style="color: #2e3397">
                        <h4 class="rt-mb-20">Forgot Password</h4>
                        <span class="d-block body-font-3 text-gray-600 rt-mb-32 mb-2">
                            {{ __('go_back_to') }}
                            <span><a href="{{ route('login') }}"><strong style="color: #2e3397">{{ __('log_in') }}</strong></a></span>
                        </span>
                        <span class="d-block body-font-3 text-gray-600 rt-mb-32">
                            {{ __('dont_have_account') }}
                            <span><a href="{{ route('register') }}"> <strong style="color: #2e3397">{{ __('create_account') }}</strong>
                                    </a></span>
                        </span>
                    </div>

                    {{-- <div class="fromGroup rt-mb-15">
                        <input id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" type="email" placeholder="{{ __('email_address') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="fromGroup rt-mb-15">
                        <label for="phone" class="text-black">Enter your {{ __('phone') }}</label>
                        <input id="phone" class="form-control rounded-3 @error('phone') is-invalid @enderror" name="phone"
                            value="{{ old('phone') }}" type="number" pattern="\d*" placeholder="01751767350">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button id="submitButton" type="submit" class="btn bg-primary rounded-pill d-block rt-mb-15">
                        <span class="button-content-wrapper ">
                            <span class="button-icon align-icon-right">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="button-text">
                                Continue
                            </span>
                        </span>
                    </button>
                </form>
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
