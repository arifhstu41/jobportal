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
            {{-- @if ($errors->count())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
            @endif --}}
            <form action="{{ route('website.candidate.application.form.submit') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="overlay"></div>
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
                        {{-- <hr> --}}
                        <div class="p-1 rounded-2">

                            <div class="row">
                                <div class="card col-lg-12 p-0">
                                    <div class="card-header">
                                        {{ __('Personal Info') }}
                                    </div>
                                    <div class="card-body pt-1 personal-info">
                                        <div class="form-group form-group-sm row py-0">
                                            <label for="name" class="col-sm-3 col-form-label">{{ __('name') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    name="name" type="text"
                                                    value="{{ old('name') ? old('name') : $user->name }}" id="name"
                                                    placeholder="{{ __('name') }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="name_bn"
                                                class="col-sm-3 col-form-label bangla">{{ __('name_bn') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('name_bn') is-invalid @enderror"
                                                    name="name_bn" type="text"
                                                    value="{{ old('name_bn') ? old('name_bn') : $candidate->name_bn }}"
                                                    id="name_bn" placeholder="{{ __('name_bn') }}" required>
                                                @error('name_bn')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="father_name"
                                                class="col-sm-3 col-form-label">{{ __('father_name') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('father_name') is-invalid @enderror"
                                                    name="father_name" type="text"
                                                    value="{{ old('father_name') ? old('father_name') : $candidate->father_name }}"
                                                    id="father_name" placeholder="{{ __('father_name') }}" required>
                                                @error('father_name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="father_name_bn"
                                                class="col-sm-3 col-form-label">{{ __('father_name_bn') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('father_name_bn') is-invalid @enderror"
                                                    name="father_name_bn" type="text"
                                                    value="{{ old('father_name_bn') ? old('father_name_bn') : $candidate->father_name_bn }}"
                                                    id="father_name_bn" placeholder="{{ __('father_name_bn') }}" required>
                                                @error('father_name_bn')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="mother_name"
                                                class="col-sm-3 col-form-label">{{ __('mother_name') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('mother_name') is-invalid @enderror"
                                                    name="mother_name" type="text"
                                                    value="{{ old('mother_name') ? old('mother_name') : $candidate->mother_name }}"
                                                    id="mother_name" placeholder="{{ __('mother_name') }}" required>
                                                @error('mother_name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="mother_name_bn"
                                                class="col-sm-3 col-form-label">{{ __('mother_name_bn') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('mother_name_bn') is-invalid @enderror"
                                                    name="mother_name_bn" type="text"
                                                    value="{{ old('mother_name_bn') ? old('mother_name_bn') : $candidate->mother_name_bn }}"
                                                    id="mother_name_bn" placeholder="{{ __('mother_name_bn') }}" required>
                                                @error('mother_name_bn')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="birth_date"
                                                class="col-sm-3 col-form-label">{{ __('birth_date') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                {{-- <input required
                                                    class="form-control @error('birth_date') is-invalid @enderror datepicker date ps-2"
                                                    name="birth_date" type="text" value="{{ old('birth_date') ? old('birth_date') : $candidate->birth_date }}"
                                                    id="birth_date" placeholder="{{ __('birth_date') }}">
                                                @error('birth_date')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror --}}

                                                <div class="fromGroup">
                                                    <div
                                                        class="d-flex align-items-center form-control-icon date datepicker">
                                                        <input type="text" name="birth_date"
                                                            value="{{ date('d-m-Y', strtotime($candidate->birth_date)) }}"
                                                            id="date" placeholder="dd/mm/yyyy"
                                                            class="form-control border-cutom " autocomplete="off">
                                                        <span class="input-group-addon input-group-text-custom">
                                                            <svg width="22" height="22" viewBox="0 0 22 22"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M17.875 3.4375H4.125C3.7453 3.4375 3.4375 3.7453 3.4375 4.125V17.875C3.4375 18.2547 3.7453 18.5625 4.125 18.5625H17.875C18.2547 18.5625 18.5625 18.2547 18.5625 17.875V4.125C18.5625 3.7453 18.2547 3.4375 17.875 3.4375Z"
                                                                    stroke="#18191C" stroke-width="1.3"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M15.125 2.0625V4.8125" stroke="#18191C"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path d="M6.875 2.0625V4.8125" stroke="#18191C"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path d="M3.4375 7.5625H18.5625" stroke="#18191C"
                                                                    stroke-width="1.5" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="gender"
                                                class="col-sm-3 col-form-label">{{ __('gender') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <select required
                                                    class="rt-selectactive w-100-p @error('gender') is-invalid @enderror"
                                                    name="gender">
                                                    <option @if ($candidate->gender == 'male' || old('gender') == 'male') selected @endif
                                                        value="male">
                                                        {{ __('male') }}
                                                    </option>
                                                    <option @if ($candidate->gender == 'female' || old('gender') == 'female') selected @endif
                                                        value="female">
                                                        {{ __('female') }}
                                                    </option>
                                                    <option @if ($candidate->gender == 'other' || old('gender') == 'other') selected @endif
                                                        value="other">
                                                        {{ __('other') }}
                                                    </option>
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="religion"
                                                class="col-sm-3 col-form-label">{{ __('religion') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <select required
                                                    class="rt-selectactive w-100-p @error('religion') is-invalid @enderror"
                                                    name="religion">
                                                    <option @if ($candidate->religion == 'Islam' || old('religion') == 'Islam') selected @endif
                                                        value="Islam">
                                                        {{ __('Islam') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'Hinduism' || old('religion') == 'Hinduism') selected @endif
                                                        value="Hinduism">
                                                        {{ __('Hinduism') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'Buddhism' || old('religion') == 'Buddhism') selected @endif
                                                        value="Buddhism">
                                                        {{ __('Buddhism') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'Christianity' || old('religion') == 'Christianity') selected @endif
                                                        value="Christianity">
                                                        {{ __('Christianity') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'others' || old('religion') == 'others') selected @endif
                                                        value="others">
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
                                                <input
                                                    class="form-control @error('birth_certificate_no') is-invalid @enderror"
                                                    name="birth_certificate_no" type="text"
                                                    value="{{ old('birth_certificate_no') ? old('birth_certificate_no') : $candidate->birth_certificate_no }}"
                                                    id="birth_certificate_no"
                                                    placeholder="{{ __('birth_certificate_no') }}">
                                                @error('birth_certificate_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="nid_no"
                                                class="col-sm-3 col-form-label">{{ __('nid_no') }}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('nid_no') is-invalid @enderror"
                                                    name="nid_no" type="text"
                                                    value="{{ old('nid_no') ? old('nid_no') : $candidate->nid_no }}"
                                                    id="nid_no" placeholder="{{ __('nid_no') }}">
                                                @error('nid_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group form-group-sm row py-2">
                                            <label for="passport_no"
                                                class="col-sm-3 col-form-label">{{ __('passport_no') }}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('passport_no') is-invalid @enderror"
                                                    name="passport_no" type="text"
                                                    value="{{ old('passport_no') ? old('passport_no') : $candidate->passport_no }}"
                                                    id="passport_no" placeholder="{{ __('passport_no') }}">
                                                @error('passport_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="marital_status"
                                                class="col-sm-3 col-form-label">{{ __('marital_status') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="marital_status" class="rt-selectactive w-100-p" required>
                                                    <option @if ($candidate->marital_status == 'single' || old('marital_status') == 'single') selected @endif
                                                        value="single">
                                                        {{ __('single') }}</option>
                                                    <option @if ($candidate->marital_status == 'married' || old('marital_status') == 'married') selected @endif
                                                        value="married">
                                                        {{ __('married') }}</option>
                                                    <option @if ($candidate->marital_status == 'divorced' || old('marital_status') == 'divorced') selected @endif
                                                        value="divorced">
                                                        {{ __('divorced') }}</option>
                                                    <option @if ($candidate->marital_status == 'others' || old('marital_status') == 'others') selected @endif
                                                        value="others">
                                                        {{ __('others') }}</option>
                                                </select>
                                                @error('marital_status')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="quota"
                                                class="col-sm-3 col-form-label">{{ __('quota') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="quota"
                                                    class="rt-selectactive w-100-p @error('quota') is-invalid @enderror"
                                                    required>
                                                    <option @if ($candidate->quota == 'Non Quota' || old('quota') == 'Non Quota') selected @endif
                                                        value="Non Quota">
                                                        {{ __('Non Quota') }}</option>
                                                    <option @if ($candidate->quota == 'Child of Freedom Fighter' || old('quota') == 'Child of Freedom Fighter') selected @endif
                                                        value="Child of Freedom Fighter">
                                                        {{ __('Child of Freedom Fighter') }}</option>
                                                    <option @if ($candidate->quota == 'Grand Child of Freedom Fighter' || old('quota') == 'Grand Child of Freedom Fighter') selected @endif
                                                        value="Grand Child of Freedom Fighter">
                                                        {{ __('Grand Child of Freedom Fighter') }}</option>
                                                    <option @if ($candidate->quota == 'Physically Handicapped' || old('quota') == 'Physically Handicapped') selected @endif
                                                        value="Physically Handicapped">
                                                        {{ __('Physically Handicapped') }}</option>
                                                    <option @if ($candidate->quota == 'Orphan' || old('quota') == 'Orphan') selected @endif
                                                        value="Orphan">
                                                        {{ __('Orphan') }}</option>
                                                    <option @if ($candidate->quota == 'Ethic Minority' || old('quota') == 'Ethic Minority') selected @endif
                                                        value="Ethic Minority">
                                                        {{ __('Ethic Minority') }}</option>
                                                    <option @if ($candidate->quota == 'Ansar-VDP' || old('quota') == 'Ansar-VDP') selected @endif
                                                        value="Ansar-VDP">
                                                        {{ __('Ansar-VDP') }}</option>
                                                    
                                                </select>
                                                @error('quota')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="nationality"
                                                class="col-sm-3 col-form-label">{{ __('nationality') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="nationality" class="rt-selectactive w-100-p" required>
                                                    <option value="22" selected>Bangladeshi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- Address information --}}
                            <div class="row">
                                <div class="card col-lg-12 p-0">
                                    <div class="card-header">
                                        {{ __('present_address') }}
                                    </div>
                                    <div class="card-body pt-1">
                                        <div class="form-group form-group-sm row py-0">
                                            <label for="care_of"
                                                class="col-sm-4 col-form-label">{{ __('care_of') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('care_of') is-invalid @enderror"
                                                    name="care_of" type="text"
                                                    value="{{ old('care_of') ? old('care_of') : $candidate->care_of }}"
                                                    id="care_of" placeholder="{{ __('care_of') }}">
                                                @error('care_of')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="region"
                                                class="col-sm-4 col-form-label">{{ __('region') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="region" id="region"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}"
                                                            {{ $candidate->region == $division->id ? 'selected' : '' }}>
                                                            {{ $division->nameEn }}</option>
                                                    @endforeach
                                                </select>
                                                @error('region')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="district_div">
                                            <label for="district"
                                                class="col-sm-4 col-form-label">{{ __('district') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="district" id="district"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ $candidate->district == $district->id ? 'selected' : '' }}>
                                                            {{ $district->nameEn }}</option>
                                                    @endforeach --}}

                                                </select>
                                                @error('district')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="thana_div">
                                            <label for="thana"
                                                class="col-sm-4 col-form-label">{{ __('thana') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="thana" id="thana"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($upazilas as $thana)
                                                        <option value="{{ $thana->id }}"
                                                            {{ $candidate->thana == $thana->id ? 'selected' : '' }}>
                                                            {{ $thana->name }}</option>
                                                    @endforeach --}}

                                                </select>
                                                @error('thana')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="union_div">
                                            <label for="pourosova_union_porishod"
                                                class="col-sm-4 col-form-label">{{ __('pourosova_union_porishod') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="pourosova_union_porishod"
                                                    id="pourosova_union_porishod" class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($unions as $union)
                                                        <option value="{{ $union->id }}"
                                                            {{ $candidate->pourosova_union_porishod == $union->id ? 'selected' : '' }}>
                                                            {{ $union->name }}</option>
                                                    @endforeach --}}

                                                </select>
                                                @error('pourosova_union_porishod')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="ward_div">
                                            <label for="ward_no"
                                                class="col-sm-4 col-form-label">{{ __('ward_no') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="ward_no" id="ward_no"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($wards as $key => $ward)
                                                        <option value="{{ $ward }}"
                                                            {{ $candidate->ward_no == $ward ? 'selected' : '' }}>
                                                            Ward-{{ $ward }}</option>
                                                    @endforeach --}}
                                                </select>
                                                @error('ward_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="post_office"
                                                class="col-sm-4 col-form-label">{{ __('post_office') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input required
                                                    class="form-control @error('post_office') is-invalid @enderror"
                                                    name="post_office" type="text"
                                                    value="{{ old('post_office') ? old('post_office') : $candidate->post_office }}"
                                                    id="post_office" placeholder="{{ __('post_office') }}">
                                                @error('post_office')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group form-group-sm row py-2">
                                            <label for="postcode"
                                                class="col-sm-4 col-form-label">{{ __('postcode') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('postcode') is-invalid @enderror"
                                                    name="postcode" type="number" pattern="\d*"
                                                    value="{{ old('postcode') ? old('postcode') : $candidate->postcode }}"
                                                    id="postcode" placeholder="{{ __('postcode') }}" required>
                                                @error('postcode')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="place"
                                                class="col-sm-4 col-form-label">{{ __('place') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('place') is-invalid @enderror"
                                                    name="place" type="text"
                                                    value="{{ old('place') ? old('place') : $candidate->place }}"
                                                    id="place" placeholder="{{ __('place') }}" required>
                                                @error('place')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="house_and_road_no"
                                                class="col-sm-4 col-form-label">{{ __('house_and_road_no') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('house_and_road_no') is-invalid @enderror"
                                                    name="house_and_road_no" type="text"
                                                    value="{{ old('house_and_road_no') ? old('house_and_road_no') : $candidate->house_and_road_no }}"
                                                    id="house_and_road_no" placeholder="{{ __('house_and_road_no') }}"
                                                    required>
                                                @error('house_and_road_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="card col-lg-12 mt-2 p-0">
                                    <div class="card-header">
                                        {{ __('parmanent_address') }}
                                        <input type="checkbox" name="same_address"
                                            class="form-check-input d-inline-block mt-1" id="same_address">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="same_address">Same
                                            as present addresss</label>
                                    </div>
                                    <div class="card-body pt-1">
                                        <div class="form-group form-group-sm row py-0">
                                            <label for="care_of_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('care_of') }}<span
                                                    class="required">*</span></label>

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
                                                class="col-sm-4 col-form-label">{{ __('region') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="region_parmanent" id="region_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}"
                                                            {{ $division->id == $candidate->region_parmanent ? 'selected' : '' }}>
                                                            {{ $division->nameEn }}</option>
                                                    @endforeach
                                                </select>
                                                @error('region_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="parmanent_district_div">
                                            <label for="district_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('district') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="district_parmanent" id="district_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ $district->id == $candidate->district_parmanent ? 'selected' : '' }}>
                                                            {{ $district->nameEn }}</option>
                                                    @endforeach --}}
                                                </select>
                                                @error('district_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="parmanent_thana_div">
                                            <label for="thana_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('thana') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="thana_parmanent" id="thana_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($upazilas as $upazila)
                                                        <option value="{{ $upazila->id }}"
                                                            {{ $upazila->id == $candidate->thana_parmanent ? 'selected' : '' }}>
                                                            {{ $upazila->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                                @error('thana_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="parmanent_union_div">
                                            <label for="pourosova_union_porishod_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('pourosova_union_porishod_parmanent') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="pourosova_union_porishod_parmanent"
                                                    id="pourosova_union_porishod_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($unions as $union)
                                                        <option value="{{ $union->id }}"
                                                            {{ $candidate->pourosova_union_porishod_parmanent == $union->id ? 'selected' : '' }}>
                                                            {{ $union->name }}</option>
                                                    @endforeach --}}

                                                </select>
                                                @error('pourosova_union_porishod_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="parmanent_ward_div">
                                            <label for="ward_no_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('ward_no_parmanent') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="ward_no_parmanent" id="ward_no_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    {{-- @foreach ($wards as $key => $ward)
                                                        <option value="{{ $ward }}"
                                                            {{ $candidate->ward_no_parmanent == $ward ? 'selected' : '' }}>
                                                            Ward-{{ $ward }}</option>
                                                    @endforeach --}}
                                                </select>
                                                @error('ward_no_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="post_office_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('post_office') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input required
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
                                                class="col-sm-4 col-form-label">{{ __('postcode') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input required
                                                    class="form-control @error('postcode_parmanent') is-invalid @enderror"
                                                    name="postcode_parmanent" type="number" pattern="\d*"
                                                    value="{{ $candidate->postcode_parmanent }}" id="postcode_parmanent"
                                                    placeholder="{{ __('postcode') }}">
                                                @error('postcode_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="place_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('place') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input required
                                                    class="form-control @error('place_parmanent') is-invalid @enderror"
                                                    name="place_parmanent" type="text"
                                                    value="{{ $candidate->place_parmanent }}" id="place_parmanent"
                                                    placeholder="{{ __('place') }}">
                                                @error('place_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="house_and_road_no_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('house_and_road_no_parmanent') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <input
                                                    class="form-control @error('house_and_road_no_parmanent') is-invalid @enderror"
                                                    name="house_and_road_no_parmanent" type="text"
                                                    value="{{ old('house_and_road_no_parmanent') ? old('house_and_road_no_parmanent') : $candidate->house_and_road_no_parmanent }}"
                                                    id="house_and_road_no_parmanent"
                                                    placeholder="{{ __('house_and_road_no_parmanent') }}" required>
                                                @error('house_and_road_no_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            {{-- Education Information --}}
                            {{-- @php
                                $jsc= $candidate->educations->where('level', "masters")->first();
                            @endphp --}}
                            {{-- PSC JSC --}}
                            <div class="row mt-2">
                                <div class="card col-lg-12 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('psc') }}
                                        <input type="checkbox" name="psc"
                                            class="form-check-input d-inline-block mt-1"
                                            {{ old('psc') ? 'checked' : '' }} id="psc">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="psc">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group form-group-sm row py-1">
                                            <label for="psc_exam_name"
                                                class="col-sm-4 col-form-label">{{ __('psc_exam_name') }}</label>
                                            <div class="col-sm-8">
                                                <select
                                                    class="rt-selectactive w-100-p @error('psc_exam_name') is-invalid @enderror"
                                                    name="psc_exam_name" id="psc_exam_name">
                                                    <option value="">Please Select</option>
                                                    <option @if (old('psc_exam_name') == 'PSC') selected @endif
                                                        value="PSC">
                                                        {{ __('PSC') }}
                                                    </option>
                                                    <option @if (old('psc_exam_name') == 'Ebtedia') selected @endif
                                                        value="Ebtedia">
                                                        {{ __('Ebtedia') }}
                                                    </option>
                                                </select>
                                                @error('jsc_exam_name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="psc_roll_no"
                                                class="col-sm-4 col-form-label">{{ __('psc_roll_no') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('psc_roll_no') is-invalid @enderror"
                                                    name="psc_roll_no" type="text"
                                                    value="{{ old('psc_roll_no') ?? '' }}" id="psc_roll_no"
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
                                                <select name="psc_passing_year" id="psc_passing_year"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($years as $key => $year)
                                                        <option value="{{ $year }}"
                                                            {{ old('psc_passing_year') == $year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endforeach
                                                </select>
                                                @error('psc_passing_year')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="psc_school"
                                                class="col-sm-4 col-form-label">{{ __('psc_school') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('psc_school') is-invalid @enderror"
                                                    name="psc_school" type="text"
                                                    value="{{ old('psc_school') ?? '' }}" id="psc_school"
                                                    placeholder="{{ __('psc_school') }}">
                                                @error('psc_school')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="card col-lg-12 p-0 mt-2">
                                    <div class="card-header d-inline-block">
                                        {{ __('jsc') }}
                                        <input type="checkbox" name="jsc"
                                            class="form-check-input d-inline-block mt-1"
                                            {{ old('jsc') ? 'checked' : '' }} id="jsc">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="jsc">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group form-group-sm row py-1">
                                            <label for="jsc_exam_name"
                                                class="col-sm-4 col-form-label">{{ __('jsc_exam_name') }}</label>
                                            <div class="col-sm-8">
                                                <select
                                                    class="rt-selectactive w-100-p @error('jsc_exam_name') is-invalid @enderror"
                                                    name="jsc_exam_name" id="jsc_exam_name">
                                                    <option value="">Please Select</option>
                                                    <option @if (old('jsc_exam_name') == 'JSC') selected @endif
                                                        value="JSC">
                                                        {{ __('JSC') }}
                                                    </option>
                                                    <option @if (old('jsc_exam_name') == 'JDC') selected @endif
                                                        value="JDC">
                                                        {{ __('JDC') }}
                                                    </option>
                                                    <option @if (old('jsc_exam_name') == 'Class Eight') selected @endif
                                                        value="Class Eight">
                                                        {{ __('Class Eight') }}
                                                    </option>
                                                    <option @if (old('jsc_exam_name') == 'Junior Scholarship') selected @endif
                                                        value="Junior Scholarship">
                                                        {{ __('Junior Scholarship') }}
                                                    </option>
                                                    <option @if (old('jsc_exam_name') == 'Class Eight Equivalent') selected @endif
                                                        value="Class Eight Equivalent">
                                                        {{ __('Class Eight Equivalent') }}
                                                    </option>
                                                </select>
                                                @error('jsc_exam_name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="jsc_roll_no"
                                                class="col-sm-4 col-form-label">{{ __('jsc_roll_no') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('jsc_roll_no') is-invalid @enderror"
                                                    name="jsc_roll_no" type="text" value="{{ old('jsc_roll_no') }}"
                                                    id="jsc_roll_no" placeholder="{{ __('jsc_roll_no') }}">
                                                @error('jsc_roll_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="jsc_passing_year"
                                                class="col-sm-4 col-form-label">{{ __('jsc_passing_year') }}</label>
                                            <div class="col-sm-8">
                                                <select name="jsc_passing_year" id="jsc_passing_year"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($years as $key => $year)
                                                        <option value="{{ $year }}"
                                                            {{ old('jsc_passing_year') == $year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endforeach
                                                </select>
                                                @error('jsc_passing_year')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="jsc_school"
                                                class="col-sm-4 col-form-label">{{ __('jsc_school') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('jsc_school') is-invalid @enderror"
                                                    name="jsc_school" type="text" value="{{ old('jsc_school') }}"
                                                    id="jsc_school" placeholder="{{ __('jsc_school') }}">
                                                @error('jsc_school')
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
                                <div class="card col-lg-12 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('ssc') }}
                                        <input type="checkbox" name="ssc"
                                            class="form-check-input d-inline-block mt-1"
                                            {{ old('ssc') ? 'checked' : '' }} id="ssc">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="ssc">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_exam_name"
                                                class="col-sm-4 col-form-label">{{ __('ssc_exam_name') }}</label>
                                            <div class="col-sm-8">
                                                <select
                                                    class="rt-selectactive w-100-p @error('ssc_exam_name') is-invalid @enderror"
                                                    name="ssc_exam_name" id="ssc_exam_name">
                                                    <option value="">Please Select</option>
                                                    <option @if (old('ssc_exam_name') == 'S.S.C') selected @endif
                                                        value="S.S.C">
                                                        {{ __('S.S.C') }}
                                                    </option>
                                                    <option @if (old('ssc_exam_name') == 'Dakhil') selected @endif
                                                        value="Dakhil">
                                                        {{ __('Dakhil') }}
                                                    </option>
                                                    <option @if (old('ssc_exam_name') == 'S.S.C Vocational') selected @endif
                                                        value="S.S.C Vocational">
                                                        {{ __('S.S.C Vocational') }}
                                                    </option>
                                                    <option @if (old('ssc_exam_name') == 'O Level/Cambridge') selected @endif
                                                        value="O Level/Cambridge">
                                                        {{ __('O Level/Cambridge') }}
                                                    </option>
                                                    <option @if (old('ssc_exam_name') == 'S.S.C Equivalent') selected @endif
                                                        value="S.S.C Equivalent">
                                                        {{ __('S.S.C Equivalent') }}
                                                    </option>
                                                    <option @if (old('ssc_exam_name') == 'Dakhil Vocational') selected @endif
                                                        value="Dakhil Vocational">
                                                        {{ __('Dakhil Vocational') }}
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
                                                    <option value="">Please Select</option>
                                                    @foreach ($boards as $item)
                                                        <option @if (old('ssc_education_board') == $item->id) selected @endif
                                                            value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach

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
                                                    name="ssc_roll_no" type="text" value="{{ old('ssc_roll_no') }}"
                                                    id="ssc_roll_no" placeholder="{{ __('ssc_roll_no') }}">
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
                                                    value="{{ old('ssc_registration_no') }}" id="ssc_registration_no"
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
                                                    <option value="">Please Select</option>
                                                    @foreach ($years as $key => $year)
                                                        <option value="{{ $year }}"
                                                            {{ old('ssc_passing_year') == $year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endforeach
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
                                                <select name="ssc_group" id="ssc_group" class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    <option @if (old('ssc_group') == 'Business Studies') selected @endif
                                                        value="Business Studies">
                                                        {{ __('Business Studies') }}</option>
                                                    <option @if (old('ssc_group') == 'General') selected @endif
                                                        value="General">
                                                        {{ __('General') }}</option>
                                                    <option @if (old('ssc_group') == 'Humanities') selected @endif
                                                        value="Humanities">
                                                        {{ __('Humanities') }}</option>
                                                    <option @if (old('ssc_group') == 'Science') selected @endif
                                                        value="Science">
                                                        {{ __('Science') }}</option>
                                                    <option @if (old('ssc_group') == 'Other') selected @endif
                                                        value="Other">
                                                        {{ __('Other') }}</option>
                                                </select>
                                                @error('ssc_group')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ssc_result_type"
                                                class="col-sm-4 col-form-label">{{ __('ssc_result_type') }}</label>
                                            <div class="col-sm-8">
                                                <select name="ssc_result_type" id="ssc_result_type"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    <option value="1st Division"
                                                        {{ old('ssc_result_type') == '1st Division' ? 'selected' : '' }}>
                                                        1st Division</option>
                                                    <option value="2nd Division"
                                                        {{ old('ssc_result_type') == '2nd Division' ? 'selected' : '' }}>
                                                        2nd Division</option>
                                                    <option value="3rd Division"
                                                        {{ old('ssc_result_type') == '3rd Division' ? 'selected' : '' }}>
                                                        3rd Division</option>
                                                    <option value="Passed"
                                                        {{ old('ssc_result_type') == 'Passed' ? 'selected' : '' }}>
                                                        Passed</option>

                                                    <option value="GPA5"
                                                        {{ old('ssc_result_type') == 'GPA5' ? 'selected' : '' }}>GPA(out
                                                        of 5)</option>
                                                </select>
                                                @error('ssc_result_type')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="ssc_cgpa">
                                            <label for="ssc_result_cgpa"
                                                class="col-sm-4 col-form-label">{{ __('ssc_result_cgpa') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('ssc_result_cgpa') is-invalid @enderror"
                                                    name="ssc_result_cgpa" type="text"
                                                    value="{{ old('ssc_result_cgpa') }}" id="ssc_result_cgpa"
                                                    placeholder="{{ __('ssc_result_cgpa') }}">
                                                @error('ssc_result_cgpa')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- hsc --}}
                                <div class="card col-lg-12 mt-2 p-0">
                                    <div class="card-header d-inline-block">
                                        {{ __('hsc') }}
                                        <input type="checkbox" name="hsc"
                                            class="form-check-input d-inline-block mt-1"
                                            {{ old('hsc') ? 'checked' : '' }} id="hsc"
                                            {{ old('hsc') ? 'checked' : '' }}>
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="hsc">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group form-group-sm row py-1">
                                            <label for="hsc_exam_name"
                                                class="col-sm-4 col-form-label">{{ __('hsc_exam_name') }}</label>
                                            <div class="col-sm-8">
                                                <select
                                                    class="rt-selectactive w-100-p @error('hsc_exam_name') is-invalid @enderror"
                                                    name="hsc_exam_name" id="hsc_exam_name">
                                                    <option value="">Please Select</option>
                                                    <option @if (old('hsc_exam_name') == 'HSC') selected @endif
                                                        value="HSC">
                                                        {{ __('HSC') }}
                                                    </option>
                                                    <option @if (old('hsc_exam_name') == 'Alim') selected @endif
                                                        value="Alim">
                                                        {{ __('Alim') }}
                                                    </option>
                                                    <option @if (old('hsc_exam_name') == 'Diploma in Commerce/BM') selected @endif
                                                        value="Diploma in Commerce/BM">
                                                        {{ __('Diploma in Commerce/BM') }}
                                                    </option>
                                                    <option @if (old('hsc_exam_name') == 'A Level/Sr. Cambridge') selected @endif
                                                        value="A Level/Sr. Cambridge">
                                                        {{ __('A Level/Sr. Cambridge') }}
                                                    </option>
                                                    <option @if (old('hsc_exam_name') == 'HSC Equivalent') selected @endif
                                                        value="HSC Equivalent">
                                                        {{ __('HSC Equivalent') }}
                                                    </option>
                                                    <option @if (old('hsc_exam_name') == 'Diploma(Nursing/Midwifery)') selected @endif
                                                        value="Diploma(Nursing/Midwifery)">
                                                        {{ __('Diploma(Nursing/Midwifery)') }}
                                                    </option>
                                                    <option @if (old('hsc_exam_name') == 'HSC Vocational') selected @endif
                                                        value="HSC Vocational">
                                                        {{ __('HSC Vocational') }}
                                                    </option>
                                                    <option @if (old('hsc_exam_name') == 'Other') selected @endif
                                                        value="Other">
                                                        {{ __('Other') }}
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
                                                    <option value="">Please Select</option>
                                                    @foreach ($boards as $item)
                                                        <option @if (old('hsc_education_board') == $item->id) selected @endif
                                                            value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
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
                                                    name="hsc_roll_no" type="text" value="{{ old('hsc_roll_no') }}"
                                                    id="hsc_roll_no" placeholder="{{ __('hsc_roll_no') }}">
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
                                                    value="{{ old('hsc_registration_no') }}" id="hsc_registration_no"
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
                                                    <option value="">Please Select</option>
                                                    @foreach ($years as $key => $year)
                                                        <option value="{{ $year }}"
                                                            {{ old('hsc_passing_year') == $year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endforeach
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
                                                <select name="hsc_group" id="hsc_group" class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    <option @if (old('hsc_group') == 'Business Studies') selected @endif
                                                        value="Business Studies">
                                                        {{ __('Business Studies') }}</option>
                                                    <option @if (old('hsc_group') == 'General') selected @endif
                                                        value="General">
                                                        {{ __('General') }}</option>
                                                    <option @if (old('hsc_group') == 'Humanities') selected @endif
                                                        value="Humanities">
                                                        {{ __('Humanities') }}</option>
                                                    <option @if (old('hsc_group') == 'Science') selected @endif
                                                        value="Science">
                                                        {{ __('Science') }}</option>
                                                    <option @if (old('hsc_group') == 'Other') selected @endif
                                                        value="Other">
                                                        {{ __('Other') }}</option>
                                                </select>
                                                @error('hsc_group')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="hsc_result_type"
                                                class="col-sm-4 col-form-label">{{ __('hsc_result_type') }}</label>
                                            <div class="col-sm-8">
                                                <select name="hsc_result_type" id="hsc_result_type"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    <option value="1st Division"
                                                        {{ old('hsc_result_type') == '1st Division' ? 'selected' : '' }}>
                                                        1st Division</option>
                                                    <option value="2nd Division"
                                                        {{ old('hsc_result_type') == '2nd Division' ? 'selected' : '' }}>
                                                        2nd Division</option>
                                                    <option value="3rd Division"
                                                        {{ old('hsc_result_type') == '3rd Division' ? 'selected' : '' }}>
                                                        3rd Division</option>
                                                    <option value="Passed"
                                                        {{ old('hsc_result_type') == 'Passed' ? 'selected' : '' }}>
                                                        Passed</option>
                                                    <option value="GPA5"
                                                        {{ old('hsc_result_type') == 'GPA5' ? 'selected' : '' }}>GPA(out
                                                        of 5)</option>
                                                </select>
                                                @error('hsc_result_type')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2 d-none" id="hsc_cgpa">
                                            <label for="hsc_result_cgpa"
                                                class="col-sm-4 col-form-label">{{ __('hsc_result_cgpa') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control @error('hsc_result_cgpa') is-invalid @enderror"
                                                    name="hsc_result_cgpa" type="text"
                                                    value="{{ old('hsc_result_cgpa') }}" id="hsc_result_cgpa"
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
                                        <input type="checkbox" name="honors" {{ old('honors') ? 'checked' : '' }}
                                            class="form-check-input d-inline-block mt-1" id="honors">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="honors">If
                                            Applicable</label>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="honors_exam_name"
                                                    class="col-sm-4 col-form-label">{{ __('honors_exam_name') }}</label>
                                                <div class="col-sm-8">
                                                    <select
                                                        class="w-100-p @error('honors_exam_name') is-invalid @enderror"
                                                        name="honors_exam_name" id="honors_exam_name">
                                                        <option value="">Please Select</option>
                                                        <option value="B.Sc (Engineering/Architecture)"
                                                            @if (old('honors_exam_name') == 'B.Sc (Engineering/Architecture)') selected @endif>B.Sc
                                                            (Engineering/Architecture)</option>
                                                        <option value="B.Sc (Agricultural Science)"
                                                            @if (old('honors_exam_name') == 'B.Sc (Agricultural Science)') selected @endif>B.Sc
                                                            (Agricultural Science)</option>
                                                        <option value="M.B.B.S/B.D.S"
                                                            @if (old('honors_exam_name') == 'M.B.B.S/B.D.S') selected @endif>
                                                            M.B.B.S/B.D.S</option>
                                                        <option value="BBA"
                                                            @if (old('honors_exam_name') == 'BBA') selected @endif>
                                                            Bachelor of Business Administration (BBA)</option>
                                                        <option value="Honours"
                                                            @if (old('honors_exam_name') == 'Honours') selected @endif>Honours
                                                        </option>
                                                        <option value="Pass Course"
                                                            @if (old('honors_exam_name') == 'Pass Course') selected @endif>Pass Course
                                                        </option>
                                                        <option value="A & B Section of A.M.I.E"
                                                            @if (old('honors_exam_name') == 'A & B Section of A.M.I.E') selected @endif>A & B
                                                            Section of A.M.I.E</option>
                                                        <option value="B.Sc/Bachelor (Nursing)"
                                                            @if (old('honors_exam_name') == 'B.Sc/Bachelor (Nursing)') selected @endif>
                                                            B.Sc/Bachelor (Nursing)</option>
                                                        <option value="Others"
                                                            @if (old('honors_exam_name') == 'Others') selected @endif>Others
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
                                                <div class="col-sm-8 dashboard-dropdown">
                                                    <select name="honors_subject" id="honors_subject"
                                                        class="search rt-selectactive w-100-p">
                                                        <option value="">Please Select</option>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject->code }}">{{ $subject->name }}</option>
                                                        @endforeach
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
                                                <div class="col-sm-8 dashboard-dropdown">
                                                    <select name="honors_institute" id="honors_institute"
                                                        class="search rt-selectactive w-100-p">
                                                        <option value="">Please Select</option>
                                                        @foreach ($universities as $university)
                                                            <option @if (old('honors_institute') == $university->name) selected @endif
                                                                value="{{ $university->name }}">
                                                                {{ $university->name }}</option>
                                                        @endforeach

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
                                                        <option value="">Please Select</option>
                                                        <option value="1st Division"
                                                            {{ old('honors_result_type') == '1st Division' ? 'selected' : '' }}>
                                                            1st Division</option>
                                                        <option value="2nd Division"
                                                            {{ old('honors_result_type') == '2nd Division' ? 'selected' : '' }}>
                                                            2nd Division</option>
                                                        <option value="3rd Division"
                                                            {{ old('honors_result_type') == '3rd Division' ? 'selected' : '' }}>
                                                            3rd Division</option>
                                                        <option value="Passed"
                                                            {{ old('honors_result_type') == 'Passed' ? 'selected' : '' }}>
                                                            Passed</option>
                                                        <option value="CGPA4"
                                                            {{ old('honors_result_type') == 'CGPA4' ? 'selected' : '' }}>
                                                            CGPA(out of 4)</option>

                                                    </select>
                                                    @error('honors_result_type')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2 d-none" id="honors_cgpa">
                                                <label for="honors_result_cgpa"
                                                    class="col-sm-4 col-form-label">{{ __('honors_result_cgpa') }}</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        class="form-control @error('honors_result_cgpa') is-invalid @enderror"
                                                        name="honors_result_cgpa" type="text"
                                                        value="{{ old('honors_result_cgpa') }}"
                                                        id="honors_result_cgpa"
                                                        placeholder="{{ __('honors_result_cgpa') }}">
                                                    @error('honors_result_cgpa')
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
                                                        <option value="">Please Select</option>
                                                        @foreach ($years as $key => $year)
                                                            <option value="{{ $year }}"
                                                                {{ old('honors_passing_year') == $year ? 'selected' : '' }}>
                                                                {{ $year }}</option>
                                                        @endforeach
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
                                                        <option value="">Please Select</option>
                                                        @for ($year = 1; $year <= 5; $year++)
                                                            <option @if (old('honors_course_duration') == $year) selected @endif
                                                                value="{{ $year }}">
                                                                {{ $year }}</option>
                                                        @endfor

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
                                        <input type="checkbox" name="masters" {{ old('masters') ? 'checked' : '' }}
                                            class="form-check-input d-inline-block mt-1" id="masters">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="masters">If
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
                                                        <option value="">Please Select</option>
                                                        <option @if (old('masters_exam_name') == 'M.A') selected @endif
                                                            value="M.A">M.A</option>
                                                        <option @if (old('masters_exam_name') == 'M.S.S') selected @endif
                                                            value="M.S.S">M.S.S</option>
                                                        <option @if (old('masters_exam_name') == 'M.Sc/M.S') selected @endif
                                                            value="M.Sc/M.S">M.Sc/M.S</option>
                                                        <option @if (old('masters_exam_name') == 'M.Com') selected @endif
                                                            value="M.Com">M.Com</option>
                                                        <option @if (old('masters_exam_name') == 'M.B.A') selected @endif
                                                            value="M.B.A">M.B.A</option>
                                                        <option @if (old('masters_exam_name') == 'L.L.M') selected @endif
                                                            value="L.L.M">L.L.M</option>
                                                        <option @if (old('masters_exam_name') == 'Others') selected @endif
                                                            value="Others">Others</option>
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
                                                <div class="col-sm-8 dashboard-dropdown">
                                                    <select name="masters_subject" id="masters_subject" class="search rt-selectactive w-100-p">
                                                        <option value="">Please Select</option>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject->code }}">{{ $subject->name }}</option>
                                                        @endforeach
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
                                                <div class="col-sm-8 dashboard-dropdown">
                                                    <select name="masters_institute" id="masters_institute"
                                                        class="search rt-selectactive w-100-p">
                                                        <option value="">Please Select</option>
                                                        @foreach ($universities as $university)
                                                            <option @if (old('masters_institute') == $university->name) selected @endif
                                                                value="{{ $university->name }}">
                                                                {{ $university->name }}</option>
                                                        @endforeach
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
                                                        <option value="">Please Select</option>
                                                        <option value="1st Division"
                                                            {{ old('masters_result_type') == '1st Division' ? 'selected' : '' }}>
                                                            1st Division</option>
                                                        <option value="2nd Division"
                                                            {{ old('masters_result_type') == '2nd Division' ? 'selected' : '' }}>
                                                            2nd Division</option>
                                                        <option value="3rd Division"
                                                            {{ old('masters_result_type') == '3rd Division' ? 'selected' : '' }}>
                                                            3rd Division</option>
                                                        <option value="Passed"
                                                            {{ old('masters_result_type') == 'Passed' ? 'selected' : '' }}>
                                                            Passed</option>
                                                        <option value="CGPA4"
                                                            {{ old('masters_result_type') == 'CGPA4' ? 'selected' : '' }}>
                                                            GPA(out of 4)</option>
                                                    </select>
                                                    @error('masters_result_type')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm row py-2 d-none" id="masters_cgpa">
                                                <label for="masters_result_cgpa"
                                                    class="col-sm-4 col-form-label">{{ __('masters_result_cgpa') }}</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        class="form-control @error('masters_result_cgpa') is-invalid @enderror"
                                                        name="masters_result_cgpa" type="text"
                                                        value="{{ old('masters_result_cgpa') }}"
                                                        id="masters_result_cgpa"
                                                        placeholder="{{ __('masters_result_cgpa') }}">
                                                    @error('masters_result_cgpa')
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
                                                        <option value="">Please Select</option>
                                                        @foreach ($years as $key => $year)
                                                            <option value="{{ $year }}"
                                                                {{ old('masters_passing_year') == $year ? 'selected' : '' }}>
                                                                {{ $year }}</option>
                                                        @endforeach
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
                                                        <option value="">Please Select</option>
                                                        @for ($year = 1; $year <= 5; $year++)
                                                            <option @if (old('masters_course_duration') == $year) selected @endif
                                                                value="{{ $year }}">
                                                                {{ $year }}</option>
                                                        @endfor
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
                                        Pictures and Signatures
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-md-8">
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="picture"
                                                    class="col-sm-4 col-form-label">{{ __('picture') }}<span
                                                    class="required">*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control @error('picture') is-invalid @enderror"
                                                        name="picture" type="file"
                                                        value="{{ $candidate->picture }}" id="picture"
                                                        placeholder="{{ __('picture') }}" required>
                                                    @error('picture')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                    <img id="preview" src="#" alt="your image" class="mt-3" style="display:none;"/>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm row py-2">
                                                <label for="signature"
                                                    class="col-sm-4 col-form-label">{{ __('signature') }}<span
                                                    class="required">*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control @error('signature') is-invalid @enderror"
                                                        name="signature" type="file"
                                                        value="{{ $candidate->signature }}" id="signature"
                                                        placeholder="{{ __('signature') }}" required>
                                                    @error('signature')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn d-block btn-primary mt-4 mb-3">
                                {{ __('save_changes') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/dropify/css/dropify.min.css') }}">
    <style>
        .ck-editor__editable_inline {
            min-height: 160px;
        }

        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #fff;
            border: 1px solid #fff;
            background: #007bff;
            border-radius: 30px;
        }

        .height-124px {
            height: 124px !important
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }

        .align-items-center {
            -ms-flex-align: center !important;
            align-items: center !important;
        }

        .d-flex {
            display: -ms-flexbox !important;
            display: flex !important;
        }

                /* loader */
                .overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url("/images/loader.gif") center no-repeat;
    }
    /* body{
        text-align: center;
    } */
    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .overlay{
        display: block;
    }
    </style>
@endsection

@section('frontend_scripts')
    <script src="{{ asset('frontend/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend') }}/assets/js/ckeditor.min.js"></script>

    <script>

        // upload picture
        $("#picture").on("change", function () {
            // console.log($(this).val());
            var picture = $('#picture').prop('files')[0];
            // console.log(picture);
            var form_data = new FormData();
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('picture', picture);
            form_data.append('picture_for', 'picture');

            // console.log(form_data);
            $.ajax({
                type: "POST",
                contentType: false, //MUST
                processData: false, //MUST
                dataType: 'json',
                url: "{{ route('website.candidate.uploadPicture') }}",
                data: form_data,
                enctype: 'multipart/form-data',
                success: function (response) {
                    console.log(response);
                    if(response){
                        console.log("image uploaded successfully");
                    }
                }
            });
        })

        // upload signature
        $("#signature").on("change", function () {
            // console.log($(this).val());
            var picture = $('#signature').prop('files')[0];
            // console.log(picture);
            var form_data = new FormData();
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('picture', picture);
            form_data.append('picture_for', 'signature');

            // console.log(form_data);
            $.ajax({
                type: "POST",
                contentType: false, //MUST
                processData: false, //MUST
                dataType: 'json',
                url: "{{ route('website.candidate.uploadPicture') }}",
                data: form_data,
                enctype: 'multipart/form-data',
                success: function (response) {
                    console.log(response);
                    if(response){
                        console.log("image uploaded successfully");
                    }
                }
            });
        })

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

        $('.personal-info input, .personal-info select').each(
            function(index) {
                if ($(this).val()) {
                    $(this).attr('readonly', true)
                }
            }
        );
        $('.personal-info select').each(
            function(index) {
                if ($(this).val()) {
                    $(this).attr('readonly', true)
                }
            }
        );

        $(document).on("change ", "#same_address", function() {
            let check = this.checked
            if (check) {
                $("#care_of_parmanent").val($("#care_of").val()).attr('readonly', 'readonly');
                $("#house_and_road_no_parmanent").val($("#house_and_road_no").val()).attr('readonly', 'readonly');
                $("#place_parmanent").val($("#place").val()).attr('readonly', 'readonly');
                $("#postcode_parmanent").val($("#postcode").val()).attr('readonly', 'readonly');
                $("#post_office_parmanent").val($("#post_office").val()).attr('readonly', 'readonly');
                $("#region_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#region_parmanent").val($("#region").val()).trigger("change");
            } else {
                /* display hide */
                if ($("#parmanent_district_div").hasClass("d-none")) {
                    $("#parmanent_district_div").removeClass('d-none');
                }
                if ($("#parmanent_thana_div").hasClass("d-none")) {
                    $("#parmanent_thana_div").removeClass('d-none');
                }
                if ($("#parmanent_union_div").hasClass("d-none")) {
                    $("#parmanent_union_div").removeClass('d-none');
                }
                if ($("#parmanent_ward_div").hasClass("d-none")) {
                    $("#parmanent_ward_div").removeClass('d-none');
                }
                /* display hide */

                $("#care_of_parmanent").removeAttr('readonly');
                $("#care_of_parmanent").val('');
                $("#region_parmanent").select2({
                    disabled: false
                });
                $("#region_parmanent").val('').trigger("change");
                $("#district_parmanent").select2({
                    disabled: false
                });
                $("#district_parmanent").val('').trigger("change");
                $("#thana_parmanent").select2({
                    disabled: false
                });
                $("#thana_parmanent").val('').trigger("change");
                $("#pourosova_union_porishod_parmanent").select2({
                    disabled: false
                });
                $("#pourosova_union_porishod_parmanent").val('').trigger("change");
                $("#ward_no_parmanent").select2({
                    disabled: false
                });
                $("#ward_no_parmanent").val('').trigger("change");
                $("#postcode_parmanent").removeAttr('readonly');
                $("#postcode_parmanent").val('');
                $("#post_office_parmanent").removeAttr('readonly');
                $("#post_office_parmanent").val('');
                $("#place_parmanent").removeAttr('readonly');
                $("#place_parmanent").val('');
                $("#house_and_road_no_parmanent").removeAttr('readonly');
                $("#house_and_road_no_parmanent").val('');
            }
        })

        // on change region get districts by division
        $(document).on("change", "#region", function() {
            var division = $(this).val();
            get_district(division);
        })

        function get_district(division) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.district.get.data') }}",
                data: {
                    division: division,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    if ($("#district_div").hasClass("d-none")) {
                        $("#district_div").removeClass('d-none');
                    }
                    $("#district").html(response.html);
                }
            });
        }

        // on change district get upazila by district
        $(document).on("change", "#district", function() {
            var district_id = $(this).val();
            get_thana(district_id);

        })

        function get_thana(district_id) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.thana.get.data') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    if ($("#thana_div").hasClass("d-none")) {
                        $("#thana_div").removeClass('d-none');
                    }
                    $("#thana").html(response.html);
                }
            });

        }

        // get union by thana/paurashava/upazila
        $(document).on("change", "#thana", function() {
            var thana_id = $(this).val();
            get_union(thana_id);
        })

        function get_union(thana_id) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.union.get.data') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    if ($("#union_div").hasClass("d-none")) {
                        $("#union_div").removeClass('d-none');
                    }
                    $("#pourosova_union_porishod").html(response.html);
                }
            });

        }

        // on chage union show wards
        $(document).on("change", "#pourosova_union_porishod", function() {
            var pourosova_id = $(this).val();
            get_ward(pourosova_id);
        })

        function get_ward(pourosova_id) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.paurasava.get.data') }}",
                data: {
                    pourosova_id: pourosova_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    console.log(response.html.length);
                    if (response.html.length > 50) {
                        if ($("#ward_div").hasClass("d-none")) {
                            $("#ward_div").removeClass('d-none');
                        }
                    }
                    $("#ward_no").html(response.html);
                }
            });
        }

        /* ward div display none*/
        // Parmanent Address

        /* on change region parmanet get districts permanent */
        $(document).on("change", "#region_parmanent", function(event) {
            if ($("#parmanent_district_div").hasClass("d-none")) {
                $("#parmanent_district_div").removeClass('d-none');
            }
            var division = $(this).val();
            get_district_parmanent(division);
        })

        function get_district_parmanent(division) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.district.get.data') }}",
                data: {
                    division: division,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    $("#district_parmanent").html(response.html);
                    let same_address = $("#same_address").is(":checked");
                    if (same_address) {
                        $("#district_parmanent").val($("#district").val()).trigger("change");
                        $("#district_parmanent").select2({
                        disabled: 'readonly'
                    });

                    }
                }
            });
        }

        // on change district parmanent get thana data
        $(document).on("change", "#district_parmanent", function(event) {
            if ($("#parmanent_thana_div").hasClass("d-none")) {
                $("#parmanent_thana_div").removeClass('d-none');
            }
            var district_id = $(this).val();
            get_thana_parmanent(district_id);
        })

        function get_thana_parmanent(district_id) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.thana.get.data') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    $("#thana_parmanent").html(response.html);
                    let same_address = $("#same_address").is(":checked");
                    if (same_address) {
                        $("#thana_parmanent").val($("#thana").val()).trigger("change");
                        $("#thana_parmanent").select2({
                            disabled: 'readonly'
                        });
                    }
                }
            });

        }

        // get union by thana/paurashava/upazila
        $(document).on("change", "#thana_parmanent", function(event) {
            if ($("#parmanent_union_div").hasClass("d-none")) {
                $("#parmanent_union_div").removeClass('d-none');
            }
            var thana_id = $(this).val();
            get_union_parmenent(thana_id);
        })

        function get_union_parmenent(thana_id) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.union.get.data') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    $("#pourosova_union_porishod_parmanent").html(response.html);
                    let same_address = $("#same_address").is(":checked");
                    if (same_address) {
                        $("#pourosova_union_porishod_parmanent").val($("#pourosova_union_porishod").val()).trigger("change");
                        $("#pourosova_union_porishod_parmanent").select2({
                            disabled: 'readonly'
                        })
                    }
                }
            });

        }

        // on chage union show wards
        $(document).on("change", "#pourosova_union_porishod_parmanent", function() {
            var pourosova_id = $(this).val();
            get_ward_parmanent(pourosova_id);
        })

        function get_ward_parmanent(pourosova_id) {
            $("#ajax_loader").show();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.paurasava.get.data') }}",
                data: {
                    pourosova_id: pourosova_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#ajax_loader").hide();
                    if (response.html.length > 50) {
                        if ($("#parmanent_ward_div").hasClass("d-none")) {
                            $("#parmanent_ward_div").removeClass('d-none');
                        }
                    }
                    
                    $("#ward_no_parmanent").html(response.html);
                    let same_address = $("#same_address").is(":checked");
                    if (same_address) {
                        $("#ward_no_parmanent").val($("#ward_no").val()).trigger("change");
                        $("#ward_no_parmanent").select2({
                        disabled: 'readonly'
                    });
                    }
                }
            });
        }

        // A $( document ).ready() block.
        // $( document ).ready(function() {
        //     var subjects =  []; 
        //     let subject={};
        //     $("#honors_subject > option").each(function() {
        //         if(this.value){
        //             subject= {
        //             code: this.value,
        //             text: this.text
        //         };
        //         subjects.push(subject);
        //         }
                
        //     });
        //     $.ajax({
        //         type: "post",
        //         url: "{{ route('website.subject') }}",
        //         data: {
        //             subjects: subjects,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         dataType: "json",
        //         success: function (response) {
        //             console.log(response);
        //         }
        //     });
        // });




        // in change masters result type open cgpa input box
        $(document).on("change", "#masters_result_type", function() {
            var masters_result_type = $(this).val();
            if (masters_result_type == "CGPA4") {
                $("#masters_cgpa").removeClass("d-none");
            } else {
                $("#masters_cgpa").addClass("d-none");
            }
        })

        // in change honors result type open cgpa input box
        $(document).on("change", "#honors_result_type", function() {
            var honors_result_type = $(this).val();
            if (honors_result_type == "CGPA4") {
                $("#honors_cgpa").removeClass("d-none");
            } else {
                $("#honors_cgpa").addClass("d-none");
            }
        })

        // in change HSC result type open cgpa input box
        $(document).on("change", "#hsc_result_type", function() {
            var hsc_result_type = $(this).val();
            if (hsc_result_type == "GPA5") {
                $("#hsc_cgpa").removeClass("d-none");
            } else {
                $("#hsc_cgpa").addClass("d-none");
            }
        })

        // in change SSC result type open cgpa input box
        $(document).on("change", "#ssc_result_type", function() {
            var ssc_result_type = $(this).val();
            if (ssc_result_type == "GPA5") {
                $("#ssc_cgpa").removeClass("d-none");
            } else {
                $("#ssc_cgpa").addClass("d-none");
            }
        })
    </script>
    <script>
        $(document).on({
            ajaxStart: function() {
                $("body").addClass("loading");
            },
            ajaxStop: function() {
                $("body").removeClass("loading");
            }
        });
    </script>
@endsection
