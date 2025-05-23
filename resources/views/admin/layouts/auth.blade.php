<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('sign_in') }} | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $setting->favicon_image_url }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('backend/css/vendor.min.css') }}">
    <style>
        .system-logo {
            max-width: 200px !important;
        }

        .login-card-body {
            width: 380px !important;
            max-width: 380px !important;
        }

        .login-card-body .input-group input.form-control,
        .login-card-body button.btn {
            padding: 12px 20px;
            height: unset !important;
        }

        .quote {
            max-width: 380px;
            margin: 0 auto;
        }

        .background-view {
            background-image: url('https://source.unsplash.com/random/1920x1280/?park,travel,sunset'), url('/backend/image/river.jpeg');
            background-size: cover;
        }

    </style>

    @yield('backend_auth_link')
    @include('website.partials.links')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/phosphor-icons@1.4.2/src/css/icons.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="{{ request()->is('register') ? "col-lg-5 col-md-6 col-sm-12" : "col-lg-4 col-md-5" }}">
                <div class="d-flex flex-column justify-content-between align-items-center py-5 px-4 min-vh-100">
                    {{-- <a href="{{ route('admin.login') }}" class="d-block">
                        <div class="system-logo d-flex justify-content-center">
                            <img src="{{ $setting->dark_logo_url }}" alt="{{ __('logo') }}" class="img-fluid">
                        </div>
                    </a> --}}
                    <div class="{{ request()->is('register') ? "card-body" : "" }}  p-0">
                        @yield('content')
                    </div>
                    <div class="text-center text-secondary quote">
                        {{ inspireMe() }}
                    </div>
                </div>
            </div>
            <div class="{{ request()->is('register') ? "col-lg-7 col-md-6 col-sm-12" : "col-lg-8 col-md-7" }}  col d-lg-block d-none">
                <div class="h-100 min-vh-100 background-view">
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        function passToText(id, icon) {
           var input = $('#' + id);
           var eyeIcon = $('#' + icon);
           if (input.is('input[type="password"]')) {
               eyeIcon.html('<i class="ph-eye-slash "></i>');
               input.attr('type', 'text');
           } else {
               eyeIcon.html('<i class="ph-eye "></i>');
               input.attr('type', 'password');
           }
       }
   </script>
    @yield('backend_auth_script')

</body>

</html>
