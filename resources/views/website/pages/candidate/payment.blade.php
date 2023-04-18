@extends('website.layouts.app')

@section('title')
    {{ __('Application Form') }}
@endsection

@section('main')
    <style>
        .form-cotrol-sm {
            min-height: calc(1.5em + (0.5rem + 2px));
            padding: 0.25rem 0.5rem;
            font-size: .875rem;
            border-radius: 0.2rem;
        }

        #picture,
        #signature {
            position: inherit;
            width: 100%;
            height: 100%;
            left: 0 !important;
            top: 0 !important;
            opacity: 1;
            cursor: pointer;
        }

        span.required {
            color: red;
        }

        .input-group-text-custom {
            max-height: 48px;
            padding: 12px;
            background-color: #e9ecef;
            border-radius: 0 5px 5px 0;
        }
    </style>
    <div class="dashboard-wrapper">
        <div class="container">
            <form action="{{ route('website.candidate.application.form.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-10 col-md-8 mx-auto  text-center">
                        <div class="col-sm-12 mt-2">
                            <div class="dashboaed-profile-wrap ">
                                <div class="text-center">
                                    <div class="dashboaed-profile-data">
                                        <h6>Payment Incomplete</h6>
                                        <p>Make payment to verify your identity</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="section benefits bgcolor--gray-10">
        <div class="container">
            <div class="row mx-auto">

                <div class="col-sm-10 col-md-8 mx-auto my-2">
                    <div class="card bg-primary-900 text-white text-bold text-center">
                        <div class="card-body">
                            <p>
                                ওয়েলফেয়ার ফ্যামিলি বাংলাদেশ এবং বেসরকারি উন্নয়ন সংস্থা (NGO) এর যৌথ উদ্যোগে (বাংলাদেশ গেজেটে প্রকাশিত বিজ্ঞপ্তির আলোকে ও চাকরির আবেদনকারীরা এককালীন অফেরতযোগ্য রেজিস্ট্রেশন ফি প্রদান করে) 'সাসটেইনেবল ডেভেলপমেন্ট পলিসি' (SDP) ও সোস্যাল অ্যান্ড ইকোনমিক ডেভেলপমেন্ট পলিসি' (SEDP) এবং পভার্টি এলিভিয়েশন পলিসি (Muldhan) প্রজেক্ট-প্রোগ্রাম বাস্তবায়নের জন্য "সামাজিক ও অর্থনৈতিকক্ষেত্রে টেকসই উন্নয়নের প্রয়াস"
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 mx-auto my-2">
                    <div class="card px-0">
                        <div class="card-body text-center">
                            <button class="btn bg-primary text-white text-bold d-block rounded-pill">Job Application
                                Fees</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 mx-auto my-2">
                    <div class="card">
                        <div class="card-header bg-primary-900 text-white rounded-15">
                            <strong>Fees Details</strong>
                        </div>
                        <div class="card-body text-primary text-bold text-center">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <td class="text-right w-75"><strong>Financial Code: </strong></td>
                                        <td class="text-left"><strong>JobReg</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right w-75"><strong>Total Payment: </strong></td>
                                        <td class="text-left"><strong>Tk 175</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right w-75"><strong>Pay Now: </strong></td>
                                        <td class="text-left"><strong>Tk 175</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 mx-auto my-2">
                    <div class="card">
                        <div class="card-footer text-center mx-auto px-0 pt-0">
                            <img class="img-fluid img-thumbnail" src="{{ asset('images/welfare-banner.png') }}"
                                alt="welfarelogo">
                        </div>
                        <div class="card-body text-center">
                            <p><input type="checkbox" value="1" id="checkbox"> By Continuing, I Confirm that I Read &
                                Agree To the <a href="{{ url('terms-condition') }}" target="_blank"
                                    class="body-font-4 text-primary-500 text-theme">
                                    <strong style="color: #2e3397">{{ __('terms_of_service') }}</strong>
                                </a> and <a href="{{ url('privacy-policy') }}" target="_blank"
                                    class="body-font-4 text-primary-500 text-theme">
                                    <strong style="color: #2e3397">{{ __('privacy_policy') }}</strong>
                                </a>.</p>
                            <button id="surjo_pay_btn" type="button"
                                class="btn bg-primary rounded-pill text-uppercase text-bold text-white text-wrap">
                                {{ __('pay_now') }} to verify your Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SorjoPay Form --}}
        <form action="{{ route('surjopay.post') }}" method="POST" class="d-none" id="surjopay-form">
            @csrf
        </form>

    </section>
@endsection
@section('script')
    <script>
        $('#surjo_pay_btn').on('click', function(e) {
            if ($("#checkbox").is(':checked')) {
                e.preventDefault();
                $('#surjopay-form').submit();
            } else {
                Swal.fire({
                    icon: 'warning',
                    text: 'Please agree terms and conditions'
                })
                e.preventDefault();
            }

        });
        $("#checkbox").on("click")
    </script>
@endsection
