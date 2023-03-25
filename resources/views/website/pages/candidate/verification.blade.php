@extends('website.layouts.app')

@section('title')
    {{ __('Application Form') }}
@endsection

@section('main')
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap-datepicker.min.css">
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

        input::placeholder {
            text-transform: none !important;
        }
    </style>
    <div class="dashboard-wrapper">
        <div class="container">
            <form action="{{ route('website.candidate.application.form.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-10 col-md-8 mx-auto">
                        <div class="col-sm-12 mt-2">
                            <div class="dashboaed-profile-wrap">
                                <div class="dashboaed-profile-left">
                                    <div class="dashboaed-profile-data">
                                        <h6>Incomplete Verification</h6>
                                        <p>Verify your identity</p>
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
            {{-- <div class="row mt-5 pt-5">
                <h4 class="text-info">{{ __('total_amount_to_pay') }}: 100</h4>
            </div> --}}
            <div class="row mx-auto">
                {{-- <h5>{{ __('online_payment_gatewats') }}</h5> --}}

                <form action="{{ route('website.candidate.verification.process') }}" method="POST">
                    @csrf

                    <div class="col-10 mx-auto my-2 ">
                        <div class="card jobcardStyle1">
                            <div class="card-body">
                                <div class="post-info d-flex row">
                                    <div class="col-sm-4 col-md-3 py-2">
                                        <select class="rt-selectactive w-100-p @error('id_type') is-invalid @enderror"
                                            name="id_type" id="id_type" required>
                                            <option value="NID"> {{ __('NID') }} </option>
                                            <option value="Birth Certificate"> {{ __('Birth Certificate') }} </option>
                                        </select>
                                        @error('id_type')
                                            <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 col-md-3 py-2">
                                        <input class="form-control @error('id_no') is-invalid @enderror" name="id_no"
                                            type="text" value="" id="id_no" placeholder="ID No" required>
                                        @error('id_no')
                                            <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 col-md-3 py-2 date">
                                        <input class="form-control ps-1 datepicker @error('dob') is-invalid @enderror "
                                            name="dob" type="text" value="" id="date"
                                            placeholder="dd-mm-yyyy" required>
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 col-md-3 py-2">
                                        <button id="surjo_pay_btn" type="submit" class="btn btn-primary2-50 d-block">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection

@section('script')
    <script src="{{ asset('frontend/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $("#date").attr("autocomplete", "off");
        //init datepicker
        $('.datepicker').off('focus').datepicker({
            format: 'dd-mm-yyyy'
        }).on('click',
            function() {
                $(this).datepicker('show');
            }
        );

        $("#id_type").on("change", function() {
            let id_type = $(this).val();

            if (id_type == "NID") {
                $("#id_no").attr('placeholder', 'ID NO');
            }

            if (id_type == "Birth Certificate") {
                $("#id_no").attr('placeholder', 'Birth Certificate No');
            }
        })
    </script>
@endsection
