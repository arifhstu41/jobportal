<div class="rt-site-footer bg-gray-900 dark-footer">
    <div class="footer-top  bg-gray-900">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6 rt-single-widget ">
                    <a href="#" class="footer-logo">
                        <img src="{{ $setting->light_logo_url }}" alt="">
                    </a>
                    <address>
                        <div class="body-font-2 text-gray-500">
                            @if ($cms_setting->footer_phone_no)
                                <div class="body-font-2 text-gray-500">
                                    <span>{{ __('call_now') }}:</span>
                                    <a href="tel:{{ $cms_setting->footer_phone_no }}" class="text-gray-10">
                                        {{ $cms_setting->footer_phone_no }}</a>
                                </div>
                            @endif
                            <div class="max-312 body-font-4 mt-2 text-gray-500">
                                {{ $cms_setting->footer_address }}
                            </div>
                        </div>
                    </address>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 rt-single-widget ">
                    <h2 class="footer-title">{{ __('quick_link') }}</h2>
                    <ul class="rt-usefulllinks2">
                        <li><a href="{{ route('website.about') }}">{{ __('about') }}</a></li>
                        <li><a href="{{ route('website.contact') }}">{{ __('contact') }}</a></li>
                        @guest
                            <li><a href="{{ route('website.plan') }}">{{ __('pricing') }}</a></li>
                        @endguest
                        @if (auth('user')->check() && auth('user')->user()->role != 'candidate')
                            <li><a href="{{ route('website.plan') }}">{{ __('pricing') }}</a></li>
                        @endif
                        <li><a href="{{ route('website.posts') }}">{{ __('blog') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 rt-single-widget ">
                    <h2 class="footer-title">{{ __('candidate') }}</h2>
                    <ul class="rt-usefulllinks2">
                        <li><a href="{{ route('website.job') }}">{{ __('browse_jobs') }}</a></li>
                        @if (!auth('user')->check() || auth('user')->user()->role != 'candidate')
                            <li><a href="{{ route('website.candidate') }}">{{ __('browse_candidates') }}</a></li>
                        @endif
                        <li><a href="{{ route('candidate.dashboard') }}">{{ __('candidate_dashboard') }}</a></li>
                        <li><a href="{{ route('candidate.bookmark') }}">{{ __('saved_jobs') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 rt-single-widget ">
                    <h2 class="footer-title">{{ __('employers') }}</h2>
                    <ul class="rt-usefulllinks2">
                        <li><a href="{{ route('company.job.create') }}">{{ __('post_a_job') }}</a></li>
                        @if (!auth('user')->check() || auth('user')->user()->role != 'company')
                            <li><a href="{{ route('website.company') }}">{{ __('browse_employers') }}</a></li>
                        @endif
                        <li><a href="{{ route('company.dashboard') }}">{{ __('employers_dashboard') }}</a></li>
                        <li><a href="{{ route('company.myjob') }}">{{ __('applications') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 rt-single-widget ">
                    <h2 class="footer-title">{{ __('support') }}</h2>
                    <ul class="rt-usefulllinks2">
                        <li><a href="{{ route('website.faq') }}">{{ __('faqs') }}</a></li>
                        <li><a href="{{ route('website.privacyPolicy') }}">{{ __('privacy_policy') }}</a></li>
                        <li><a href="{{ route('website.termsCondition') }}">{{ __('terms_condition') }}</a></li>
                    </ul>
                </div>
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12 mt-lg-3">
                    <div class="d-none d-md-block">
                        <img class="img-fluid w-100" src="https://www.welfarefamily.org/images/payment/sP_Available_Payment_Instruments-new-small_2022.png" alt="payment">
                    </div>
                    <div class="d-block d-md-none">
                        <img class="img-fluid w-100" src="https://www.welfarefamily.org/images/payment/sP_Available_Payment_Instruments-new_2022.png" alt="payment">
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.footer-top -->
    <div class="footer-bottom bg-gray-900">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start f-size-14 text-gray-500">
                    <x-website.footer-copyright />
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 text-center text-lg-end">
                    <ul class="footer-social-links">
                        @if ($cms_setting->footer_facebook_link)
                            <li>
                                <a href="{{ $cms_setting->footer_facebook_link }}">
                                    <svg width="10" height="20" viewBox="0 0 10 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.17403 3.32083H9.99986V0.140833C9.68486 0.0975 8.60153 0 7.33986 0C4.70736 0 2.90402 1.65583 2.90402 4.69917V7.5H-0.000976562V11.055H2.90402V20H6.46569V11.0558H9.25319L9.69569 7.50083H6.46486V5.05167C6.46569 4.02417 6.74236 3.32083 8.17403 3.32083Z"
                                            fill="#767E94" />
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if ($cms_setting->footer_instagram_link)
                            <li>
                                <a href="{{ $cms_setting->footer_instagram_link }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip3)">
                                            <path
                                                d="M19.5879 5.19872C19.3574 4.34194 18.6819 3.66659 17.8252 3.43588C16.2602 3.00757 9.99981 3.00757 9.99981 3.00757C9.99981 3.00757 3.73961 3.00757 2.17452 3.41955C1.33438 3.65011 0.642392 4.3421 0.411833 5.19872C0 6.76366 0 10.0092 0 10.0092C0 10.0092 0 13.271 0.411833 14.8197C0.642545 15.6763 1.3179 16.3518 2.17467 16.5825C3.75609 17.0108 9.99996 17.0108 9.99996 17.0108C9.99996 17.0108 16.2602 17.0108 17.8252 16.5988C18.682 16.3683 19.3574 15.6928 19.5881 14.8361C19.9999 13.271 19.9999 10.0257 19.9999 10.0257C19.9999 10.0257 20.0164 6.76366 19.5879 5.19872Z"
                                                fill="#767E94" />
                                            <path class="facebook"
                                                d="M8.00635 13.0077L13.2122 10.0093L8.00635 7.01099V13.0077Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip02">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if ($cms_setting->footer_youtube_link)
                            <li>
                                <a href="{{ $cms_setting->footer_youtube_link }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip01)">
                                            <path
                                                d="M19.9804 5.88005C19.9336 4.81738 19.7617 4.0868 19.5156 3.45374C19.2616 2.78176 18.8709 2.18014 18.359 1.68002C17.8589 1.1721 17.2533 0.777435 16.5891 0.527447C15.9524 0.281274 15.2256 0.109427 14.163 0.0625732C13.0923 0.0117516 12.7525 0 10.0371 0C7.32172 0 6.98185 0.0117516 5.9152 0.0586052C4.85253 0.105459 4.12195 0.277459 3.48904 0.523479C2.81692 0.777435 2.2153 1.16814 1.71517 1.68002C1.20726 2.18014 0.812742 2.78573 0.562602 3.44992C0.31643 4.0868 0.144583 4.81341 0.0977294 5.87609C0.0469078 6.9467 0.0351562 7.28658 0.0351562 10.002C0.0351562 12.7173 0.0469078 13.0572 0.0937614 14.1239C0.140615 15.1865 0.312615 15.9171 0.558787 16.5502C0.812742 17.2221 1.20726 17.8238 1.71517 18.3239C2.2153 18.8318 2.82088 19.2265 3.48507 19.4765C4.12195 19.7226 4.84856 19.8945 5.91139 19.9413C6.97788 19.9883 7.31791 19.9999 10.0333 19.9999C12.7486 19.9999 13.0885 19.9883 14.1552 19.9413C15.2178 19.8945 15.9484 19.7226 16.5813 19.4765C17.9254 18.9568 18.9881 17.8941 19.5078 16.5502C19.7538 15.9133 19.9258 15.1865 19.9726 14.1239C20.0195 13.0572 20.0312 12.7173 20.0312 10.002C20.0312 7.28658 20.0273 6.9467 19.9804 5.88005ZM18.1794 14.0457C18.1364 15.0225 17.9723 15.5499 17.8355 15.9015C17.4995 16.7728 16.808 17.4643 15.9367 17.8004C15.585 17.9372 15.0538 18.1012 14.0808 18.1441C13.026 18.1911 12.7096 18.2027 10.0411 18.2027C7.37255 18.2027 7.0522 18.1911 6.00113 18.1441C5.02437 18.1012 4.49693 17.9372 4.1453 17.8004C3.71171 17.6402 3.31704 17.3862 2.9967 17.0541C2.6646 16.7298 2.41065 16.3391 2.2504 15.9055C2.11365 15.5539 1.94959 15.0225 1.9067 14.0497C1.8597 12.9948 1.8481 12.6783 1.8481 10.0097C1.8481 7.34122 1.8597 7.02087 1.9067 5.96995C1.94959 4.99319 2.11365 4.46575 2.2504 4.11412C2.41065 3.68038 2.6646 3.28586 3.00067 2.96536C3.32483 2.63327 3.71553 2.37931 4.14927 2.21921C4.5009 2.08247 5.03231 1.9184 6.00509 1.87537C7.05999 1.82851 7.37651 1.81676 10.0449 1.81676C12.7174 1.81676 13.0337 1.82851 14.0848 1.87537C15.0616 1.9184 15.589 2.08247 15.9406 2.21921C16.3742 2.37931 16.7689 2.63327 17.0892 2.96536C17.4213 3.28967 17.6753 3.68038 17.8355 4.11412C17.9723 4.46575 18.1364 4.99701 18.1794 5.96995C18.2262 7.02484 18.238 7.34122 18.238 10.0097C18.238 12.6783 18.2262 12.9908 18.1794 14.0457Z"
                                                fill="#767E94" />
                                            <path
                                                d="M10.0371 4.86401C7.20074 4.86401 4.89941 7.16518 4.89941 10.0017C4.89941 12.8383 7.20074 15.1395 10.0371 15.1395C12.8737 15.1395 15.1749 12.8383 15.1749 10.0017C15.1749 7.16518 12.8737 4.86401 10.0371 4.86401ZM10.0371 13.3344C8.19702 13.3344 6.70442 11.842 6.70442 10.0017C6.70442 8.16147 8.19702 6.66902 10.0371 6.66902C11.8774 6.66902 13.3698 8.16147 13.3698 10.0017C13.3698 11.842 11.8774 13.3344 10.0371 13.3344Z"
                                                fill="#767E94" />
                                            <path
                                                d="M16.5777 4.6611C16.5777 5.32346 16.0407 5.86052 15.3781 5.86052C14.7158 5.86052 14.1787 5.32346 14.1787 4.6611C14.1787 3.99858 14.7158 3.46167 15.3781 3.46167C16.0407 3.46167 16.5777 3.99858 16.5777 4.6611Z"
                                                fill="#767E94" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip033">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if ($cms_setting->footer_twitter_link)
                            <li>
                                <a href="{{ $cms_setting->footer_twitter_link }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip02)">
                                            <path
                                                d="M20 3.79875C19.2563 4.125 18.4637 4.34125 17.6375 4.44625C18.4875 3.93875 19.1363 3.14125 19.4412 2.18C18.6488 2.6525 17.7738 2.98625 16.8412 3.1725C16.0887 2.37125 15.0162 1.875 13.8462 1.875C11.5763 1.875 9.74875 3.7175 9.74875 5.97625C9.74875 6.30125 9.77625 6.61375 9.84375 6.91125C6.435 6.745 3.41875 5.11125 1.3925 2.6225C1.03875 3.23625 0.83125 3.93875 0.83125 4.695C0.83125 6.115 1.5625 7.37375 2.6525 8.1025C1.99375 8.09 1.3475 7.89875 0.8 7.5975C0.8 7.61 0.8 7.62625 0.8 7.6425C0.8 9.635 2.22125 11.29 4.085 11.6712C3.75125 11.7625 3.3875 11.8062 3.01 11.8062C2.7475 11.8062 2.4825 11.7913 2.23375 11.7362C2.765 13.36 4.2725 14.5538 6.065 14.5925C4.67 15.6838 2.89875 16.3412 0.98125 16.3412C0.645 16.3412 0.3225 16.3263 0 16.285C1.81625 17.4563 3.96875 18.125 6.29 18.125C13.835 18.125 17.96 11.875 17.96 6.4575C17.96 6.27625 17.9538 6.10125 17.945 5.9275C18.7588 5.35 19.4425 4.62875 20 3.79875Z"
                                                fill="#767E94" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0535">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
</div><!-- /.rt-site-footer -->
