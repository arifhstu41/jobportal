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
                                        name="birth_date" type="date" value="{{ $candidate->birth_date }}"
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

                            <div class="row">
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header">
                                        {{ __('present_address') }}
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="mother_name_bn"
                                                class="col-sm-3 col-form-label">{{ __('mother_name_bn') }}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('mother_name_bn') is-invalid @enderror"
                                                    name="mother_name_bn" type="text"
                                                    value="{{ $candidate->mother_name_bn }}" id="mother_name_bn"
                                                    placeholder="{{ __('mother_name_bn') }}">
                                                @error('mother_name_bn')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="card col-lg-6 p-0">
                                    <div class="card-header">
                                        {{ __('present_address') }}
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="care_of"
                                                class="col-sm-3 col-form-label">{{ __('care_of') }}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('care_of') is-invalid @enderror"
                                                    name="care_of" type="text"
                                                    value="{{ $candidate->care_of }}" id="care_of"
                                                    placeholder="{{ __('care_of') }}">
                                                @error('care_of')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="place"
                                                class="col-sm-3 col-form-label">{{ __('place') }}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('place') is-invalid @enderror"
                                                    name="place" type="text"
                                                    value="{{ $candidate->place }}" id="place"
                                                    placeholder="{{ __('place') }}">
                                                @error('place')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
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


{{-- first_name,
last_name,
mobile,
email,
father_name,
mother_name,
present_address,
permanent_address,
education,
experience --}}
