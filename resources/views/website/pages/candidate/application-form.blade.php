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
                                    <div class="card-body pt-1">
                                        <div class="form-group form-group-sm row py-0">
                                            <label for="name" class="col-sm-3 col-form-label">{{ __('name') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                                    type="text" value="{{ old('name') ? old('name') : $user->name }}" id="name"
                                                    placeholder="{{ __('name') }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="name_bn" class="col-sm-3 col-form-label bangla">{{ __('name_bn') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('name_bn') is-invalid @enderror" name="name_bn"
                                                    type="text" value="{{ old('name_bn') ? old('name_bn') : $candidate->name_bn }}"
                                                    id="name_bn" placeholder="{{ __('name_bn') }}" required>
                                                @error('name_bn')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="father_name" class="col-sm-3 col-form-label">{{ __('father_name') }}<span
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
                                            <label for="father_name_bn" class="col-sm-3 col-form-label">{{ __('father_name_bn') }}<span
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
                                            <label for="mother_name" class="col-sm-3 col-form-label">{{ __('mother_name') }}<span
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
                                            <label for="mother_name_bn" class="col-sm-3 col-form-label">{{ __('mother_name_bn') }}<span
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
                                            <label for="birth_date" class="col-sm-3 col-form-label">{{ __('birth_date') }}<span
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
                                                    <div class="d-flex align-items-center form-control-icon date datepicker">
                                                        <input type="text" name="birth_date"
                                                            value="{{ date('d-m-Y', strtotime($candidate->birth_date)) }}"
                                                            id="date" placeholder="dd/mm/yyyy" class="form-control border-cutom "
                                                            autocomplete="off">
                                                        <span class="input-group-addon input-group-text-custom">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M17.875 3.4375H4.125C3.7453 3.4375 3.4375 3.7453 3.4375 4.125V17.875C3.4375 18.2547 3.7453 18.5625 4.125 18.5625H17.875C18.2547 18.5625 18.5625 18.2547 18.5625 17.875V4.125C18.5625 3.7453 18.2547 3.4375 17.875 3.4375Z"
                                                                    stroke="#18191C" stroke-width="1.3" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path d="M15.125 2.0625V4.8125" stroke="#18191C" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M6.875 2.0625V4.8125" stroke="#18191C" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M3.4375 7.5625H18.5625" stroke="#18191C" stroke-width="1.5"
                                                                    stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="gender" class="col-sm-3 col-form-label">{{ __('gender') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <select required class="rt-selectactive w-100-p @error('gender') is-invalid @enderror"
                                                    name="gender">
                                                    <option @if ($candidate->gender == 'male' || old('gender') == 'male') selected @endif value="male">
                                                        {{ __('male') }}
                                                    </option>
                                                    <option @if ($candidate->gender == 'female' || old('gender') == 'female') selected @endif value="female">
                                                        {{ __('female') }}
                                                    </option>
                                                    <option @if ($candidate->gender == 'other' || old('gender') == 'other') selected @endif value="other">
                                                        {{ __('other') }}
                                                    </option>
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="religion" class="col-sm-3 col-form-label">{{ __('religion') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <select required
                                                    class="rt-selectactive w-100-p @error('religion') is-invalid @enderror"
                                                    name="religion">
                                                    <option @if ($candidate->religion == 'Islam' || old('religion') == 'Islam') selected @endif value="Islam">
                                                        {{ __('Islam') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'Hinduism' || old('religion') == 'Hinduism') selected @endif value="Hinduism">
                                                        {{ __('Hinduism') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'Buddhism' || old('religion') == 'Buddhism') selected @endif value="Buddhism">
                                                        {{ __('Buddhism') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'Christianity' || old('religion') == 'Christianity') selected @endif value="Christianity">
                                                        {{ __('Christianity') }}
                                                    </option>
                                                    <option @if ($candidate->religion == 'others' || old('religion') == 'others') selected @endif value="others">
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
                                                    value="{{ old('birth_certificate_no') ? old('birth_certificate_no') : $candidate->birth_certificate_no }}"
                                                    id="birth_certificate_no" placeholder="{{ __('birth_certificate_no') }}">
                                                @error('birth_certificate_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="nid_no" class="col-sm-3 col-form-label">{{ __('nid_no') }}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('nid_no') is-invalid @enderror" name="nid_no"
                                                    type="text" value="{{ old('nid_no') ? old('nid_no') : $candidate->nid_no }}"
                                                    id="nid_no" placeholder="{{ __('nid_no') }}">
                                                @error('nid_no')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>
            
            
                                        <div class="form-group form-group-sm row py-2">
                                            <label for="passport_no" class="col-sm-3 col-form-label">{{ __('passport_no') }}</label>
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
                                                    <option @if ($candidate->marital_status == 'single' || old('marital_status') == 'single') selected @endif value="single">
                                                        {{ __('single') }}</option>
                                                    <option @if ($candidate->marital_status == 'married' || old('marital_status') == 'married') selected @endif value="married">
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
                                                    <option value="">Please Select</option>
                                                    <option @if ($candidate->quota == 1 || old('quota') == 'Child of Freedom Fighter') selected @endif
                                                        value="Child of Freedom Fighter">
                                                        {{ __('Child of Freedom Fighter') }}</option>
                                                    <option @if ($candidate->quota == 'Grand Child of Freedom Fighter' || old('quota') == 'Grand Child of Freedom Fighter') selected @endif
                                                        value="Grand Child of Freedom Fighter">
                                                        {{ __('Grand Child of Freedom Fighter') }}</option>
                                                    <option @if ($candidate->quota == 'Physically Handicapped' || old('quota') == 'Physically Handicapped') selected @endif
                                                        value="Physically Handicapped">
                                                        {{ __('Physically Handicapped') }}</option>
                                                    <option @if ($candidate->quota == 'Orphan' || old('quota') == 'Orphan') selected @endif value="Orphan">
                                                        {{ __('Orphan') }}</option>
                                                    <option @if ($candidate->quota == 'Ethic Minority' || old('quota') == 'Ethic Minority') selected @endif value="Ethic Minority">
                                                        {{ __('Ethic Minority') }}</option>
                                                    <option @if ($candidate->quota == 'Ansar-VDP' || old('quota') == 'Ansar-VDP') selected @endif value="Ansar-VDP">
                                                        {{ __('Ansar-VDP') }}</option>
                                                    <option @if ($candidate->quota == 'Non Quota' || old('quota') == 'Non Quota') selected @endif value="Non Quota">
                                                        {{ __('Non Quota') }}</option>
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
                                                class="col-sm-4 col-form-label">{{ __('care_of') }}</label>
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
                                                            {{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('region')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="district"
                                                class="col-sm-4 col-form-label">{{ __('district') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="district" id="district"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ $candidate->district == $district->id ? 'selected' : '' }}>
                                                            {{ $district->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('district')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="thana"
                                                class="col-sm-4 col-form-label">{{ __('thana') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="thana" id="thana"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($upazilas as $thana)
                                                        <option value="{{ $thana->id }}"
                                                            {{ $candidate->thana == $thana->id ? 'selected' : '' }}>
                                                            {{ $thana->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('thana')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="pourosova_union_porishod"
                                                class="col-sm-4 col-form-label">{{ __('pourosova_union_porishod') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="pourosova_union_porishod"
                                                    id="pourosova_union_porishod" class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($unions as $union)
                                                        <option value="{{ $union->id }}"
                                                            {{ $candidate->pourosova_union_porishod == $union->id ? 'selected' : '' }}>
                                                            {{ $union->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('pourosova_union_porishod')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ward_no"
                                                class="col-sm-4 col-form-label">{{ __('ward_no') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="ward_no" id="ward_no"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($wards as $key => $ward)
                                                        <option value="{{ $ward }}"
                                                            {{ $candidate->ward_no == $ward ? 'selected' : '' }}>
                                                            Ward-{{ $ward }}</option>
                                                    @endforeach
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
                                                    name="postcode" type="text"
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

                                        {{-- {{ __('masters') }}
                                        <input type="checkbox" name="masters"
                                            class="form-check-input d-inline-block mt-1" id="masters">
                                        <label class="form-check-label d-inline-block mx-0 px-0" for="masters">If
                                            Applicable</label> --}}
                                    </div>
                                    <div class="card-body pt-1">
                                        <div class="form-group form-group-sm row py-0">
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
                                                class="col-sm-4 col-form-label">{{ __('region') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="region_parmanent" id="region_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}"
                                                            {{ $division->id == $candidate->region_parmanent ? 'selected' : '' }}>
                                                            {{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('region_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="district_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('district') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="district_parmanent" id="district_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ $district->id == $candidate->district_parmanent ? 'selected' : '' }}>
                                                            {{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('district_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="thana_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('thana') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="thana_parmanent" id="thana_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($upazilas as $upazila)
                                                        <option value="{{ $upazila->id }}"
                                                            {{ $upazila->id == $candidate->thana_parmanent ? 'selected' : '' }}>
                                                            {{ $upazila->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('thana_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="pourosova_union_porishod_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('pourosova_union_porishod_parmanent') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="pourosova_union_porishod_parmanent"
                                                    id="pourosova_union_porishod_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($unions as $union)
                                                        <option value="{{ $union->id }}"
                                                            {{ $candidate->pourosova_union_porishod_parmanent == $union->id ? 'selected' : '' }}>
                                                            {{ $union->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('pourosova_union_porishod_parmanent')
                                                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm row py-2">
                                            <label for="ward_no_parmanent"
                                                class="col-sm-4 col-form-label">{{ __('ward_no_parmanent') }}<span
                                                    class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <select required name="ward_no_parmanent" id="ward_no_parmanent"
                                                    class="rt-selectactive w-100-p">
                                                    <option value="">Please Select</option>
                                                    @foreach ($wards as $key => $ward)
                                                        <option value="{{ $ward }}"
                                                            {{ $candidate->ward_no_parmanent == $ward ? 'selected' : '' }}>
                                                            Ward-{{ $ward }}</option>
                                                    @endforeach
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

                            <hr>
                            {{-- Education Information --}}
                            {{-- @php
                                $jsc= $candidate->educations->where('level', "masters")->first();
                            @endphp --}}
                            {{-- PSC JSC --}}
                            <div class="row">
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

                                <div class="card col-lg-12 pt-2">
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
                                                    <option value="GPA4"
                                                        {{ old('ssc_result_type') == 'GPA4' ? 'selected' : '' }}>GPA(out
                                                        of 4)</option>
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
                                <div class="card col-lg-12 p-0">
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
                                                    <option value="GPA4"
                                                        {{ old('hsc_result_type') == 'GPA4' ? 'selected' : '' }}>GPA(out
                                                        of 4)</option>
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
                                                        class="rt-selectactive w-100-p @error('honors_exam_name') is-invalid @enderror"
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
                                                <div class="col-sm-8">
                                                    <select name="honors_subject" id="honors_subject"
                                                        class="rt-selectactive w-100-p">
                                                        <option value="">Please Select</option>
                                                        <option value="101">Accounting</option>
                                                        <option value="102">Anthropology</option>
                                                        <option value="103">Applied Chemistry</option>
                                                        <option value="104">Applied Physics</option>
                                                        <option value="105">Applied Mathematics</option>
                                                        <option value="106">Arabic</option>
                                                        <option value="107">Archaeology</option>
                                                        <option value="108">Bangla</option>
                                                        <option value="109">Banking</option>
                                                        <option value="110">Biochemistry</option>
                                                        <option value="111">Botany</option>
                                                        <option value="112">Business Administration</option>
                                                        <option value="113">Chemistry</option>
                                                        <option value="114">Computer Science</option>
                                                        <option value="115">Clinical Psychology</option>
                                                        <option value="116">Drama &amp; Music</option>
                                                        <option value="117">Development Studies</option>
                                                        <option value="118">Economics</option>
                                                        <option value="119">Education</option>
                                                        <option value="120">English</option>
                                                        <option value="121">Finance</option>
                                                        <option value="122">Fine Arts</option>
                                                        <option value="123">Folklore</option>
                                                        <option value="124">Geography</option>
                                                        <option value="125">Geology/Environment</option>
                                                        <option value="126">History</option>
                                                        <option value="127">Home Economics</option>
                                                        <option value="128">Hadith</option>
                                                        <option value="129">International Relations</option>
                                                        <option value="130">Islamic History and Culture</option>
                                                        <option value="131">Islamic Studies</option>
                                                        <option value="132">Information Com. Tech. (ICT)</option>
                                                        <option value="133">Mass Comm. &amp; Journalism</option>
                                                        <option value="134">Law/Jurisprudence</option>
                                                        <option value="135">Information Science and Library Management
                                                        </option>
                                                        <option value="136">Language/Linguistic</option>
                                                        <option value="137">Management</option>
                                                        <option value="138">Marketing</option>
                                                        <option value="139">Mathematics</option>
                                                        <option value="140">Microbiology</option>
                                                        <option value="141">Marine Science</option>
                                                        <option value="142">Medical Technology</option>
                                                        <option value="143">Pali</option>
                                                        <option value="144">Persian</option>
                                                        <option value="145">Pharmacy</option>
                                                        <option value="146">Philosophy</option>
                                                        <option value="147">Physics</option>
                                                        <option value="148">Political Science</option>
                                                        <option value="149">Psychology</option>
                                                        <option value="150">Public Administration</option>
                                                        <option value="151">Public Finance</option>
                                                        <option value="152">Population Science</option>
                                                        <option value="153">Peace &amp; Conflict</option>
                                                        <option value="154">Pharmaceutical Chemistry</option>
                                                        <option value="155">Sanskrit</option>
                                                        <option value="156">Social Welfare/Social Work</option>
                                                        <option value="157">Sociology</option>
                                                        <option value="158">Soil Water and Environment Science</option>
                                                        <option value="159">Statistics</option>
                                                        <option value="160">Tafsir</option>
                                                        <option value="161">Urdu</option>
                                                        <option value="162">Urban Development</option>
                                                        <option value="163">World Religion</option>
                                                        <option value="164">Women Studies</option>
                                                        <option value="165">Water &amp; Environment Science</option>
                                                        <option value="166">Zoology</option>
                                                        <option value="167">Genetic and Breeding</option>
                                                        <option value="168">International Law</option>
                                                        <option value="169">Akaid</option>
                                                        <option value="170">Graphics</option>
                                                        <option value="171">Fikha</option>
                                                        <option value="172">Modern Arabic</option>
                                                        <option value="173">History of Music</option>
                                                        <option value="174">Drawing and Printing</option>
                                                        <option value="175">Industrial Arts</option>
                                                        <option value="176">Ethics</option>
                                                        <option value="177">Forestry</option>
                                                        <option value="178">Ayurvedic</option>
                                                        <option value="179">Unani</option>
                                                        <option value="180">Television, Film and Photography</option>
                                                        <option value="181">Women and Gender Studies</option>
                                                        <option value="182">Criminology</option>
                                                        <option value="183">Communication Disorders</option>
                                                        <option value="184">Computer Engineering</option>
                                                        <option value="185">Computer Science &amp; Engineering</option>
                                                        <option value="186">Computer Science &amp; Information
                                                            Technology</option>
                                                        <option value="187">Information Technology</option>
                                                        <option value="188">Geology/Geology and Mining</option>
                                                        <option value="189">Environmental science</option>
                                                        <option value="190">Genetic Engineering and Biotechnology
                                                        </option>
                                                        <option value="191">Materials Science &amp; Engineering</option>
                                                        <option value="192">Finance and Banking</option>
                                                        <option value="201">Agriculture</option>
                                                        <option value="202">Agriculture Chemistry</option>
                                                        <option value="203">Agriculture Co-operatives</option>
                                                        <option value="204">Agriculture Economics</option>
                                                        <option value="205">Agriculture Engineering</option>
                                                        <option value="206">Agriculture Finance</option>
                                                        <option value="207">Agriculture Marketing</option>
                                                        <option value="208">Agriculture Science</option>
                                                        <option value="209">Agriculture Soil Science</option>
                                                        <option value="210">Animal Husbandry</option>
                                                        <option value="211">Agronomy &amp; Aquaculture</option>
                                                        <option value="212">Agronomy &amp; Aquaculture Extension
                                                        </option>
                                                        <option value="213">Anatomy &amp; Histology</option>
                                                        <option value="214">Agronnomy</option>
                                                        <option value="215">Anatomology</option>
                                                        <option value="216">Animal Breeding &amp; Genetic</option>
                                                        <option value="217">Animal Science</option>
                                                        <option value="218">Animal Nutrition</option>
                                                        <option value="220">Agriculture Water Management</option>
                                                        <option value="221">Agriculture Extension</option>
                                                        <option value="223">Agro Forestry</option>
                                                        <option value="225">Agriculture Statistics</option>
                                                        <option value="226">Agr.Co-operative &amp; Marketing</option>
                                                        <option value="227">Bio-Technology</option>
                                                        <option value="228">Corp Botany</option>
                                                        <option value="229">Dairy Science</option>
                                                        <option value="230">Doc.of Veterinary Science</option>
                                                        <option value="231">Fisheries</option>
                                                        <option value="232">Fisheries &amp; Aquaculture</option>
                                                        <option value="233">Fisheries Biology</option>
                                                        <option value="234">Fisheries Management</option>
                                                        <option value="235">Fisheries Technology</option>
                                                        <option value="236">Forestry</option>
                                                        <option value="237">Farm Power &amp; Machinery</option>
                                                        <option value="238">Food Tech. &amp; Rural Industry</option>
                                                        <option value="239">Farm Structure</option>
                                                        <option value="241">Horticulture</option>
                                                        <option value="242">Livestock</option>
                                                        <option value="243">Microbiology &amp; Hygenic</option>
                                                        <option value="244">Production Economics</option>
                                                        <option value="245">Plant Pathology</option>
                                                        <option value="246">Paratrology</option>
                                                        <option value="247">Poultry Science</option>
                                                        <option value="248">Rural Sociology</option>
                                                        <option value="249">Surgery &amp; Obstate</option>
                                                        <option value="250">Business Studies</option>
                                                        <option value="260">Accounting</option>
                                                        <option value="261">Banking</option>
                                                        <option value="262">Business Administration</option>
                                                        <option value="263">Finance</option>
                                                        <option value="264">Management</option>
                                                        <option value="265">Marketing</option>
                                                        <option value="266">Management Information Systems (MIS)
                                                        </option>
                                                        <option value="267">Banking and Insurance</option>
                                                        <option value="268">Accounting &amp; Information Systems (AIS)
                                                        </option>
                                                        <option value="269">International Business</option>
                                                        <option value="270">Tourism and Hospitality Management</option>
                                                        <option value="271">Human Resource Management</option>
                                                        <option value="272">Organization Strategy and Leadership
                                                        </option>
                                                        <option value="273">Finance and Banking</option>
                                                        <option value="300">Electronics &amp; Telecommunication
                                                            Engineering</option>
                                                        <option value="301">Architecture</option>
                                                        <option value="302">Chemical</option>
                                                        <option value="303">Civil</option>
                                                        <option value="304">Computer Science</option>
                                                        <option value="305">Electrical</option>
                                                        <option value="306">Electrical &amp; Electronics</option>
                                                        <option value="307">Electronic</option>
                                                        <option value="308">Genetic Engineering</option>
                                                        <option value="309">Industrial</option>
                                                        <option value="310">Leather Technology</option>
                                                        <option value="311">Marine</option>
                                                        <option value="312">Mechanical</option>
                                                        <option value="313">Metallurgy</option>
                                                        <option value="314">Mineral</option>
                                                        <option value="315">Mining</option>
                                                        <option value="316">Naval Architecture</option>
                                                        <option value="317">Physical Planning</option>
                                                        <option value="318">Regional Planning</option>
                                                        <option value="319">Structural</option>
                                                        <option value="320">Textile Technology</option>
                                                        <option value="321">Town Planning</option>
                                                        <option value="322">Urban &amp; Regional Planning</option>
                                                        <option value="323">Tele-Comunication Engineering</option>
                                                        <option value="324">Computer Science &amp; Engineering</option>
                                                        <option value="325">Microwave Engineering</option>
                                                        <option value="326">A &amp; B Section of A.M.I.E</option>
                                                        <option value="327">Environmental Engineering</option>
                                                        <option value="328">Aeronautical Engineering</option>
                                                        <option value="329">Software Engineering</option>
                                                        <option value="391">Medicine &amp; Surgery</option>
                                                        <option value="392">Dental Surgery</option>
                                                        <option value="393">Computer Engineering</option>
                                                        <option value="394">Computer Science &amp; Engineering</option>
                                                        <option value="395">Computer Science &amp; Information
                                                            Technology</option>
                                                        <option value="396">Information and Communication Technology
                                                        </option>
                                                        <option value="397">Electronics &amp; Communication Engineering
                                                        </option>
                                                        <option value="398">Water Resource Engineering</option>
                                                        <option value="399">Materials Science &amp; Engineering
                                                        </option>
                                                        <option value="991">B.A</option>
                                                        <option value="992">B.S.S</option>
                                                        <option value="993">B.SC</option>
                                                        <option value="994">B.com</option>
                                                        <option value="995">L.L.B</option>
                                                        <option value="996">B.B.S</option>
                                                        <option value="999">Others</option>
                                                        <option value="1011">A &amp; B Section of A.M.I.E</option>
                                                        <option value="1022">Accounting</option>
                                                        <option value="1033">Accounting and Information System</option>
                                                        <option value="1044">Aeronautical Engineering</option>
                                                        <option value="1055">Agr.Co-Operative &amp; Marketing</option>
                                                        <option value="1077">Agriculture</option>
                                                        <option value="1088">Agriculture Chemistry</option>
                                                        <option value="1099">Agriculture Co-operatives</option>
                                                        <option value="1100">Agriculture Economics</option>
                                                        <option value="1111">Agriculture Engineering</option>
                                                        <option value="1122">Agriculture Extension</option>
                                                        <option value="1125">Horticulture</option>
                                                        <option value="1126">Human Resource Management</option>
                                                        <option value="1127">Industrial</option>
                                                        <option value="1133">Agriculture Finance</option>
                                                        <option value="1134">Agriculture Marketing</option>
                                                        <option value="1135">Agriculture Science</option>
                                                        <option value="1136">Agriculture Soil Science</option>
                                                        <option value="1137">Agriculture Statistics</option>
                                                        <option value="1138">Agriculture Water Management</option>
                                                        <option value="1139">Agro Forestry</option>
                                                        <option value="1140">Agronnomy</option>
                                                        <option value="1141">Agronomy &amp; Aquaculture</option>
                                                        <option value="1142">Agronomy &amp; Aquaculture Extension
                                                        </option>
                                                        <option value="1143">Akaid</option>
                                                        <option value="1144">Anatomology</option>
                                                        <option value="1145">Anatomy &amp; Histology</option>
                                                        <option value="1146">Animal Breeding &amp; Genetic</option>
                                                        <option value="1147">Animal Husbandry</option>
                                                        <option value="1148">Animal Nutrition</option>
                                                        <option value="1149">Animal Science</option>
                                                        <option value="1150">Anthropology</option>
                                                        <option value="1151">Applied Chemistry</option>
                                                        <option value="1152">Applied Mathematics</option>
                                                        <option value="1153">Applied Physics</option>
                                                        <option value="1154">Arabic</option>
                                                        <option value="1155">Archaeology</option>
                                                        <option value="1156">Architecture</option>
                                                        <option value="1157">B.A</option>
                                                        <option value="1158">B.S.S</option>
                                                        <option value="1159">B.Sc</option>
                                                        <option value="1160">B.com</option>
                                                        <option value="1161">Bangla</option>
                                                        <option value="1162">Banking</option>
                                                        <option value="1163">Banking</option>
                                                        <option value="1164">Banking and Insurance</option>
                                                        <option value="1165">Bio-Technology</option>
                                                        <option value="1166">Biochemistry</option>
                                                        <option value="1167">Botany</option>
                                                        <option value="1168">Business Administration</option>
                                                        <option value="1169">Business Studies</option>
                                                        <option value="1170">Chemical</option>
                                                        <option value="1171">Chemistry</option>
                                                        <option value="1172">Civil</option>
                                                        <option value="1173">Clinical Psychology</option>
                                                        <option value="1174">Communication Disorders</option>
                                                        <option value="1175">Computer Engineering</option>
                                                        <option value="1176">Computer Science</option>
                                                        <option value="1177">Computer Science &amp; Engineering</option>
                                                        <option value="1178">Computer Science &amp; Information
                                                            Technology</option>
                                                        <option value="1179">Corp Botany</option>
                                                        <option value="1180">Criminology</option>
                                                        <option value="1181">Criminology &amp; Police Science</option>
                                                        <option value="1182">Dairy Science</option>
                                                        <option value="1183">Dental Surgery</option>
                                                        <option value="1184">Development Studies</option>
                                                        <option value="1185">Doc.of Veterinary Science</option>
                                                        <option value="1186">Drama &amp; Music</option>
                                                        <option value="1187">Drawing and Printing</option>
                                                        <option value="1188">Economics</option>
                                                        <option value="1189">Education</option>
                                                        <option value="1190">Electrical</option>
                                                        <option value="1191">Electrical &amp; Electronics</option>
                                                        <option value="1192">Electronic</option>
                                                        <option value="1193">Electronics &amp; Communication Engineering
                                                        </option>
                                                        <option value="1194">English</option>
                                                        <option value="1195">Environmental Engineering</option>
                                                        <option value="1196">Environmental science</option>
                                                        <option value="1197">Ethics</option>
                                                        <option value="1198">Farm Power &amp; Machinery</option>
                                                        <option value="1199">Farm Structure</option>
                                                        <option value="1200">Fikha</option>
                                                        <option value="1201">Finance</option>
                                                        <option value="1202">Finance</option>
                                                        <option value="1203">Finance and Banking</option>
                                                        <option value="1204">Finance and Banking</option>
                                                        <option value="1205">Fine Arts</option>
                                                        <option value="1206">Fisheries</option>
                                                        <option value="1207">Fisheries &amp; Aquaculture</option>
                                                        <option value="1208">Fisheries Biology</option>
                                                        <option value="1209">Fisheries Management</option>
                                                        <option value="1210">Fisheries Technology</option>
                                                        <option value="1211">Folklore</option>
                                                        <option value="1212">Food Tech. &amp; Rural Industry</option>
                                                        <option value="1213">Forestry</option>
                                                        <option value="1214">Genetic Engineering</option>
                                                        <option value="1215">Genetic Engineering and Biotechnology
                                                        </option>
                                                        <option value="1216">Genetic and Breeding</option>
                                                        <option value="1217">Geography</option>
                                                        <option value="1218">Geography and Environmental Science
                                                        </option>
                                                        <option value="1219">Geology/Geology and Mining</option>
                                                        <option value="1220">Graphics</option>
                                                        <option value="1221">Hadith</option>
                                                        <option value="1222">History</option>
                                                        <option value="1223">History of Music</option>
                                                        <option value="1224">Home Economics</option>
                                                        <option value="1225">Horticulture</option>
                                                        <option value="1226">Human Resource Management</option>
                                                        <option value="1227">Industrial</option>
                                                        <option value="1228">Industrial Arts</option>
                                                        <option value="1229">Information Science and Library Management
                                                        </option>
                                                        <option value="1230">Information Technology</option>
                                                        <option value="1231">Information and Communication Technology
                                                        </option>
                                                        <option value="1232">International Business</option>
                                                        <option value="1233">International Law</option>
                                                        <option value="1234">International Relations</option>
                                                        <option value="1235">Islamic History and Culture</option>
                                                        <option value="1236">Islamic Studies</option>
                                                        <option value="1237">L.L.B</option>
                                                        <option value="1238">Language/Linguistic</option>
                                                        <option value="1239">Law/Jurisprudence</option>
                                                        <option value="1240">Leather Technology</option>
                                                        <option value="1241">Livestock</option>
                                                        <option value="1242">Management</option>
                                                        <option value="1243">Management Information Systems</option>
                                                        <option value="1250">Marine</option>
                                                        <option value="1251">Marine Science</option>
                                                        <option value="1252">Marketing</option>
                                                        <option value="1253">Mass Comm. &amp; Journalism</option>
                                                        <option value="1254">Materials Science &amp; Engineering
                                                        </option>
                                                        <option value="1255">Mathematics</option>
                                                        <option value="1256">Mechanical</option>
                                                        <option value="1257">Medical Technology</option>
                                                        <option value="1258">Medicine &amp; Surgery</option>
                                                        <option value="1259">Metallurgy</option>
                                                        <option value="1260">Microbiology</option>
                                                        <option value="1261">Microbiology &amp; Hygenic</option>
                                                        <option value="1262">Microwave Engineering</option>
                                                        <option value="1263">Mineral</option>
                                                        <option value="1264">Mining</option>
                                                        <option value="1265">Modern Arabic</option>
                                                        <option value="1266">Naval Architecture</option>
                                                        <option value="1267">Organization Strategy and Leadership
                                                        </option>
                                                        <option value="1268">Pali</option>
                                                        <option value="1269">Paratrology</option>
                                                        <option value="1270">Peace &amp; Conflict</option>
                                                        <option value="1271">Persian</option>
                                                        <option value="1272">Pharmaceutical Chemistry</option>
                                                        <option value="1273">Pharmacy</option>
                                                        <option value="1274">Philosophy</option>
                                                        <option value="1275">Physical Planning</option>
                                                        <option value="1276">Physics</option>
                                                        <option value="1277">Plant Pathology</option>
                                                        <option value="1278">Political Science</option>
                                                        <option value="1279">Population Science</option>
                                                        <option value="1280">Poultry Science</option>
                                                        <option value="1281">Production Economics</option>
                                                        <option value="1282">Psychology</option>
                                                        <option value="1283">Public Administration</option>
                                                        <option value="1284">Public Finance</option>
                                                        <option value="1285">Regional Planning</option>
                                                        <option value="1286">Rural Sociology</option>
                                                        <option value="1287">Sanskrit</option>
                                                        <option value="1288">Social Welfare/Social Work</option>
                                                        <option value="1289">Sociology</option>
                                                        <option value="1290">Software Engineering</option>
                                                        <option value="1291">Soil Water and Environment Science</option>
                                                        <option value="1292">Statistics</option>
                                                        <option value="1293">Structural</option>
                                                        <option value="1294">Surgery &amp; Obstate</option>
                                                        <option value="1295">Tafsir</option>
                                                        <option value="1296">Telecommunication Engineering</option>
                                                        <option value="1297">Television, Film and Photography</option>
                                                        <option value="1298">Textile Technology</option>
                                                        <option value="1299">Tourism and Hospitality Management</option>
                                                        <option value="1300">Town Planning</option>
                                                        <option value="1301">Urban &amp; Regional Planning</option>
                                                        <option value="1302">Urban Development</option>
                                                        <option value="1303">Urdu</option>
                                                        <option value="1304">Water &amp; Environment Science</option>
                                                        <option value="1305">Water Resource Engineering</option>
                                                        <option value="1306">Women Studies</option>
                                                        <option value="1307">Women and Gender Studies</option>
                                                        <option value="1308">World Religion</option>
                                                        <option value="1309">Zoology</option>
                                                        <option value="1310">Others</option>
                                                        <option value="1311">GENDER AND DEVELOPMENT STUDIES</option>
                                                        <option value="1312">Oceanography</option>
                                                        <option value="1313">Information and Communication Engineering
                                                        </option>
                                                        <option value="2100">Islamic Studies</option>
                                                        <option value="2101">Health Economics</option>

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
                                                        <option value="GPA4"
                                                            {{ old('honors_result_type') == 'GPA4' ? 'selected' : '' }}>
                                                            GPA(out of 4)</option>
                                                        <option value="GPA5"
                                                            {{ old('honors_result_type') == 'GPA5' ? 'selected' : '' }}>
                                                            GPA(out of 5)</option>
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
                                                <div class="col-sm-8">
                                                    <select name="masters_subject" id="masters_subject"
                                                        class="rt-selectactive w-100-p">
                                                        <option value="">Please Select</option>
                                                        <option value="101">Accounting</option>
                                                        <option value="102">Anthropology</option>
                                                        <option value="103">Applied Chemistry</option>
                                                        <option value="104">Applied Physics</option>
                                                        <option value="105">Applied Mathematics</option>
                                                        <option value="106">Arabic</option>
                                                        <option value="107">Archaeology</option>
                                                        <option value="108">Bangla</option>
                                                        <option value="109">Banking</option>
                                                        <option value="110">Biochemistry</option>
                                                        <option value="111">Botany</option>
                                                        <option value="112">Business Administration</option>
                                                        <option value="113">Chemistry</option>
                                                        <option value="114">Computer Science</option>
                                                        <option value="115">Clinical Psychology</option>
                                                        <option value="116">Drama &amp; Music</option>
                                                        <option value="117">Development Studies</option>
                                                        <option value="118">Economics</option>
                                                        <option value="119">Education</option>
                                                        <option value="120">English</option>
                                                        <option value="121">Finance</option>
                                                        <option value="122">Fine Arts</option>
                                                        <option value="123">Folklore</option>
                                                        <option value="124">Geography</option>
                                                        <option value="125">Geology/Environment</option>
                                                        <option value="126">History</option>
                                                        <option value="127">Home Economics</option>
                                                        <option value="128">Hadith</option>
                                                        <option value="129">International Relations</option>
                                                        <option value="130">Islamic History and Culture</option>
                                                        <option value="131">Islamic Studies</option>
                                                        <option value="132">Information Com. Tech. (ICT)</option>
                                                        <option value="133">Mass Comm. &amp; Journalism</option>
                                                        <option value="134">Law/Jurisprudence</option>
                                                        <option value="135">Information Science and Library Management
                                                        </option>
                                                        <option value="136">Language/Linguistic</option>
                                                        <option value="137">Management</option>
                                                        <option value="138">Marketing</option>
                                                        <option value="139">Mathematics</option>
                                                        <option value="140">Microbiology</option>
                                                        <option value="141">Marine Science</option>
                                                        <option value="142">Medical Technology</option>
                                                        <option value="143">Pali</option>
                                                        <option value="144">Persian</option>
                                                        <option value="145">Pharmacy</option>
                                                        <option value="146">Philosophy</option>
                                                        <option value="147">Physics</option>
                                                        <option value="148">Political Science</option>
                                                        <option value="149">Psychology</option>
                                                        <option value="150">Public Administration</option>
                                                        <option value="151">Public Finance</option>
                                                        <option value="152">Population Science</option>
                                                        <option value="153">Peace &amp; Conflict</option>
                                                        <option value="154">Pharmaceutical Chemistry</option>
                                                        <option value="155">Sanskrit</option>
                                                        <option value="156">Social Welfare/Social Work</option>
                                                        <option value="157">Sociology</option>
                                                        <option value="158">Soil Water and Environment Science</option>
                                                        <option value="159">Statistics</option>
                                                        <option value="160">Tafsir</option>
                                                        <option value="161">Urdu</option>
                                                        <option value="162">Urban Development</option>
                                                        <option value="163">World Religion</option>
                                                        <option value="164">Women Studies</option>
                                                        <option value="165">Water &amp; Environment Science</option>
                                                        <option value="166">Zoology</option>
                                                        <option value="167">Genetic and Breeding</option>
                                                        <option value="168">International Law</option>
                                                        <option value="169">Akaid</option>
                                                        <option value="170">Graphics</option>
                                                        <option value="171">Fikha</option>
                                                        <option value="172">Modern Arabic</option>
                                                        <option value="173">History of Music</option>
                                                        <option value="174">Drawing and Printing</option>
                                                        <option value="175">Industrial Arts</option>
                                                        <option value="176">Ethics</option>
                                                        <option value="177">Forestry</option>
                                                        <option value="178">Ayurvedic</option>
                                                        <option value="179">Unani</option>
                                                        <option value="180">Television, Film and Photography</option>
                                                        <option value="181">Women and Gender Studies</option>
                                                        <option value="182">Criminology</option>
                                                        <option value="183">Communication Disorders</option>
                                                        <option value="184">Computer Engineering</option>
                                                        <option value="185">Computer Science &amp; Engineering</option>
                                                        <option value="186">Computer Science &amp; Information
                                                            Technology</option>
                                                        <option value="187">Information Technology</option>
                                                        <option value="188">Geology/Geology and Mining</option>
                                                        <option value="189">Environmental science</option>
                                                        <option value="190">Genetic Engineering and Biotechnology
                                                        </option>
                                                        <option value="191">Materials Science &amp; Engineering
                                                        </option>
                                                        <option value="192">Finance and Banking</option>
                                                        <option value="201">Agriculture</option>
                                                        <option value="202">Agriculture Chemistry</option>
                                                        <option value="203">Agriculture Co-operatives</option>
                                                        <option value="204">Agriculture Economics</option>
                                                        <option value="205">Agriculture Engineering</option>
                                                        <option value="206">Agriculture Finance</option>
                                                        <option value="207">Agriculture Marketing</option>
                                                        <option value="208">Agriculture Science</option>
                                                        <option value="209">Agriculture Soil Science</option>
                                                        <option value="210">Animal Husbandry</option>
                                                        <option value="211">Agronomy &amp; Aquaculture</option>
                                                        <option value="212">Agronomy &amp; Aquaculture Extension
                                                        </option>
                                                        <option value="213">Anatomy &amp; Histology</option>
                                                        <option value="214">Agronnomy</option>
                                                        <option value="215">Anatomology</option>
                                                        <option value="216">Animal Breeding &amp; Genetic</option>
                                                        <option value="217">Animal Science</option>
                                                        <option value="218">Animal Nutrition</option>
                                                        <option value="220">Agriculture Water Management</option>
                                                        <option value="221">Agriculture Extension</option>
                                                        <option value="223">Agro Forestry</option>
                                                        <option value="225">Agriculture Statistics</option>
                                                        <option value="226">Agr.Co-operative &amp; Marketing</option>
                                                        <option value="227">Bio-Technology</option>
                                                        <option value="228">Corp Botany</option>
                                                        <option value="229">Dairy Science</option>
                                                        <option value="230">Doc.of Veterinary Science</option>
                                                        <option value="231">Fisheries</option>
                                                        <option value="232">Fisheries &amp; Aquaculture</option>
                                                        <option value="233">Fisheries Biology</option>
                                                        <option value="234">Fisheries Management</option>
                                                        <option value="235">Fisheries Technology</option>
                                                        <option value="236">Forestry</option>
                                                        <option value="237">Farm Power &amp; Machinery</option>
                                                        <option value="238">Food Tech. &amp; Rural Industry</option>
                                                        <option value="239">Farm Structure</option>
                                                        <option value="241">Horticulture</option>
                                                        <option value="242">Livestock</option>
                                                        <option value="243">Microbiology &amp; Hygenic</option>
                                                        <option value="244">Production Economics</option>
                                                        <option value="245">Plant Pathology</option>
                                                        <option value="246">Paratrology</option>
                                                        <option value="247">Poultry Science</option>
                                                        <option value="248">Rural Sociology</option>
                                                        <option value="249">Surgery &amp; Obstate</option>
                                                        <option value="250">Business Studies</option>
                                                        <option value="260">Accounting</option>
                                                        <option value="261">Banking</option>
                                                        <option value="262">Business Administration</option>
                                                        <option value="263">Finance</option>
                                                        <option value="264">Management</option>
                                                        <option value="265">Marketing</option>
                                                        <option value="266">Management Information Systems (MIS)
                                                        </option>
                                                        <option value="267">Banking and Insurance</option>
                                                        <option value="268">Accounting &amp; Information Systems (AIS)
                                                        </option>
                                                        <option value="269">International Business</option>
                                                        <option value="270">Tourism and Hospitality Management</option>
                                                        <option value="271">Human Resource Management</option>
                                                        <option value="272">Organization Strategy and Leadership
                                                        </option>
                                                        <option value="273">Finance and Banking</option>
                                                        <option value="300">Electronics &amp; Telecommunication
                                                            Engineering</option>
                                                        <option value="301">Architecture</option>
                                                        <option value="302">Chemical</option>
                                                        <option value="303">Civil</option>
                                                        <option value="304">Computer Science</option>
                                                        <option value="305">Electrical</option>
                                                        <option value="306">Electrical &amp; Electronics</option>
                                                        <option value="307">Electronic</option>
                                                        <option value="308">Genetic Engineering</option>
                                                        <option value="309">Industrial</option>
                                                        <option value="310">Leather Technology</option>
                                                        <option value="311">Marine</option>
                                                        <option value="312">Mechanical</option>
                                                        <option value="313">Metallurgy</option>
                                                        <option value="314">Mineral</option>
                                                        <option value="315">Mining</option>
                                                        <option value="316">Naval Architecture</option>
                                                        <option value="317">Physical Planning</option>
                                                        <option value="318">Regional Planning</option>
                                                        <option value="319">Structural</option>
                                                        <option value="320">Textile Technology</option>
                                                        <option value="321">Town Planning</option>
                                                        <option value="322">Urban &amp; Regional Planning</option>
                                                        <option value="323">Tele-Comunication Engineering</option>
                                                        <option value="324">Computer Science &amp; Engineering</option>
                                                        <option value="325">Microwave Engineering</option>
                                                        <option value="326">A &amp; B Section of A.M.I.E</option>
                                                        <option value="327">Environmental Engineering</option>
                                                        <option value="328">Aeronautical Engineering</option>
                                                        <option value="329">Software Engineering</option>
                                                        <option value="391">Medicine &amp; Surgery</option>
                                                        <option value="392">Dental Surgery</option>
                                                        <option value="393">Computer Engineering</option>
                                                        <option value="394">Computer Science &amp; Engineering</option>
                                                        <option value="395">Computer Science &amp; Information
                                                            Technology</option>
                                                        <option value="396">Information and Communication Technology
                                                        </option>
                                                        <option value="397">Electronics &amp; Communication Engineering
                                                        </option>
                                                        <option value="398">Water Resource Engineering</option>
                                                        <option value="399">Materials Science &amp; Engineering
                                                        </option>
                                                        <option value="991">B.A</option>
                                                        <option value="992">B.S.S</option>
                                                        <option value="993">B.SC</option>
                                                        <option value="994">B.com</option>
                                                        <option value="995">L.L.B</option>
                                                        <option value="996">B.B.S</option>
                                                        <option value="999">Others</option>
                                                        <option value="1011">A &amp; B Section of A.M.I.E</option>
                                                        <option value="1022">Accounting</option>
                                                        <option value="1033">Accounting and Information System</option>
                                                        <option value="1044">Aeronautical Engineering</option>
                                                        <option value="1055">Agr.Co-Operative &amp; Marketing</option>
                                                        <option value="1077">Agriculture</option>
                                                        <option value="1088">Agriculture Chemistry</option>
                                                        <option value="1099">Agriculture Co-operatives</option>
                                                        <option value="1100">Agriculture Economics</option>
                                                        <option value="1111">Agriculture Engineering</option>
                                                        <option value="1122">Agriculture Extension</option>
                                                        <option value="1125">Horticulture</option>
                                                        <option value="1126">Human Resource Management</option>
                                                        <option value="1127">Industrial</option>
                                                        <option value="1133">Agriculture Finance</option>
                                                        <option value="1134">Agriculture Marketing</option>
                                                        <option value="1135">Agriculture Science</option>
                                                        <option value="1136">Agriculture Soil Science</option>
                                                        <option value="1137">Agriculture Statistics</option>
                                                        <option value="1138">Agriculture Water Management</option>
                                                        <option value="1139">Agro Forestry</option>
                                                        <option value="1140">Agronnomy</option>
                                                        <option value="1141">Agronomy &amp; Aquaculture</option>
                                                        <option value="1142">Agronomy &amp; Aquaculture Extension
                                                        </option>
                                                        <option value="1143">Akaid</option>
                                                        <option value="1144">Anatomology</option>
                                                        <option value="1145">Anatomy &amp; Histology</option>
                                                        <option value="1146">Animal Breeding &amp; Genetic</option>
                                                        <option value="1147">Animal Husbandry</option>
                                                        <option value="1148">Animal Nutrition</option>
                                                        <option value="1149">Animal Science</option>
                                                        <option value="1150">Anthropology</option>
                                                        <option value="1151">Applied Chemistry</option>
                                                        <option value="1152">Applied Mathematics</option>
                                                        <option value="1153">Applied Physics</option>
                                                        <option value="1154">Arabic</option>
                                                        <option value="1155">Archaeology</option>
                                                        <option value="1156">Architecture</option>
                                                        <option value="1157">B.A</option>
                                                        <option value="1158">B.S.S</option>
                                                        <option value="1159">B.Sc</option>
                                                        <option value="1160">B.com</option>
                                                        <option value="1161">Bangla</option>
                                                        <option value="1162">Banking</option>
                                                        <option value="1163">Banking</option>
                                                        <option value="1164">Banking and Insurance</option>
                                                        <option value="1165">Bio-Technology</option>
                                                        <option value="1166">Biochemistry</option>
                                                        <option value="1167">Botany</option>
                                                        <option value="1168">Business Administration</option>
                                                        <option value="1169">Business Studies</option>
                                                        <option value="1170">Chemical</option>
                                                        <option value="1171">Chemistry</option>
                                                        <option value="1172">Civil</option>
                                                        <option value="1173">Clinical Psychology</option>
                                                        <option value="1174">Communication Disorders</option>
                                                        <option value="1175">Computer Engineering</option>
                                                        <option value="1176">Computer Science</option>
                                                        <option value="1177">Computer Science &amp; Engineering</option>
                                                        <option value="1178">Computer Science &amp; Information
                                                            Technology</option>
                                                        <option value="1179">Corp Botany</option>
                                                        <option value="1180">Criminology</option>
                                                        <option value="1181">Criminology &amp; Police Science</option>
                                                        <option value="1182">Dairy Science</option>
                                                        <option value="1183">Dental Surgery</option>
                                                        <option value="1184">Development Studies</option>
                                                        <option value="1185">Doc.of Veterinary Science</option>
                                                        <option value="1186">Drama &amp; Music</option>
                                                        <option value="1187">Drawing and Printing</option>
                                                        <option value="1188">Economics</option>
                                                        <option value="1189">Education</option>
                                                        <option value="1190">Electrical</option>
                                                        <option value="1191">Electrical &amp; Electronics</option>
                                                        <option value="1192">Electronic</option>
                                                        <option value="1193">Electronics &amp; Communication Engineering
                                                        </option>
                                                        <option value="1194">English</option>
                                                        <option value="1195">Environmental Engineering</option>
                                                        <option value="1196">Environmental science</option>
                                                        <option value="1197">Ethics</option>
                                                        <option value="1198">Farm Power &amp; Machinery</option>
                                                        <option value="1199">Farm Structure</option>
                                                        <option value="1200">Fikha</option>
                                                        <option value="1201">Finance</option>
                                                        <option value="1202">Finance</option>
                                                        <option value="1203">Finance and Banking</option>
                                                        <option value="1204">Finance and Banking</option>
                                                        <option value="1205">Fine Arts</option>
                                                        <option value="1206">Fisheries</option>
                                                        <option value="1207">Fisheries &amp; Aquaculture</option>
                                                        <option value="1208">Fisheries Biology</option>
                                                        <option value="1209">Fisheries Management</option>
                                                        <option value="1210">Fisheries Technology</option>
                                                        <option value="1211">Folklore</option>
                                                        <option value="1212">Food Tech. &amp; Rural Industry</option>
                                                        <option value="1213">Forestry</option>
                                                        <option value="1214">Genetic Engineering</option>
                                                        <option value="1215">Genetic Engineering and Biotechnology
                                                        </option>
                                                        <option value="1216">Genetic and Breeding</option>
                                                        <option value="1217">Geography</option>
                                                        <option value="1218">Geography and Environmental Science
                                                        </option>
                                                        <option value="1219">Geology/Geology and Mining</option>
                                                        <option value="1220">Graphics</option>
                                                        <option value="1221">Hadith</option>
                                                        <option value="1222">History</option>
                                                        <option value="1223">History of Music</option>
                                                        <option value="1224">Home Economics</option>
                                                        <option value="1225">Horticulture</option>
                                                        <option value="1226">Human Resource Management</option>
                                                        <option value="1227">Industrial</option>
                                                        <option value="1228">Industrial Arts</option>
                                                        <option value="1229">Information Science and Library Management
                                                        </option>
                                                        <option value="1230">Information Technology</option>
                                                        <option value="1231">Information and Communication Technology
                                                        </option>
                                                        <option value="1232">International Business</option>
                                                        <option value="1233">International Law</option>
                                                        <option value="1234">International Relations</option>
                                                        <option value="1235">Islamic History and Culture</option>
                                                        <option value="1236">Islamic Studies</option>
                                                        <option value="1237">L.L.B</option>
                                                        <option value="1238">Language/Linguistic</option>
                                                        <option value="1239">Law/Jurisprudence</option>
                                                        <option value="1240">Leather Technology</option>
                                                        <option value="1241">Livestock</option>
                                                        <option value="1242">Management</option>
                                                        <option value="1243">Management Information Systems</option>
                                                        <option value="1250">Marine</option>
                                                        <option value="1251">Marine Science</option>
                                                        <option value="1252">Marketing</option>
                                                        <option value="1253">Mass Comm. &amp; Journalism</option>
                                                        <option value="1254">Materials Science &amp; Engineering
                                                        </option>
                                                        <option value="1255">Mathematics</option>
                                                        <option value="1256">Mechanical</option>
                                                        <option value="1257">Medical Technology</option>
                                                        <option value="1258">Medicine &amp; Surgery</option>
                                                        <option value="1259">Metallurgy</option>
                                                        <option value="1260">Microbiology</option>
                                                        <option value="1261">Microbiology &amp; Hygenic</option>
                                                        <option value="1262">Microwave Engineering</option>
                                                        <option value="1263">Mineral</option>
                                                        <option value="1264">Mining</option>
                                                        <option value="1265">Modern Arabic</option>
                                                        <option value="1266">Naval Architecture</option>
                                                        <option value="1267">Organization Strategy and Leadership
                                                        </option>
                                                        <option value="1268">Pali</option>
                                                        <option value="1269">Paratrology</option>
                                                        <option value="1270">Peace &amp; Conflict</option>
                                                        <option value="1271">Persian</option>
                                                        <option value="1272">Pharmaceutical Chemistry</option>
                                                        <option value="1273">Pharmacy</option>
                                                        <option value="1274">Philosophy</option>
                                                        <option value="1275">Physical Planning</option>
                                                        <option value="1276">Physics</option>
                                                        <option value="1277">Plant Pathology</option>
                                                        <option value="1278">Political Science</option>
                                                        <option value="1279">Population Science</option>
                                                        <option value="1280">Poultry Science</option>
                                                        <option value="1281">Production Economics</option>
                                                        <option value="1282">Psychology</option>
                                                        <option value="1283">Public Administration</option>
                                                        <option value="1284">Public Finance</option>
                                                        <option value="1285">Regional Planning</option>
                                                        <option value="1286">Rural Sociology</option>
                                                        <option value="1287">Sanskrit</option>
                                                        <option value="1288">Social Welfare/Social Work</option>
                                                        <option value="1289">Sociology</option>
                                                        <option value="1290">Software Engineering</option>
                                                        <option value="1291">Soil Water and Environment Science</option>
                                                        <option value="1292">Statistics</option>
                                                        <option value="1293">Structural</option>
                                                        <option value="1294">Surgery &amp; Obstate</option>
                                                        <option value="1295">Tafsir</option>
                                                        <option value="1296">Telecommunication Engineering</option>
                                                        <option value="1297">Television, Film and Photography</option>
                                                        <option value="1298">Textile Technology</option>
                                                        <option value="1299">Tourism and Hospitality Management</option>
                                                        <option value="1300">Town Planning</option>
                                                        <option value="1301">Urban &amp; Regional Planning</option>
                                                        <option value="1302">Urban Development</option>
                                                        <option value="1303">Urdu</option>
                                                        <option value="1304">Water &amp; Environment Science</option>
                                                        <option value="1305">Water Resource Engineering</option>
                                                        <option value="1306">Women Studies</option>
                                                        <option value="1307">Women and Gender Studies</option>
                                                        <option value="1308">World Religion</option>
                                                        <option value="1309">Zoology</option>
                                                        <option value="1310">Others</option>
                                                        <option value="1311">GENDER AND DEVELOPMENT STUDIES</option>
                                                        <option value="1312">Oceanography</option>
                                                        <option value="1313">Information and Communication Engineering
                                                        </option>
                                                        <option value="2100">Islamic Studies</option>
                                                        <option value="2101">Health Economics</option>

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
                                                        <option value="GPA4"
                                                            {{ old('masters_result_type') == 'GPA4' ? 'selected' : '' }}>
                                                            GPA(out of 4)</option>
                                                        <option value="GPA5"
                                                            {{ old('masters_result_type') == 'GPA5' ? 'selected' : '' }}>
                                                            GPA(out of 5)</option>
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
                                                    class="col-sm-4 col-form-label">{{ __('picture') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control @error('picture') is-invalid @enderror"
                                                        name="picture" type="file"
                                                        value="{{ $candidate->picture }}" id="picture"
                                                        placeholder="{{ __('picture') }}">
                                                    @error('picture')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
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

                            <button type="submit" class="btn btn-primary mt-4 mb-3">
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
                $("#care_of_parmanent").val($("#care_of").val()).attr('readonly', 'readonly');
                $("#house_and_road_no_parmanent").val($("#house_and_road_no").val()).attr('readonly', 'readonly');
                $("#place_parmanent").val($("#place").val()).attr('readonly', 'readonly');
                $("#postcode_parmanent").val($("#postcode").val()).attr('readonly', 'readonly');
                $("#post_office_parmanent").val($("#post_office").val()).attr('readonly', 'readonly');
                $("#region_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#region_parmanent").val($("#region").val()).trigger("change");

                $("#district_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#district_parmanent").val($("#district").val()).trigger("change");

                $("#thana_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#thana_parmanent").val($("#thana").val()).trigger("change");

                $("#pourosova_union_porishod_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#pourosova_union_porishod_parmanent").val($("#pourosova_union_porishod").val()).trigger(
                    "change");

                $("#ward_no_parmanent").select2({
                    disabled: 'readonly'
                });
                $("#ward_no_parmanent").val($("#ward_no").val()).trigger("change");
                // $("#ward_no_parmanent").trigger('change',{'isTriggeredBySystem':true})








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
                $("#pourosova_union_porishod_parmanent").select2({
                    disabled: false
                });
                $("#ward_no_parmanent").select2({
                    disabled: false
                });
                $("#postcode_parmanent").removeAttr('readonly');
                $("#post_office_parmanent").removeAttr('readonly');
                $("#place_parmanent").removeAttr('readonly');
                $("#house_and_road_no_parmanent").removeAttr('readonly');
            }
        })



        $(document).ready(function() {

            // var division = $("#region").val();
            // get_district(division);

            // var district_id = $("#district").val();
            // get_thana(district_id);

            // var division = $("#region").val();
            // get_district_parmanent(division);

            // var district_id = $("#district").val();
            // get_thana_parmanent(district_id);

        })

        $(document).on("change", "#region", function() {
            var division = $(this).val();
            get_district(division);


        })

        function get_district(division) {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.district.get.data') }}",
                data: {
                    division: division,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#district").html(response.html);
                    // toastr.success(response.message, 'Success');
                }
            });
        }



        $(document).on("change", "#district", function() {
            var district_id = $(this).val();
            get_thana(district_id);
        })

        function get_thana(district_id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.thana.get.data') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

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
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.union.get.data') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#pourosova_union_porishod").html(response.html);
                }
            });

        }


        $(document).on("change", "#region_parmanent", function(event) {
            if (event.originalEvent) {
                var division = $(this).val();
                get_district_parmanent(division);
            }
        })

        function get_district_parmanent(division) {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.district.get.data') }}",
                data: {
                    division: division,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#district_parmanent").html(response.html);
                    // toastr.success(response.message, 'Success');
                }
            });
        }



        $(document).on("change", "#district_parmanent", function(event) {
            if (event.originalEvent) {
                var district_id = $(this).val();
                get_thana_parmanent(district_id);
            }
        })

        function get_thana_parmanent(district_id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.thana.get.data') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#thana_parmanent").html(response.html);
                }
            });

        }


        // get union by thana/paurashava/upazila
        $(document).on("change", "#thana_parmanent", function(event) {
            if (event.originalEvent) {
                var thana_id = $(this).val();
                get_union_parmenent(thana_id);
            }
        })

        function get_union_parmenent(thana_id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('website.union.get.data') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#pourosova_union_porishod_parmanent").html(response.html);
                }
            });

        }

        // in change masters result type open cgpa input box
        $(document).on("change", "#masters_result_type", function() {
            var masters_result_type = $(this).val();
            if (masters_result_type == "GPA4" || masters_result_type == "GPA5") {
                $("#masters_cgpa").removeClass("d-none");
            } else {
                $("#masters_cgpa").addClass("d-none");
            }
        })

        // in change honors result type open cgpa input box
        $(document).on("change", "#honors_result_type", function() {
            var honors_result_type = $(this).val();
            if (honors_result_type == "GPA4" || honors_result_type == "GPA5") {
                $("#honors_cgpa").removeClass("d-none");
            } else {
                $("#honors_cgpa").addClass("d-none");
            }
        })

        // in change HSC result type open cgpa input box
        $(document).on("change", "#hsc_result_type", function() {
            var hsc_result_type = $(this).val();
            if (hsc_result_type == "GPA4" || hsc_result_type == "GPA5") {
                $("#hsc_cgpa").removeClass("d-none");
            } else {
                $("#hsc_cgpa").addClass("d-none");
            }
        })

        // in change SSC result type open cgpa input box
        $(document).on("change", "#ssc_result_type", function() {
            var ssc_result_type = $(this).val();
            if (ssc_result_type == "GPA4" || ssc_result_type == "GPA5") {
                $("#ssc_cgpa").removeClass("d-none");
            } else {
                $("#ssc_cgpa").addClass("d-none");
            }
        })
    </script>
@endsection
