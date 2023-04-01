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
        <div class="card-body pb-0 mb-0">
            <div class="auth-box2">
                <form method="POST" action="{{ route('submit.otp') }}" class="rt-form">
                    @csrf
                    <div class="" style="color: #2e3397">
                        <h5 class="">OTP/Verification Code</h5>
                    </div>

                    <div class="fromGroup rt-mb-15">
                        <p for="otp" class="text-muted font-size-13 pb-0 mb-0">Enter your 6 digit OTP/Verification code
                            that you recieved on your mobile number</p>
                        <input id="otp" class="form-control rounded-3 @error('otp') is-invalid @enderror"
                            name="otp" value="{{ old('otp') }}" type="number" pattern="\d*" placeholder="123456">
                        @error('otp')
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
                                Verify
                            </span>
                        </span>
                    </button>
                </form>
            </div>
            <div class="text-center">
                <p class="text-muted" style="font-size: 13px">If you don't recieve a code! <span class="countdown"
                        style="color: #2e3397"></span></p>
            </div>
            <div class="text-center row">
                <div class="text-primary text-center d-flex justify-content-center">
                    <a href="{{ route('send.otp.again') }}"
                        class="btn btn-secondary rounded-pill d-block d-none" id="sendAgain">OTP Resend</a>
                </div>
            </div>

            <div class="text-center">
                <span class="d-block body-font-3 text-gray-600 rt-mb-32 mb-2">
                    {{ __('go_back_to') }}
                    <span><a href="{{ route('login') }}"><strong
                                style="color: #2e3397">{{ __('log_in') }}</strong></a></span>
                </span>
                <span class="d-block body-font-3 text-gray-600 mb-3">
                    {{ __('dont_have_account') }}
                    <span><a href="{{ route('register') }}"> <strong
                                style="color: #2e3397">{{ __('create_account') }}</strong>
                        </a></span>
                </span>
            </div>
        </div>
        <div class="card-footer text-center mx-auto px-0 pt-0">
            <img class="img-fluid img-thumbnail" src="{{ asset('images/welfare-banner.png') }}" alt="welfarelogo">
        </div>
    </div>
@endsection

@section('backend_auth_script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        $(document).ready(function() {
            var timer2 = "5:01";
            var interval = setInterval(function() {


                var timer = timer2.split(':');
                //by parsing integer, I avoid all extra string processing
                var minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;
                if (minutes < 0) clearInterval(interval);
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                //minutes = (minutes < 10) ?  minutes : minutes;
                $('.countdown').html(minutes + ':' + seconds);
                timer2 = minutes + ':' + seconds;
            }, 1000);


            var countdownTime = 302000;
            // var countdownTime = 5000;
            // Start the countdown timer
            setTimeout(function() {
                $("#sendAgain").removeClass("d-none");
            }, countdownTime);

        });
    </script>
@endsection
