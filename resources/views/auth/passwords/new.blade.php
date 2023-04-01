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
                <form method="POST" action="{{ route('update.password') }}" class="rt-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12" style="color: #2e3397">
                            <h4 class="rt-mb-20 mb-0">{{ __('reset_password') }}</h4>
                            <p class="text-muted font-size-13">Set the new password for your account so you can login and access all features</p>
                        </div>
                    </div>
                    <input type="hidden" name="phone" value="{{ $user->phone }}">
                    <div class="rt-mb-15">
                        <label for="password">Enter New Password</label>
                        <div class="d-flex fromGroup">
                            <input name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="{{ __('password') }}">
                            <div onclick="passToText('password','eyeIcon')" id="eyeIcon"
                                class="has-badge">
                                <i class="ph-eye @error('password') m-3 @enderror"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-danger"
                                role="alert">{{ __($message) }}</span>
                        @enderror
                    </div>
                    <div class="rt-mb-15">
                        <label for="password_confirmation">Confirm New Password</label>
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
                            <span class="text-danger"
                                role="alert">{{ __($message) }}</span>
                        @enderror
                    </div>
                    <button id="submitButton" type="submit" class="btn bg-primary rounded-pill  d-block rt-mb-15">
                        <span class="button-content-wrapper ">
                            <span class="button-icon align-icon-right">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="button-text">
                                Confirm Password
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
