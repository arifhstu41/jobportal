<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <meta property="og:image" content="@yield('og:image')">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @routes
    {{-- Style --}}
    @include('website.partials.links')
    @yield('css')
    <style>
        .text-theme {
            color: #2e3397"

        }
    </style>

    @php
        $css_data = !empty($setting->header_css);
        $tag_start = strstr(strtolower($setting->header_css), '<style>');
        $tag_end = strstr(strtolower($setting->header_css), '</style>');
        
        $js_data = !empty($setting->header_script);
        $script_tag_start = strstr(strtolower($setting->header_script), '<script>
            ');
            $script_tag_end = strstr(strtolower($setting->header_script), '
        </script>');
    @endphp

    @if ($css_data && $tag_start && $tag_end)
        {!! $setting->header_css !!}
    @endif

    @if ($js_data && $script_tag_start && $script_tag_end)
        {!! $setting->header_script !!}
    @endif
</head>

<body dir="{{ langDirection() }}">
    <input type="hidden" value="{{ current_country_code() }}" id="current_country_code">
    <x-admin.app-mode-alert />
    {{-- Header --}}
    @if (!auth('admin')->check())
        @include('website.partials.header')
    @endif

    {{-- Main --}}
    @yield('main')

    {{-- footer --}}
    @if (!Route::is('candidate.*') && !Route::is('company.*'))
        
        @if(!auth('admin')->check())
            @include('website.partials.footer')
        @endif
    @endif

    <!-- scripts -->
    @include('website.partials.scripts')
    @yield('script')
    @php
        $js_data = !empty($setting->body_script);
        $script_tag_start = strstr(strtolower($setting->body_script), '<script>
            ');
            $script_tag_end = strstr(strtolower($setting->body_script), '
        </script>');
    @endphp

    @if ($js_data && $script_tag_start && $script_tag_end)
        {!! $setting->body_script !!}
    @endif
    <x-frontend.cookies-allowance :cookies="$cookies" />
</body>

</html>
