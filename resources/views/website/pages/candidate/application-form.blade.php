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

        #picture, #signature {
            position: inherit;
            width: 100%;
            height: 100%;
            left: 0 !important;
            top: 0 !important;
            opacity: 1;
            cursor: pointer;
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
                                        <h6>{{ __('profile_in_title') }}</h6>
                                        <p>{{ __('profile_in_description') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="p-1 rounded-2">

                            <div class="form-group form-group-sm row py-2">
                                <label for="name" class="col-sm-3 col-form-label">{{ __('name') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        type="text" value="{{ $user->name }}" id="name"
                                        placeholder="{{ __('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="name_bn" class="col-sm-3 col-form-label">{{ __('name_bn') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('name_bn') is-invalid @enderror" name="name_bn"
                                        type="text" value="{{ $candidate->name_bn }}" id="name_bn"
                                        placeholder="{{ __('name_bn') }}">
                                    @error('name_bn')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="father_name" class="col-sm-3 col-form-label">{{ __('father_name') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('father_name') is-invalid @enderror"
                                        name="father_name" type="text" value="{{ $candidate->father_name }}"
                                        id="father_name" placeholder="{{ __('father_name') }}">
                                    @error('father_name')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="father_name_bn"
                                    class="col-sm-3 col-form-label">{{ __('father_name_bn') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('father_name_bn') is-invalid @enderror"
                                        name="father_name_bn" type="text" value="{{ $candidate->father_name_bn }}"
                                        id="father_name_bn" placeholder="{{ __('father_name_bn') }}">
                                    @error('father_name_bn')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="mother_name" class="col-sm-3 col-form-label">{{ __('mother_name') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('mother_name') is-invalid @enderror"
                                        name="mother_name" type="text" value="{{ $candidate->mother_name }}"
                                        id="mother_name" placeholder="{{ __('mother_name') }}">
                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="mother_name_bn"
                                    class="col-sm-3 col-form-label">{{ __('mother_name_bn') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('mother_name_bn') is-invalid @enderror"
                                        name="mother_name_bn" type="text" value="{{ $candidate->mother_name_bn }}"
                                        id="mother_name_bn" placeholder="{{ __('mother_name_bn') }}">
                                    @error('mother_name_bn')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="birth_date" class="col-sm-3 col-form-label">{{ __('birth_date') }}</label>
                                <div class="col-sm-9">
                                    <input
                                        class="form-control @error('birth_date') is-invalid @enderror datepicker date ps-2"
                                        name="birth_date" type="text" value="{{ $candidate->birth_date }}"
                                        id="birth_date" placeholder="{{ __('birth_date') }}">
                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group form-group-sm row py-2">
                                <label for="birth_date" class="col-sm-3 col-form-label">{{ __('birth_date') }}</label>
                                <div class="col-sm-9">
                                    <div class="fromGroup">
                                        <div
                                            class="d-flex align-items-center form-control-icon date datepicker">
                                            <input type="text" name="birth_date"
                                                value="{{ $candidate->birth_date ? date('d-m-Y', strtotime($candidate->birth_date)) : old('birth_date') }}"
                                                id="date" placeholder="dd/mm/yyyy"
                                                class="form-control border-cutom @error('birth_date') is-invalid @enderror" />
                                            <span class="input-group-addon input-group-text-custom">
                                                <x-svg.calendar-icon />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group form-group-sm row py-2">
                                <label for="gender" class="col-sm-3 col-form-label">{{ __('gender') }}</label>
                                <div class="col-sm-9">
                                    <select class="rt-selectactive w-100-p @error('gender') is-invalid @enderror"
                                        name="gender">
                                        <option @if ($candidate->gender == 'male') selected @endif value="male">
                                            {{ __('male') }}
                                        </option>
                                        <option @if ($candidate->gender == 'female') selected @endif value="female">
                                            {{ __('female') }}
                                        </option>
                                        <option @if ($candidate->gender == 'other') selected @endif value="other">
                                            {{ __('other') }}
                                        </option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="religion" class="col-sm-3 col-form-label">{{ __('religion') }}</label>
                                <div class="col-sm-9">
                                    <select class="rt-selectactive w-100-p @error('religion') is-invalid @enderror"
                                        name="religion">
                                        <option @if ($candidate->religion == 'muslim') selected @endif value="muslim">
                                            {{ __('muslim') }}
                                        </option>
                                        <option @if ($candidate->religion == 'hindu') selected @endif value="hindu">
                                            {{ __('hindu') }}
                                        </option>
                                        <option @if ($candidate->religion == 'christian') selected @endif value="christian">
                                            {{ __('christian') }}
                                        </option>
                                        <option @if ($candidate->religion == 'others') selected @endif value="others">
                                            {{ __('others') }}
                                        </option>
                                    </select>
                                    @error('religion')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="birth_certificate_no"
                                    class="col-sm-3 col-form-label">{{ __('birth_certificate_no') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('birth_certificate_no') is-invalid @enderror"
                                        name="birth_certificate_no" type="text"
                                        value="{{ $candidate->birth_certificate_no }}" id="birth_certificate_no"
                                        placeholder="{{ __('birth_certificate_no') }}">
                                    @error('birth_certificate_no')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="nid_no" class="col-sm-3 col-form-label">{{ __('nid_no') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('nid_no') is-invalid @enderror" name="nid_no"
                                        type="text" value="{{ $candidate->nid_no }}" id="nid_no"
                                        placeholder="{{ __('nid_no') }}">
                                    @error('nid_no')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group form-group-sm row py-2">
                                <label for="passport_no" class="col-sm-3 col-form-label">{{ __('passport_no') }}</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('passport_no') is-invalid @enderror"
                                        name="passport_no" type="text" value="{{ $candidate->passport_no }}"
                                        id="passport_no" placeholder="{{ __('passport_no') }}">
                                    @error('passport_no')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="marital_status"
                                    class="col-sm-3 col-form-label">{{ __('marital_status') }}</label>
                                <div class="col-sm-9">
                                    <select name="marital_status" class="rt-selectactive w-100-p">
                                        <option @if ($candidate->marital_status == 'single') selected @endif value="single">
                                            {{ __('single') }}</option>
                                        <option @if ($candidate->marital_status == 'married') selected @endif value="married">
                                            {{ __('married') }}</option>
                                    </select>
                                    @error('marital_status')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="quota" class="col-sm-3 col-form-label">{{ __('quota') }}</label>
                                <div class="col-sm-9">
                                    <select name="quota" class="rt-selectactive w-100-p">
                                        <option @if ($candidate->quota == 1) selected @endif value="1">
                                            {{ __('Departmental') }}</option>
                                        <option @if ($candidate->quota == '2') selected @endif value="2">
                                            {{ __('FFQ') }}</option>
                                    </select>
                                    @error('quota')
                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-group-sm row py-2">
                                <label for="quota" class="col-sm-3 col-form-label">{{ __('nationality') }}</label>
                                <div class="col-sm-9">
                                    <p>{{ __('bangladeshi') }}</p>
                                </div>
                            </div>

                            <hr>
                            {{-- Address information --}}
                            <div class="row">
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header">
                                        {{ __('present_address') }}
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="care_of"
                                                class="col-sm-4 col-form-label">{{ __('care_of') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('care_of') is-invalid @enderror"
                                                    name="care_of" type="text" value="{{ $candidate->care_of }}"
                                                    id="care_of" placeholder="{{ __('care_of') }}">
                                                @error('care_of')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="region"
                                                class="col-sm-4 col-form-label">{{ __('region') }}</label>
                                            <div class="col-sm-8">
                                                <select name="region" id="region" class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->region == 'Dhaka') selected @endif
                                                        value="Dhaka">
                                                        {{ __('Dhaka') }}</option>
                                                    <option @if ($candidate->region == 'rangpur') selected @endif
                                                        value="rangpur">
                                                        {{ __('rangpur') }}</option>
                                                </select>
                                                @error('region')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="district"
                                                class="col-sm-4 col-form-label">{{ __('district') }}</label>
                                            <div class="col-sm-8">
                                                <select name="district" id="district" class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->district == 'Dhaka') selected @endif
                                                        value="Dhaka">
                                                        {{ __('Dhaka') }}</option>
                                                    <option @if ($candidate->district == 'Narayanganj') selected @endif
                                                        value="Narayanganj">
                                                        {{ __('Narayanganj') }}</option>
                                                    <option @if ($candidate->district == 'Rangpur') selected @endif
                                                        value="Rangpur">
                                                        {{ __('Rangpur') }}</option>
                                                    <option @if ($candidate->district == 'nilphamari') selected @endif
                                                        value="nilphamari">
                                                        {{ __('nilphamari') }}</option>
                                                </select>
                                                @error('district')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="thana"
                                                class="col-sm-4 col-form-label">{{ __('thana') }}</label>
                                            <div class="col-sm-8">
                                                <select name="thana" id="thana" class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->thana == 'Mirpur') selected @endif
                                                        value="Mirpur">
                                                        {{ __('Mirpur') }}</option>
                                                    <option @if ($candidate->thana == 'Dhanmondi') selected @endif
                                                        value="Dhanmondi">
                                                        {{ __('Dhanmondi') }}</option>
                                                    <option @if ($candidate->thana == 'Nilphamari') selected @endif
                                                        value="Nilphamari">
                                                        {{ __('Nilphamari') }}</option>
                                                    <option @if ($candidate->thana == 'Saidpur') selected @endif
                                                        value="Saidpur">
                                                        {{ __('Saidpur') }}</option>
                                                </select>
                                                @error('thana')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="post_office"
                                                class="col-sm-4 col-form-label">{{ __('post_office') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('post_office') is-invalid @enderror"
                                                    name="post_office" type="text"
                                                    value="{{ $candidate->post_office }}" id="post_office"
                                                    placeholder="{{ __('post_office') }}">
                                                @error('post_office')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group form-group-sm row py-2">
                                            <label for="postcode"
                                                class="col-sm-4 col-form-label">{{ __('postcode') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('postcode') is-invalid @enderror"
                                                    name="postcode" type="text" value="{{ $candidate->postcode }}"
                                                    id="postcode" placeholder="{{ __('postcode') }}">
                                                @error('postcode')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="place"
                                                class="col-sm-4 col-form-label">{{ __('place') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('place') is-invalid @enderror"
                                                    name="place" type="text" value="{{ $candidate->place }}"
                                                    id="place" placeholder="{{ __('place') }}">
                                                @error('place')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('parmanent_address') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">Same
                                            as present addresss</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="care_of_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('care_of') }}</label>

                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('care_of_parmanent') is-invalid @enderror"
                                                    name="care_of_parmanent" type="text"
                                                    value="{{ $candidate->care_of_parmanent }}" id="care_of_parmanent"
                                                    placeholder="{{ __('care_of') }}">
                                                @error('care_of_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="region_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('region') }}</label>
                                            <div class="col-sm-8">
                                                <select name="region_parmanent" id="region_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->region_parmanent == 'Dhaka') selected @endif
                                                        value="Dhaka">
                                                        {{ __('Dhaka') }}</option>
                                                    <option @if ($candidate->region_parmanent == 'rangpur') selected @endif
                                                        value="rangpur">
                                                        {{ __('rangpur') }}</option>
                                                </select>
                                                @error('region_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="district_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('district') }}</label>
                                            <div class="col-sm-8">
                                                <select name="district_parmanent" id="district_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->district_parmanent == 'Dhaka') selected @endif
                                                        value="Dhaka">
                                                        {{ __('Dhaka') }}</option>
                                                    <option @if ($candidate->district_parmanent == 'Narayanganj') selected @endif
                                                        value="Narayanganj">
                                                        {{ __('Narayanganj') }}</option>
                                                    <option @if ($candidate->district_parmanent == 'Rangpur') selected @endif
                                                        value="Rangpur">
                                                        {{ __('Rangpur') }}</option>
                                                    <option @if ($candidate->district_parmanent == 'nilphamari') selected @endif
                                                        value="nilphamari">
                                                        {{ __('nilphamari') }}</option>
                                                </select>
                                                @error('district_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="thana_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('thana') }}</label>
                                            <div class="col-sm-8">
                                                <select name="thana_parmanent" id="thana_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->thana_parmanent == 'Mirpur') selected @endif
                                                        value="Mirpur">
                                                        {{ __('Mirpur') }}</option>
                                                    <option @if ($candidate->thana_parmanent == 'Dhanmondi') selected @endif
                                                        value="Dhanmondi">
                                                        {{ __('Dhanmondi') }}</option>
                                                    <option @if ($candidate->thana_parmanent == 'Nilphamari') selected @endif
                                                        value="Nilphamari">
                                                        {{ __('Nilphamari') }}</option>
                                                    <option @if ($candidate->thana_parmanent == 'Saidpur') selected @endif
                                                        value="Saidpur">
                                                        {{ __('Saidpur') }}</option>
                                                </select>
                                                @error('thana_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="post_office_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('post_office') }}</label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('post_office_parmanent') is-invalid @enderror"
                                                    name="post_office_parmanent" type="text"
                                                    value="{{ $candidate->post_office_parmanent }}"
                                                    id="post_office_parmanent" placeholder="{{ __('post_office') }}">
                                                @error('post_office_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group form-group-sm row py-2">
                                            <label for="postcode_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('postcode') }}</label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('postcode_parmanent') is-invalid @enderror"
                                                    name="postcode_parmanent" type="text"
                                                    value="{{ $candidate->postcode_parmanent }}" id="postcode_parmanent"
                                                    placeholder="{{ __('postcode') }}">
                                                @error('postcode_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="place_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('place') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('place_parmanent') is-invalid @enderror"
                                                    name="place_parmanent" type="text"
                                                    value="{{ $candidate->place_parmanent }}" id="place_parmanent"
                                                    placeholder="{{ __('place') }}">
                                                @error('place_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <hr>
                            {{-- Education Information --}}

                            {{-- PSC JSC --}}
                            <div class="row">
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('psc') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="psc_roll_no"
                                                class="col-sm-4 col-form-label">{{ __('psc_roll_no') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('psc_roll_no') is-invalid @enderror"
                                                    name="psc_roll_no" type="text"
                                                    value="{{ $candidate->psc_roll_no }}" id="psc_roll_no"
                                                    placeholder="{{ __('psc_roll_no') }}">
                                                @error('psc_roll_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="psc_passing_year"
                                                class="col-sm-4 col-form-label">{{ __('psc_passing_year') }}</label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('psc_passing_year') is-invalid @enderror"
                                                    name="psc_passing_year" type="text"
                                                    value="{{ $candidate->psc_passing_year }}" id="psc_passing_year"
                                                    placeholder="{{ __('psc_passing_year') }}">
                                                @error('psc_passing_year')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="psc_scholl"
                                                class="col-sm-4 col-form-label">{{ __('psc_scholl') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('psc_scholl') is-invalid @enderror"
                                                    name="psc_scholl" type="text"
                                                    value="{{ $candidate->psc_scholl }}" id="psc_scholl"
                                                    placeholder="{{ __('psc_scholl') }}">
                                                @error('psc_scholl')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('jsc') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="jsc_roll_no"
                                                class="col-sm-4 col-form-label">{{ __('jsc_roll_no') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('jsc_roll_no') is-invalid @enderror"
                                                    name="jsc_roll_no" type="text"
                                                    value="{{ $candidate->jsc_roll_no }}" id="jsc_roll_no"
                                                    placeholder="{{ __('jsc_roll_no') }}">
                                                @error('jsc_roll_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="jsc_passing_year"
                                                class="col-sm-4 col-form-label">{{ __('jsc_passing_year') }}</label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('jsc_passing_year') is-invalid @enderror"
                                                    name="jsc_passing_year" type="text"
                                                    value="{{ $candidate->jsc_passing_year }}" id="jsc_passing_year"
                                                    placeholder="{{ __('jsc_passing_year') }}">
                                                @error('jsc_passing_year')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="jsc_scholl"
                                                class="col-sm-4 col-form-label">{{ __('jsc_scholl') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('jsc_scholl') is-invalid @enderror"
                                                    name="jsc_scholl" type="text"
                                                    value="{{ $candidate->jsc_scholl }}" id="jsc_scholl"
                                                    placeholder="{{ __('jsc_scholl') }}">
                                                @error('jsc_scholl')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            {{-- SSC HSC --}}
                            <div class="row pt-2">

                                {{-- SSC --}}
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('ssc') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_exam_name"
                                                class="col-sm-4 col-form-label">{{ __('ssc_exam_name') }}</label>
                                            <div class="col-sm-8">
                                                <select
                                                    class="rt-selectactive w-100-p @error('ssc_exam_name') is-invalid @enderror"
                                                    name="ssc_exam_name" id="ssc_exam_name">
                                                    <option @if ($candidate->ssc_exam_name == 'ssc') selected @endif
                                                        value="ssc">
                                                        {{ __('ssc') }}
                                                    </option>
                                                    <option @if ($candidate->ssc_exam_name == 'dakhil') selected @endif
                                                        value="dakhil">
                                                        {{ __('dakhil') }}
                                                    </option>
                                                </select>
                                                @error('ssc_exam_name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_education_board"
                                                class="col-sm-4 col-form-label">{{ __('ssc_education_board') }}</label>
                                            <div class="col-sm-8">
                                                <select name="ssc_education_board" id="ssc_education_board"
                                                    class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->ssc_education_board == 'Dhaka') selected @endif
                                                        value="Dhaka">
                                                        {{ __('Dhaka') }}</option>
                                                    <option @if ($candidate->ssc_education_board == 'dinajpur') selected @endif
                                                        value="dinajpur">
                                                        {{ __('dinajpur') }}</option>
                                                </select>
                                                @error('ssc_education_board')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_roll_no"
                                                class="col-sm-4 col-form-label">{{ __('ssc_roll_no') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('ssc_roll_no') is-invalid @enderror"
                                                    name="ssc_roll_no" type="text"
                                                    value="{{ $candidate->ssc_roll_no }}" id="ssc_roll_no"
                                                    placeholder="{{ __('ssc_roll_no') }}">
                                                @error('ssc_roll_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_registration_no"
                                                class="col-sm-4 col-form-label">{{ __('ssc_registration_no') }}</label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('ssc_registration_no') is-invalid @enderror"
                                                    name="ssc_registration_no" type="text"
                                                    value="{{ $candidate->ssc_registration_no }}"
                                                    id="ssc_registration_no"
                                                    placeholder="{{ __('ssc_registration_no') }}">
                                                @error('ssc_registration_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_passing_year"
                                                class="col-sm-4 col-form-label">{{ __('ssc_passing_year') }}</label>
                                            <div class="col-sm-8">
                                                <select name="ssc_passing_year" id="ssc_passing_year"
                                                    class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->ssc_passing_year == '2022') selected @endif
                                                        value="2022">
                                                        {{ __('2022') }}</option>
                                                    <option @if ($candidate->ssc_passing_year == '2023') selected @endif
                                                        value="2023">
                                                        {{ __('2023') }}</option>
                                                </select>
                                                @error('ssc_passing_year')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_group"
                                                class="col-sm-4 col-form-label">{{ __('ssc_group') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('ssc_group') is-invalid @enderror"
                                                    name="ssc_group" type="text" value="{{ $candidate->ssc_group }}"
                                                    id="ssc_group" placeholder="{{ __('ssc_group') }}">
                                                @error('ssc_group')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_result_type"
                                                class="col-sm-4 col-form-label">{{ __('ssc_result_type') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('ssc_result_type') is-invalid @enderror"
                                                    name="ssc_result_type" type="text"
                                                    value="{{ $candidate->ssc_result_type }}" id="ssc_result_type"
                                                    placeholder="{{ __('ssc_result_type') }}">
                                                @error('ssc_result_type')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_result_cgpa"
                                                class="col-sm-4 col-form-label">{{ __('ssc_result_cgpa') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('ssc_result_cgpa') is-invalid @enderror"
                                                    name="ssc_result_cgpa" type="text"
                                                    value="{{ $candidate->ssc_result_cgpa }}" id="ssc_result_cgpa"
                                                    placeholder="{{ __('ssc_result_cgpa') }}">
                                                @error('ssc_result_cgpa')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- hsc --}}
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('hsc') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_exam_name"
                                                class="col-sm-4 col-form-label">{{ __('hsc_exam_name') }}</label>
                                            <div class="col-sm-8">
                                                <select
                                                    class="rt-selectactive w-100-p @error('hsc_exam_name') is-invalid @enderror"
                                                    name="hsc_exam_name" id="hsc_exam_name">
                                                    <option @if ($candidate->hsc_exam_name == 'hsc') selected @endif
                                                        value="hsc">
                                                        {{ __('hsc') }}
                                                    </option>
                                                    <option @if ($candidate->hsc_exam_name == 'dakhil') selected @endif
                                                        value="dakhil">
                                                        {{ __('dakhil') }}
                                                    </option>
                                                </select>
                                                @error('hsc_exam_name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_education_board"
                                                class="col-sm-4 col-form-label">{{ __('hsc_education_board') }}</label>
                                            <div class="col-sm-8">
                                                <select name="hsc_education_board" id="hsc_education_board"
                                                    class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->hsc_education_board == 'Dhaka') selected @endif
                                                        value="Dhaka">
                                                        {{ __('Dhaka') }}</option>
                                                    <option @if ($candidate->hsc_education_board == 'dinajpur') selected @endif
                                                        value="dinajpur">
                                                        {{ __('dinajpur') }}</option>
                                                </select>
                                                @error('hsc_education_board')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_roll_no"
                                                class="col-sm-4 col-form-label">{{ __('hsc_roll_no') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('hsc_roll_no') is-invalid @enderror"
                                                    name="hsc_roll_no" type="text"
                                                    value="{{ $candidate->hsc_roll_no }}" id="hsc_roll_no"
                                                    placeholder="{{ __('hsc_roll_no') }}">
                                                @error('hsc_roll_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_registration_no"
                                                class="col-sm-4 col-form-label">{{ __('hsc_registration_no') }}</label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('hsc_registration_no') is-invalid @enderror"
                                                    name="hsc_registration_no" type="text"
                                                    value="{{ $candidate->hsc_registration_no }}"
                                                    id="hsc_registration_no"
                                                    placeholder="{{ __('hsc_registration_no') }}">
                                                @error('hsc_registration_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_passing_year"
                                                class="col-sm-4 col-form-label">{{ __('hsc_passing_year') }}</label>
                                            <div class="col-sm-8">
                                                <select name="hsc_passing_year" id="hsc_passing_year"
                                                    class="rt-selectactive w-100-p">
                                                    <option @if ($candidate->hsc_passing_year == '2022') selected @endif
                                                        value="2022">
                                                        {{ __('2022') }}</option>
                                                    <option @if ($candidate->hsc_passing_year == '2023') selected @endif
                                                        value="2023">
                                                        {{ __('2023') }}</option>
                                                </select>
                                                @error('hsc_passing_year')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_group"
                                                class="col-sm-4 col-form-label">{{ __('hsc_group') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('hsc_group') is-invalid @enderror"
                                                    name="hsc_group" type="text" value="{{ $candidate->hsc_group }}"
                                                    id="hsc_group" placeholder="{{ __('hsc_group') }}">
                                                @error('hsc_group')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_result_type"
                                                class="col-sm-4 col-form-label">{{ __('hsc_result_type') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('hsc_result_type') is-invalid @enderror"
                                                    name="hsc_result_type" type="text"
                                                    value="{{ $candidate->hsc_result_type }}" id="hsc_result_type"
                                                    placeholder="{{ __('hsc_result_type') }}">
                                                @error('hsc_result_type')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_result_cgpa"
                                                class="col-sm-4 col-form-label">{{ __('hsc_result_cgpa') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('hsc_result_cgpa') is-invalid @enderror"
                                                    name="hsc_result_cgpa" type="text"
                                                    value="{{ $candidate->hsc_result_cgpa }}" id="hsc_result_cgpa"
                                                    placeholder="{{ __('hsc_result_cgpa') }}">
                                                @error('hsc_result_cgpa')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- Honors --}}
                            <div class="row pt-2">
                                {{-- Honors --}}
                                <div class="card p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('honors') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="honors_exam_name"
                                                    class="col-sm-4 col-form-label">{{ __('honors_exam_name') }}</label>
                                                <div class="col-sm-8">
                                                    <select
                                                        class="rt-selectactive w-100-p @error('honors_exam_name') is-invalid @enderror"
                                                        name="honors_exam_name" id="honors_exam_name">
                                                        <option @if ($candidate->honors_exam_name == 'BSc') selected @endif
                                                            value="BSc">
                                                            {{ __('BSc') }}
                                                        </option>
                                                        <option @if ($candidate->honors_exam_name == 'Degree Pass') selected @endif
                                                            value="Degree Pass">
                                                            {{ __('Degree Pass') }}
                                                        </option>
                                                    </select>
                                                    @error('honors_exam_name')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="honors_subject"
                                                    class="col-sm-4 col-form-label">{{ __('honors_subject') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="honors_subject" id="honors_subject"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->honors_subject == 'Physics') selected @endif
                                                            value="Physics">
                                                            {{ __('Physics') }}</option>
                                                        <option @if ($candidate->honors_subject == 'English') selected @endif
                                                            value="English">
                                                            {{ __('English') }}</option>
                                                    </select>
                                                    @error('honors_subject')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="honors_institute"
                                                    class="col-sm-4 col-form-label">{{ __('honors_institute') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="honors_institute" id="honors_institute"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->honors_institute == 'Dhaka University') selected @endif
                                                            value="Dhaka University">
                                                            {{ __('Dhaka University') }}</option>
                                                        <option @if ($candidate->honors_institute == 'Rajshahi University') selected @endif
                                                            value="Rajshahi University">
                                                            {{ __('Rajshahi University') }}</option>
                                                    </select>
                                                    @error('honors_institute')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="honors_result_type"
                                                    class="col-sm-4 col-form-label">{{ __('honors_result_type') }}</label>
                                                <div class="col-sm-8">
                                                    <select
                                                        class="rt-selectactive w-100-p @error('honors_result_type') is-invalid @enderror"
                                                        name="honors_result_type" id="honors_result_type">
                                                        <option @if ($candidate->honors_result_type == 'GPA') selected @endif
                                                            value="GPA">
                                                            {{ __('GPA') }}
                                                        </option>
                                                        <option @if ($candidate->honors_result_type == 'Division') selected @endif
                                                            value="Division">
                                                            {{ __('Division') }}
                                                        </option>
                                                    </select>
                                                    @error('honors_result_type')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="honors_passing_year"
                                                    class="col-sm-4 col-form-label">{{ __('honors_passing_year') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="honors_passing_year" id="honors_passing_year"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->honors_passing_year == '2022') selected @endif
                                                            value="2022">
                                                            {{ __('2022') }}</option>
                                                        <option @if ($candidate->honors_passing_year == '2023') selected @endif
                                                            value="2023">
                                                            {{ __('2023') }}</option>
                                                    </select>
                                                    @error('honors_passing_year')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="honors_course_duration"
                                                    class="col-sm-4 col-form-label">{{ __('honors_course_duration') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="honors_course_duration" id="honors_course_duration"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->honors_course_duration == '4') selected @endif
                                                            value="4">
                                                            {{ __('4') }}</option>
                                                        <option @if ($candidate->honors_course_duration == '5') selected @endif
                                                            value="5">
                                                            {{ __('5') }}</option>
                                                    </select>
                                                    @error('honors_course_duration')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Masters --}}
                            <div class="row pt-2">
                                {{-- Masters --}}
                                <div class="card p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('masters') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="masters_exam_name"
                                                    class="col-sm-4 col-form-label">{{ __('masters_exam_name') }}</label>
                                                <div class="col-sm-8">
                                                    <select
                                                        class="rt-selectactive w-100-p @error('masters_exam_name') is-invalid @enderror"
                                                        name="masters_exam_name" id="masters_exam_name">
                                                        <option @if ($candidate->masters_exam_name == 'BSc') selected @endif
                                                            value="BSc">
                                                            {{ __('BSc') }}
                                                        </option>
                                                        <option @if ($candidate->masters_exam_name == 'Degree Pass') selected @endif
                                                            value="Degree Pass">
                                                            {{ __('Degree Pass') }}
                                                        </option>
                                                    </select>
                                                    @error('masters_exam_name')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="masters_subject"
                                                    class="col-sm-4 col-form-label">{{ __('masters_subject') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="masters_subject" id="masters_subject"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->masters_subject == 'Physics') selected @endif
                                                            value="Physics">
                                                            {{ __('Physics') }}</option>
                                                        <option @if ($candidate->masters_subject == 'English') selected @endif
                                                            value="English">
                                                            {{ __('English') }}</option>
                                                    </select>
                                                    @error('masters_subject')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="masters_institute"
                                                    class="col-sm-4 col-form-label">{{ __('masters_institute') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="masters_institute" id="masters_institute"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->masters_institute == 'Dhaka University') selected @endif
                                                            value="Dhaka University">
                                                            {{ __('Dhaka University') }}</option>
                                                        <option @if ($candidate->masters_institute == 'Rajshahi University') selected @endif
                                                            value="Rajshahi University">
                                                            {{ __('Rajshahi University') }}</option>
                                                    </select>
                                                    @error('masters_institute')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="masters_result_type"
                                                    class="col-sm-4 col-form-label">{{ __('masters_result_type') }}</label>
                                                <div class="col-sm-8">
                                                    <select
                                                        class="rt-selectactive w-100-p @error('masters_result_type') is-invalid @enderror"
                                                        name="masters_result_type" id="masters_result_type">
                                                        <option @if ($candidate->masters_result_type == 'GPA') selected @endif
                                                            value="GPA">
                                                            {{ __('GPA') }}
                                                        </option>
                                                        <option @if ($candidate->masters_result_type == 'Division') selected @endif
                                                            value="Division">
                                                            {{ __('Division') }}
                                                        </option>
                                                    </select>
                                                    @error('masters_result_type')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="masters_passing_year"
                                                    class="col-sm-4 col-form-label">{{ __('masters_passing_year') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="masters_passing_year" id="masters_passing_year"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->masters_passing_year == '2022') selected @endif
                                                            value="2022">
                                                            {{ __('2022') }}</option>
                                                        <option @if ($candidate->masters_passing_year == '2023') selected @endif
                                                            value="2023">
                                                            {{ __('2023') }}</option>
                                                    </select>
                                                    @error('masters_passing_year')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2">
                                                <label for="masters_course_duration"
                                                    class="col-sm-4 col-form-label">{{ __('masters_course_duration') }}</label>
                                                <div class="col-sm-8">
                                                    <select name="masters_course_duration" id="masters_course_duration"
                                                        class="rt-selectactive w-100-p">
                                                        <option @if ($candidate->masters_course_duration == '4') selected @endif
                                                            value="4">
                                                            {{ __('4') }}</option>
                                                        <option @if ($candidate->masters_course_duration == '5') selected @endif
                                                            value="5">
                                                            {{ __('5') }}</option>
                                                    </select>
                                                    @error('masters_course_duration')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Picture and Signature --}}
                            <div class="row pt-2">
                                {{-- Picture and Signature --}}
                                <div class="card p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('masters') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-2" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-md-8">
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="picture"
                                                    class="col-sm-4 col-form-label">{{ __('picture') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control @error('picture') is-invalid @enderror"
                                                        name="picture" type="file"
                                                        value="{{ $candidate->picture }}" id="picture"
                                                        placeholder="{{ __('picture') }}">
                                                    @error('picture')
                                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="signature"
                                                    class="col-sm-4 col-form-label">{{ __('signature') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control @error('signature') is-invalid @enderror"
                                                        name="signature" type="file"
                                                        value="{{ $candidate->signature }}" id="signature"
                                                        placeholder="{{ __('signature') }}">
                                                    @error('signature')
                                                        <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">
                                {{ __('save_changes') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('frontend_scripts')
    <script src="{{ asset('frontend/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend') }}/assets/js/ckeditor.min.js"></script>

    <script>


        //init datepicker
        $("#date").attr("autocomplete", "off");
        //init datepicker
        $('.datepicker').off('focus').datepicker({
            format: 'dd-mm-yyyy'
        }).on('click',
            function() {
                $(this).datepicker('show');
            }
        );

        $(document).on("change ", "#same_address", function() {
            let check = this.checked

            if (check) {
                $("#care_of_parmanent").val('').attr('readonly', 'readonly');
                $("#region_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#district_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#thana_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#post_office_parmanent").val('').attr('readonly', 'readonly');
                $("#postcode_parmanent").val('').attr('readonly', 'readonly');
                $("#place_parmanent").val('').attr('readonly', 'readonly');


            } else {
                $("#care_of_parmanent").removeAttr('readonly');
                $("#region_parmanent").select2({
                    disabled: false
                });
                $("#district_parmanent").select2({
                    disabled: false
                });
                $("#thana_parmanent").select2({
                    disabled: false
                });
                $("#postcode_parmanent").removeAttr('readonly');
                $("#post_office_parmanent").removeAttr('readonly');
                $("#place_parmanent").removeAttr('readonly');
            }
        })
    </script>
@endsection
