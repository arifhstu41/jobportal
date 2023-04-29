@extends('website.layouts.app')

@section('title')
    {{ __('settings') }}
@endsection
@section('main')
    <div class="dashboard-wrapper">
        <div class="container">
            <div class="row">
                <x-website.candidate.sidebar />
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard-right-header rt-mb-32">
                            <div class="left-text m-0">
                                <h3 class="f-size-18 lh-1 m-0">{{ __('settings') }}</h3>
                            </div>
                            <span class="sidebar-open-nav">
                                <i class="ph-list"></i>
                            </span>
                        </div>
                        @if ($errors->count())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="cadidate-dashboard-tabs">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                {{-- Basic Setting  --}}
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link {{ !session('type') || session('type') == 'basic' ? 'active' : '' }}"
                                        id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal"
                                        type="button" role="tab" aria-controls="pills-personal" aria-selected="true">
                                        <x-svg.user-icon />
                                        {{ __('basic') }}
                                    </button>
                                </li>

                                {{-- Profile Setting  --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ session('type') == 'profile' ? 'active' : '' }}"
                                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                        <x-svg.user-round-icon />
                                        {{ __('profile') }}
                                    </button>
                                </li>

                                {{-- Experience & Education Setting  --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ session('type') == 'experience' ? 'active' : '' }}"
                                        id="pills-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-experience"
                                        type="button" role="tab" aria-controls="pills-experience"
                                        aria-selected="false">
                                        <x-svg.briefcase-icon />
                                        {{ __('experience_and_education') }}
                                    </button>
                                </li>

                                {{-- Social Setting  --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ session('type') == 'social' ? 'active' : '' }}"
                                        id="pills-social-tab" data-bs-toggle="pill" data-bs-target="#pills-social"
                                        type="button" role="tab" aria-controls="pills-social" aria-selected="false">
                                        <x-svg.globe2-icon />
                                        {{ __('social_media') }}
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                {{-- Basic Setting  --}}
                                <div class="tab-pane fade {{ !session('type') || session('type') == 'basic' ? 'show active' : '' }}"
                                    id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                                    <form action="{{ route('candidate.settingUpdate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="type" value="basic">
                                        <div class="dashboard-account-setting-item tw-py-0">
                                            <h6> {{ __('basic_information') }}</h6>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <x-website.candidate.photo-section :candidate="$candidate" />
                                                </div>
                                                <div class="row col-lg-8 mx-auto">
                                                    <div class="col-lg-6 mb-3">
                                                        <x-forms.label :required="true" name="full_name"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <input type="text" name="name"
                                                                    value="{{ $candidate->user->name }}"
                                                                    placeholder="{{ __('name') }}"
                                                                    {{ $candidate->user->name ? 'readonly' : '' }} />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <x-forms.label :required="false" name="professional_title_tagline"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <input type="text" name="title"
                                                                    value="{{ $candidate->title ?? '' }}"
                                                                    placeholder="{{ __('title') }}" class=""
                                                                    {{ $candidate->title ? 'readonly' : '' }} />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <x-forms.label :required="true" name="experience_level"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <select name="experience" class="select2-taggable w-100-p">
                                                            @foreach ($experiences as $experience)
                                                                <option
                                                                    {{ $candidate->experience_id == $experience->id ? 'selected' : '' }}
                                                                    value="{{ $experience->id }}">{{ $experience->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('experience')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <x-forms.label :required="true" name="education_level"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <select name="education" class="select2-taggable w-100-p">
                                                            @foreach ($educations as $education)
                                                                <option
                                                                    {{ $candidate->education_id == $education->id ? 'selected' : '' }}
                                                                    value="{{ $education->id }}">{{ $education->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('education')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <x-forms.label :required="false" name="personal_website"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup has-icon2">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="url" name="website"
                                                                    value="{{ $candidate->website }}"
                                                                    placeholder="{{ __('website') }}" class="" />
                                                                <div class="icon-badge-2">
                                                                    <x-svg.link-icon />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <x-forms.label :required="true" name="date_of_birth"
                                                            class="body-font-4 d-block text-gray-900 rt-mb-8" />
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
                                                    <div class="col-lg-12 mt-4">
                                                        <button type="submit" class="btn d-block btn-primary">
                                                            {{ __('save_changes') }}
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </form>
                                    <div>
                                        <h6 class="resume">{{ __('your_cv_resume') }}</h6>
                                        @if ($errors->has('resume_name') || $errors->has('resume_file'))
                                            <div class="alert alert-danger" role="alert">
                                                @error('resume_name')
                                                    <span class="d-block"><strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @error('resume_file')
                                                    <span class="d-block"><strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="resume-lists">
                                            @foreach ($resumes as $resume)
                                                <div class="resume-item">
                                                    <div class="resume-icon">
                                                        <x-svg.file-icon2 />
                                                    </div>
                                                    <div>
                                                        <h4 class="resume-title">{{ $resume->name }}</h4>
                                                        <h6 class="resume-size">{{ $resume->file_size }}</h6>
                                                    </div>
                                                    <div class="dot-icon ms-auto">
                                                        <button type="button" class="btn p-0" id="dropdownMenuButton5"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <x-svg.three-dots />
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end company-dashboard-dropdown"
                                                            aria-labelledby="dropdownMenuButton5">
                                                            <li>
                                                                <button
                                                                    onclick="editResume({{ $resume->id }},'{{ $resume->name }}', '{{ $resume->file_size }}')"
                                                                    type="button" class="dropdown-item">
                                                                    <x-svg.pen-edit />
                                                                    {{ __('edit') }}
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('candidate.resume.delete', $resume->id) }}"
                                                                    method="POST" id="resumeForm">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" onclick="resumeDelete()"
                                                                        class="dropdown-item">
                                                                        <x-svg.trash-icon />
                                                                        {{ __('delete') }}
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="resume-item add-resume" data-bs-toggle="modal"
                                                data-bs-target="#resumeModal">
                                                <div class="resume-icon">
                                                    <x-svg.plus-icon />
                                                </div>
                                                <div>
                                                    <h4 class="resume-title">{{ __('add_cv_resume') }}</h4>
                                                    <h6 class="resume-size">{{ __('browse_file_here_only') }} - pdf</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                {{-- Profile Setting  --}}
                                <div class="tab-pane fade {{ session('type') == 'profile' ? 'show active' : '' }}"
                                    id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <form action="{{ route('candidate.settingUpdate') }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="dashboard-account-setting-item pb-0">
                                            <h6> {{ __('profile') }}</h6>
                                            <input type="hidden" name="type" value="profile">
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="name"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input type="text" name="name"
                                                                value="{{ $candidate->user->name }}"
                                                                placeholder="{{ __('name') }}" class=""
                                                                readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="name_bn"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input readonly type="text" name="name_bn"
                                                                value="{{ $candidate->name_bn }}"
                                                                placeholder="{{ __('name_bn') }}" class="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="father_name"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input readonly type="text" name="father_name"
                                                                value="{{ $candidate->father_name }}"
                                                                placeholder="{{ __('father_name') }}" class="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="father_name_bn"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input readonly type="text" name="father_name_bn"
                                                                value="{{ $candidate->father_name_bn }}"
                                                                placeholder="{{ __('father_name_bn') }}"
                                                                class="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="mother_name"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input readonly type="text" name="mother_name"
                                                                value="{{ $candidate->mother_name }}"
                                                                placeholder="{{ __('mother_name') }}" class="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="mother_name_bn"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input readonly type="text" name="mother_name_bn"
                                                                value="{{ $candidate->mother_name_bn }}"
                                                                placeholder="{{ __('mother_name_bn') }}"
                                                                class="" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="gender"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select
                                                        class="rt-selectactive w-100-p @error('gender') is-invalid @enderror"
                                                        name="gender" disabled>
                                                        <option @if ($candidate->gender == 'male') selected @endif
                                                            value="male">
                                                            {{ __('male') }}
                                                        </option>
                                                        <option @if ($candidate->gender == 'female') selected @endif
                                                            value="female">
                                                            {{ __('female') }}
                                                        </option>
                                                        <option @if ($candidate->gender == 'other') selected @endif
                                                            value="other">
                                                            {{ __('other') }}
                                                        </option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="marital_status"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select name="marital_status" class="rt-selectactive w-100-p"
                                                        disabled>
                                                        <option @if ($candidate->marital_status == 'single') selected @endif
                                                            value="single">{{ __('single') }}</option>
                                                        <option @if ($candidate->marital_status == 'married') selected @endif
                                                            value="married">{{ __('married') }}</option>
                                                        <option @if ($candidate->marital_status == 'divorced') selected @endif
                                                            value="divorced">{{ __('divorced') }}</option>
                                                        <option @if ($candidate->marital_status == 'others') selected @endif
                                                            value="others">{{ __('others') }}</option>
                                                    </select>
                                                    @error('marital_status')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="birth_certificate_no"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input {{ $candidate->birth_certificate_no ? 'readonly' : '' }}
                                                                type="text" name="birth_certificate_no"
                                                                value="{{ $candidate->birth_certificate_no }}"
                                                                placeholder="{{ __('birth_certificate_no') }}"
                                                                class="" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="nid_no"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input {{ $candidate->nid_no ? 'readonly' : '' }}
                                                                type="text" name="nid_no"
                                                                value="{{ $candidate->nid_no }}"
                                                                placeholder="{{ __('nid_no') }}" class="" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="passport_no"
                                                        class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <div class="fromGroup">
                                                        <div class="form-control-icon">
                                                            <input {{ $candidate->passport_no ? 'readonly' : '' }}
                                                                type="text" name="passport_no"
                                                                value="{{ $candidate->passport_no }}"
                                                                placeholder="{{ __('passport_no') }}" class="" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="quota"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select name="quota" class="rt-selectactive w-100-p">
                                                        <option value="">Please Select</option>
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
                                                        <option @if ($candidate->quota == 'Non Quota' || old('quota') == 'Non Quota') selected @endif
                                                            value="Non Quota">
                                                            {{ __('Non Quota') }}</option>
                                                    </select>
                                                    @error('quota')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="profession"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select name="profession" class="select2-taggable w-100-p">
                                                        @foreach ($professions as $profession)
                                                            <option
                                                                {{ $candidate->profession_id == $profession->id ? 'selected' : '' }}
                                                                value="{{ $profession->id }}">{{ $profession->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('profession')
                                                        <span class="invalid-feedback"
                                                            role="alert">{{ __($message) }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="nationality"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select name="nationality" class="rt-selectactive w-100">
                                                        <option value="22" selected>Bangladeshi</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <x-forms.label :required="true" name="your_availability"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select id="available_status" name="status"
                                                        class="rt-selectactive form-control w-100-p">
                                                        <option value="">{{ __('select_one') }}</option>
                                                        <option
                                                            {{ old('status', $candidate->status) == 'available' ? 'selected' : '' }}
                                                            value="available">{{ __('available') }}</option>
                                                        <option
                                                            {{ old('status', $candidate->status) == 'not_available' ? 'selected' : '' }}
                                                            value="not_available">{{ __('not_available') }}</option>
                                                        <option
                                                            {{ old('status', $candidate->status) == 'available_in' ? 'selected' : '' }}
                                                            value="available_in">{{ __('available_in') }}</option>
                                                    </select>
                                                    @error('status')
                                                        <span
                                                            class="error invalid-feedback d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 d-none" id="available_in_status">
                                                    <div>
                                                        <h4 class="f-size-14 ft-wt-5 rt-mb-20 lh-1">
                                                            {{ __('available_in') }}</h4>
                                                        <div
                                                            class="d-flex align-items-center form-control-icon date datepicker">
                                                            <input type="text" id="available_id_date"
                                                                name="available_in"
                                                                value="{{ old('available_in', date('d-m-Y', strtotime($candidate->available_in))) }}"
                                                                placeholder="dd/mm/yyyy"
                                                                class="form-control border-cutom @error('available_in') is-invalid @enderror">
                                                            <span class="input-group-addon input-group-text-custom">
                                                                <x-svg.calendar-icon />
                                                            </span>
                                                        </div>
                                                        @error('available_in')
                                                            <span
                                                                class="error invalid-feedback d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <x-forms.label :required="true" name="skills_you_have"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select name="skills[]" class="select2-taggable w-100-p" multiple>
                                                        @foreach ($skills as $skill)
                                                            <option
                                                                {{ $candidate->skills ? (in_array($skill->id, $candidate->skills->pluck('id')->toArray()) ? 'selected' : '') : '' }}
                                                                value="{{ $skill->id }}">{{ $skill->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <x-forms.label :required="true" name="languages_you_know"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <select name="languages[]" class="rt-selectactive w-100-p" multiple>
                                                        @foreach ($candidate_languages as $lang)
                                                            <option
                                                                {{ $candidate->languages ? (in_array($lang->id, $candidate->languages->pluck('id')->toArray()) ? 'selected' : '') : '' }}
                                                                value="{{ $lang->id }}">{{ $lang->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <x-forms.label :required="false" name="biography"
                                                        class="body-font-4 d-block text-gray-900 rt-mb-8" />
                                                    <textarea name="bio" id="default">{!! $candidate->bio !!}</textarea>
                                                    @error('bio')
                                                        <span class="text-danger">{{ __($message) }}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            {{-- Address settings --}}


                                            <div class="row mx-1">
                                                <div class="card m-0 p-0">
                                                    <div class="card-header ">
                                                        <legend class="">Address</legend>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                {{-- present address --}}
                                                <div class="col-lg-6">
                                                    <div class="col-lg-12 ounded-2">
                                                        <h4 class="ps-1">{{ __('present_address') }}</h4>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="false" name="care_of"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="text" name="care_of"
                                                                    id="care_of" value="{{ $candidate->care_of }}"
                                                                    placeholder="{{ __('care_of') }}" class="" />
                                                            </div>
                                                        </div>
                                                        @error('care_of')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="region"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <select required name="region" id="region"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($divisions as $division)
                                                                    <option value="{{ $division->id }}"
                                                                        {{ $candidate->region == $division->id ? 'selected' : '' }}>
                                                                        {{ $division->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('region')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="district"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <select required name="district" id="district"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>

                                                                @foreach ($districts as $district)
                                                                    <option value="{{ $district->id }}"
                                                                        {{ $candidate->district == $district->id ? 'selected' : '' }}>
                                                                        {{ $district->nameEn }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        @error('district')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="thana"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <select required name="thana" id="thana"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($upazilas as $thana)
                                                                    <option value="{{ $thana->id }}"
                                                                        {{ $candidate->thana == $thana->id ? 'selected' : '' }}>
                                                                        {{ $thana->nameEn }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        @error('thana')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="pourosova_union_porishod"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <select required name="pourosova_union_porishod"
                                                                id="pourosova_union_porishod"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($unions as $union)
                                                                    <option value="{{ $union->id }}"
                                                                        {{ $candidate->pourosova_union_porishod == $union->id ? 'selected' : '' }}>
                                                                        {{ $union->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('pourosova_union_porishod')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3" id="ward_div">
                                                        <x-forms.label :required="true" name="ward_no"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <select required name="ward_no" id="ward_no"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($wards as $ward)
                                                                    <option value="{{ $ward->id }}"
                                                                        {{ $candidate->ward_no == $ward->id ? 'selected' : '' }}>
                                                                        {{ $ward->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('ward_no')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="post_office"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="text" name="post_office"
                                                                    id="post_office"
                                                                    value="{{ $candidate->post_office }}"
                                                                    placeholder="{{ __('post_office') }}"
                                                                    class="" />
                                                            </div>
                                                        </div>
                                                        @error('post_office')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="postcode"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="number" pattern="\d*"
                                                                    name="postcode" id="postcode"
                                                                    value="{{ $candidate->postcode }}"
                                                                    placeholder="{{ __('postcode') }}" class="" />
                                                            </div>
                                                        </div>
                                                        @error('postcode')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="place"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <textarea required class="form-control @error('place') is-invalid @enderror"
                                                                    placeholder="{{ __('enter') }} {{ __('place') }}" name="place" id="place" rows="2">{{ $candidate->place }}</textarea>
                                                            </div>
                                                        </div>
                                                        @error('place')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="house_and_road_no"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="text" id="house_and_road_no"
                                                                    name="house_and_road_no"
                                                                    value="{{ $candidate->house_and_road_no }}"
                                                                    placeholder="{{ __('house_and_road_no') }}"
                                                                    class="" />
                                                            </div>
                                                        </div>
                                                        @error('house_and_road_no')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- parmanent address --}}
                                                <div class="col-lg-6">
                                                    <div class="col-lg-12 ounded-2">
                                                        <h4 class="ps-1 d-inline-block">{{ __('parmanent_address') }}
                                                        </h4>
                                                        <input type="checkbox" name="same_address"
                                                            class="form-check-input d-inline-block mt-2"
                                                            id="same_address">
                                                        <label class="form-check-label d-inline-block mx-0 px-0"
                                                            for="same_address">Same as present addresss</label>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="false" name="care_of"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="text" id="care_of_parmanent"
                                                                    name="care_of_parmanent"
                                                                    value="{{ $candidate->care_of_parmanent }}"
                                                                    placeholder="{{ __('care_of') }}" class="" />
                                                            </div>
                                                        </div>
                                                        @error('care_of_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="region"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            {{-- <div class="form-control-icon">
                                                                <x-forms.input type="text" id="region_parmanent" name="region_parmanent"
                                                                    value="{{ $candidate->region_parmanent }}"
                                                                    placeholder="{{ __('region') }}" class="" />
                                                            </div> --}}
                                                            <select required name="region_parmanent" id="region_parmanent"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($divisions as $division)
                                                                    <option value="{{ $division->id }}"
                                                                        {{ $division->id == $candidate->region_parmanent ? 'selected' : '' }}>
                                                                        {{ $division->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('region_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="district"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            {{-- <div class="form-control-icon">
                                                                <x-forms.input type="text" id="district_parmanent" name="district_parmanent"
                                                                    value="{{ $candidate->district_parmanent }}"
                                                                    placeholder="{{ __('district') }}" class="" />
                                                            </div> --}}
                                                            <select required name="district_parmanent"
                                                                id="district_parmanent" class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($districts_parmanent as $district)
                                                                    <option value="{{ $district->id }}"
                                                                        {{ $district->id == $candidate->district_parmanent ? 'selected' : '' }}>
                                                                        {{ $district->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('district_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="thana"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            {{-- <div class="form-control-icon">
                                                                <x-forms.input type="text" id="thana_parmanent" name="thana_parmanent"
                                                                    value="{{ $candidate->thana }}"
                                                                    placeholder="{{ __('thana') }}" class="" />
                                                            </div> --}}
                                                            <select required name="thana_parmanent" id="thana_parmanent"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($upazilas_parmanent as $upazila)
                                                                    <option value="{{ $upazila->id }}"
                                                                        {{ $upazila->id == $candidate->thana_parmanent ? 'selected' : '' }}>
                                                                        {{ $upazila->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('thana_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true"
                                                            name="pourosova_union_porishod_parmanent"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <select required name="pourosova_union_porishod_parmanent"
                                                                id="pourosova_union_porishod_parmanent"
                                                                class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($unions_parmanent as $union)
                                                                    <option value="{{ $union->id }}"
                                                                        {{ $candidate->pourosova_union_porishod_parmanent == $union->id ? 'selected' : '' }}>
                                                                        {{ $union->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('pourosova_union_porishod_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>



                                                    <div class="col-lg-12 mb-3" id="parmanent_ward_div">
                                                        <x-forms.label :required="true" name="ward_no_parmanent"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <select required name="ward_no_parmanent"
                                                                id="ward_no_parmanent" class="rt-selectactive w-100-p">
                                                                <option value="">Please Select</option>
                                                                @foreach ($wards_parmanent as $ward)
                                                                    <option value="{{ $ward->id }}"
                                                                        {{ $candidate->ward_no_parmanent == $ward->id ? 'selected' : '' }}>
                                                                        {{ $ward->nameEn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('ward_no_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="post_office"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="text" id="post_office_parmanent"
                                                                    name="post_office_parmanent"
                                                                    value="{{ $candidate->post_office }}"
                                                                    placeholder="{{ __('post_office') }}"
                                                                    class="" />
                                                            </div>
                                                        </div>
                                                        @error('post_office_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="postcode"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="number" pattern="\d*"
                                                                    id="postcode_parmanent" name="postcode_parmanent"
                                                                    value="{{ $candidate->postcode }}"
                                                                    placeholder="{{ __('postcode') }}" class="" />
                                                            </div>
                                                        </div>
                                                        @error('postcode_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true" name="place"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <textarea required class="form-control @error('place_parmanent') is-invalid @enderror"
                                                                    placeholder="{{ __('enter') }} {{ __('place') }}" name="place_parmanent" id="place_parmanent"
                                                                    rows="2">{{ $candidate->place_parmanent }}</textarea>
                                                            </div>
                                                        </div>
                                                        @error('place_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <x-forms.label :required="true"
                                                            name="house_and_road_no_parmanent"
                                                            class="pointer body-font-4 d-block text-gray-900 rt-mb-8" />
                                                        <div class="fromGroup">
                                                            <div class="form-control-icon">
                                                                <x-forms.input type="text"
                                                                    id="house_and_road_no_parmanent"
                                                                    name="house_and_road_no_parmanent"
                                                                    value="{{ $candidate->house_and_road_no_parmanent }}"
                                                                    placeholder="{{ __('postcode') }}" class="" />
                                                            </div>
                                                        </div>
                                                        @error('house_and_road_no_parmanent')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 mt-4">
                                                    <button type="submit" class="btn d-block btn-primary">
                                                        {{ __('save_changes') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- Experience & Education Setting  --}}
                                <div class="tab-pane fade {{ session('type') == 'experience' ? 'show active' : '' }}"
                                    id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <x-website.candidate.tab.candidate-experience-setting-tab :experiences="$candidate->experiences" />
                                    <br>
                                    <x-website.candidate.tab.candidate-education-setting-tab :educations="$candidate->educations" />
                                </div>

                                {{-- Social Setting  --}}
                                <div class="tab-pane fade {{ session('type') == 'social' ? 'show active' : '' }}"
                                    id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
                                    <div class="dashboard-account-setting-item">
                                        <form action="{{ route('candidate.settingUpdate') }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="type" value="social">
                                            <div class="row">
                                                @forelse($socials as $social)
                                                    <div class="col-12 custom-select-padding">
                                                        <div class="d-flex">
                                                            <div class="d-flex mborder">
                                                                <div class="position-relative">
                                                                    <select
                                                                        class="w-100-p border-0 rt-selectactive form-control"
                                                                        name="social_media[]">
                                                                        <option value="" class="d-none" disabled>
                                                                            {{ __('select_one') }}</option>
                                                                        <option
                                                                            {{ $social->social_media == 'facebook' ? 'selected' : '' }}
                                                                            value="facebook">{{ __('facebook') }}
                                                                        </option>
                                                                        <option
                                                                            {{ $social->social_media == 'twitter' ? 'selected' : '' }}
                                                                            value="twitter">{{ __('twitter') }}</option>
                                                                        <option
                                                                            {{ $social->social_media == 'instagram' ? 'selected' : '' }}
                                                                            value="instagram">{{ __('instagram') }}
                                                                        </option>
                                                                        <option
                                                                            {{ $social->social_media == 'youtube' ? 'selected' : '' }}
                                                                            value="youtube">{{ __('youtube') }}</option>
                                                                        <option
                                                                            {{ $social->social_media == 'linkedin' ? 'selected' : '' }}
                                                                            value="linkedin">{{ __('linkedin') }}
                                                                        </option>
                                                                        <option
                                                                            {{ $social->social_media == 'pinterest' ? 'selected' : '' }}
                                                                            value="pinterest">{{ __('pinterest') }}
                                                                        </option>
                                                                        <option
                                                                            {{ $social->social_media == 'reddit' ? 'selected' : '' }}
                                                                            value="reddit">{{ __('reddit') }}</option>
                                                                        <option
                                                                            {{ $social->social_media == 'github' ? 'selected' : '' }}
                                                                            value="github">{{ __('github') }}</option>
                                                                        <option
                                                                            {{ $social->social_media == 'other' ? 'selected' : '' }}
                                                                            value="other">{{ __('other') }}</option>
                                                                    </select>
                                                                </div>
                                                                <div class="w-100">
                                                                    <input class="border-0" type="url" name="url[]"
                                                                        id=""
                                                                        placeholder="{{ __('profile_link_url') }}..."
                                                                        value="{{ $social->url }}">
                                                                </div>
                                                            </div>
                                                            <div class="ms-2">
                                                                <button class="btn tw-bg-[#F1F2F4] tw-p-[13px]"
                                                                    type="button" id="remove_item">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                                            stroke="#18191C" stroke-width="1.5"
                                                                            stroke-miterlimit="10" />
                                                                        <path d="M15 9L9 15" stroke="#18191C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M15 15L9 9" stroke="#18191C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-12 custom-select-padding">
                                                        <div class="d-flex">
                                                            <div class="d-flex mborder">
                                                                <div class="position-relative">
                                                                    <select
                                                                        class="w-100-p border-0 rt-selectactive form-control"
                                                                        name="social_media[]">
                                                                        <option value="" class="d-none" disabled
                                                                            selected>{{ __('select_one') }}</option>
                                                                        <option value="facebook">{{ __('facebook') }}
                                                                        </option>
                                                                        <option value="twitter">{{ __('twitter') }}
                                                                        </option>
                                                                        <option value="instagram">{{ __('instagram') }}
                                                                        </option>
                                                                        <option value="youtube">{{ __('youtube') }}
                                                                        </option>
                                                                        <option value="linkedin">{{ __('linkedin') }}
                                                                        </option>
                                                                        <option value="pinterest">{{ __('pinterest') }}
                                                                        </option>
                                                                        <option value="reddit">{{ __('reddit') }}
                                                                        </option>
                                                                        <option value="github">{{ __('github') }}
                                                                        </option>
                                                                        <option value="other">{{ __('other') }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="w-100">
                                                                    <input class="border-0" type="url" name="url[]"
                                                                        id=""
                                                                        placeholder="{{ __('profile_link_url') }}...">
                                                                </div>
                                                            </div>
                                                            <div class="ms-2">
                                                                <button class="btn tw-bg-[#F1F2F4] tw-p-[13px]"
                                                                    type="button" id="remove_item">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                                            stroke="#18191C" stroke-width="1.5"
                                                                            stroke-miterlimit="10" />
                                                                        <path d="M15 9L9 15" stroke="#18191C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M15 15L9 9" stroke="#18191C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                                <div id="multiple_feature_part">
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn tw-bg-[#F1F2F4] w-100 mt-4 add-new-social"
                                                        onclick="add_features_field()" type="button">
                                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z"
                                                                stroke="#18191C" stroke-width="1.5"
                                                                stroke-miterlimit="10" />
                                                            <path d="M6.875 10H13.125" stroke="#18191C"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M10 6.875V13.125" stroke="#18191C"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <span>{{ __('add_new_social_link') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn d-block btn-primary mt-4">
                                                {{ __('save_changes') }}
                                            </button>
                                    </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-footer text-center body-font-4 text-gray-500">
            <x-website.footer-copyright />
        </div>
    </div>

    {{-- Resume add modal --}}
    <div class="modal fade" id="resumeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog tw-max-w-[536px]">
            <div class="modal-content">
                <form action="{{ route('candidate.resume.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <h5 class="tw-text-lg tw-text-[#18191C] tw-font-semibold tw-mb-[18px]" id="cvModalLabel">
                            {{ __('add_cv_resume') }}</h5>
                        <div class="from-group py-2">
                            <x-forms.label name="cv_resume_name" :required="false"
                                class="tw-mb-2 tw-text-sm tw-text-[#18191C]" />
                            <input type="text" name="resume_name" id="">
                            @error('is_remote')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group tw-mb-6">
                            <x-forms.label name="upload_cv_resume" class="tw-mb-2 tw-text-sm tw-text-[#18191C]" :required="false"/>
                            <div class="cv-image-upload-wrap">
                                <input name="resume_file" class="resume-file-upload-input" type="file"
                                    onchange="resumeManageReadURL(this, 'add');" accept="application/pdf"
                                    id="resume_add_input" />
                                <div class="drag-text">
                                    <x-svg.upload-icon />
                                    <h3>{{ __('browse_file') }}</h3>
                                    <p>{{ __('available_format') }} - PDF<br>
                                        {{ __('maximum_file_size') }} - 5 MB</p>
                                </div>
                            </div>
                            <div class="resume-file-upload-content none ">
                                <div class="wrap">
                                    <x-svg.file-icon2 />
                                    <h3 class="resume_selected_file_name">file</h3>
                                    <p>
                                        <span><span class="resume_selected_file_size">2.3</span> MB</span> <br>
                                        <span class="resume_selected_file_type">.pdf</span>
                                    </p>
                                    <div class="image-title-wrap">
                                        <button type="button" class="cv-remove-image">
                                            <x-svg.trash-icon />
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tw-flex tw-justify-between">
                            <button type="button" class="bg-priamry-50 btn btn-primary-50" data-bs-dismiss="modal"
                                aria-label="Close">{{ __('cancel') }}</button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-right"><i class="ph-arrow-right"></i></span>
                                    <span class="button-text">
                                        {{ __('add_cv_resume') }}
                                    </span>
                                </span>
                            </button>
                        </div>
                        <button type="button"
                            class="tw-rounded-full tw-flex tw-items-center tw-justify-center tw-p-3 tw-absolute -tw-top-[25px] -tw-right-[25px] tw-bg-white tw-border-2 tw-border-[#E7F0FA]"
                            data-bs-dismiss="modal" aria-label="Close">
                            <x-svg.modal-cross-icon />
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Resume edit modal --}}
    <div class="modal fade" id="resumeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog tw-max-w-[536px]">
            <div class="modal-content">
                <form action="{{ route('candidate.resume.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="resume_id" id="resume_id_input">
                    <div class="modal-body">
                        <h5 class="tw-text-lg tw-text-[#18191C] tw-font-semibold tw-mb-[18px]" id="cvModalLabel">
                            {{ __('update_cv_resume') }}</h5>
                        <div class="from-group py-2">
                            <x-forms.label name="cv_resume_name" :required="false"
                                class="tw-mb-2 tw-text-sm tw-text-[#18191C]" />
                            <input type="text" name="resume_name" id="resume_name_input">
                            @error('is_remote')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group tw-mb-6">
                            <x-forms.label name="upload_cv_resume" class="tw-mb-2 tw-text-sm tw-text-[#18191C]" :required="false"/>
                            <div class="cv-image-upload-wrap">
                                <input name="resume_file" class="resume-file-upload-input" type="file"
                                    onchange="resumeManageReadURL(this, 'edit');" accept="application/pdf"
                                    id="resume_edit_input" />
                                <div class="drag-text">
                                    <x-svg.upload-icon />
                                    <h3>{{ __('change_file') }}</h3>
                                    <p>{{ __('current_resume_size') }}: <span id="resume_file_size"></span></p>
                                </div>
                            </div>
                            <div class="resume-file-upload-content none ">
                                <div class="wrap">
                                    <x-svg.file-icon2 />
                                    <h3 class="resume_selected_file_name">file</h3>
                                    <p>
                                        <span><span class="resume_selected_file_size">2.3</span> MB</span> <br>
                                        <span class="resume_selected_file_type">.pdf</span>
                                    </p>
                                    <div class="image-title-wrap">
                                        <button type="button" class="cv-remove-image">
                                            <x-svg.trash-icon />
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tw-flex tw-justify-between">
                            <button type="button" class="bg-priamry-50 btn btn-primary-50" data-bs-dismiss="modal"
                                aria-label="Close">{{ __('cancel') }}</button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-right"><i class="ph-arrow-right"></i></span>
                                    <span class="button-text">
                                        {{ __('add_cv_resume') }}
                                    </span>
                                </span>
                            </button>
                        </div>
                        <button type="button"
                            class="tw-rounded-full tw-flex tw-items-center tw-justify-center tw-p-3 tw-absolute -tw-top-[25px] -tw-right-[25px] tw-bg-white tw-border-2 tw-border-[#E7F0FA]"
                            data-bs-dismiss="modal" aria-label="Close">
                            <x-svg.modal-cross-icon />
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('frontend_links')
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap-datepicker.min.css">
    <!-- >=>Leaflet Map<=< -->
    <x-map.leaflet.map_links />
    <x-map.leaflet.autocomplete_links />

    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }

        .w-100-percent {
            width: 100% !important;
        }

        #jobrole #basic-addon1 {
            width: 50px !important;
            margin-left: 28px !important;
        }

        .border-cutom {
            border-radius: 5px 0 0 5px !important;
        }

        .input-group-text-custom {
            max-height: 48px;
            padding: 12px;
            background-color: #e9ecef;
            border-radius: 0 5px 5px 0;
        }

        .has-badge-cutom {
            top: 34% !important;
        }
    </style>

    <!-- >=>Mapbox<=< -->
    @include('map::links')
    <!-- >=>Mapbox<=< -->
    <style>
        .mymap {
            border-radius: 12px;
            z-index: 999;
        }
    </style>
@endsection

@section('frontend_scripts')
    <script src="{{ asset('frontend/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend') }}/assets/js/ckeditor.min.js"></script>
    <script>
        //init datepicker
        $("#available_id_date").attr("autocomplete", "off");

        availableStatus('{{ old('status', $candidate->status) }}');

        $('#available_status').on('change', function() {
            availableStatus(this.value);
        });

        function availableStatus(status) {
            if (status == 'available_in') {
                $('#available_in_status').removeClass('d-none');
            } else {
                $('#available_in_status').addClass('d-none');
            }
        }


        function UploadMode(param) {
            if (param === 'photo') {
                $('#photo-uploadMode').removeClass('d-none');
                $('#photo-oldMode').addClass('d-none');
            } else {
                $('#banner-uploadMode').removeClass('d-none');
                $('#banner-oldMode').addClass('d-none');
            }
        }
        //init datepicker
        $("#date").attr("autocomplete", "off");
        //init datepicker
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#default'))
            .catch(error => {
                console.error(error);
            });
        $('#visibility').on('change', function() {
            $(this).submit();
        });
        $('#alert').on('change', function() {
            $(this).submit();
        });

        function AccountDelete() {
            if (confirm("Are you sure ??") == true) {
                $('#AccountDelete').submit();
            } else {
                return false;
            }
        }

        function resumeDelete() {
            if (confirm("Are you sure ?") == true) {
                $('#resumeForm').submit();
            } else {
                return false;
            }
        }

        function editResume(id, name, size) {
            $('#resume_id_input').val(id);
            $('#resume_name_input').val(name);
            $('#resume_file_size').html(size);
            $('#resumeEditModal').modal('show');
        }
        $('.cv-remove-image').on('click', function() {
            $('.resume-file-upload-input').replaceWith($('.resume-file-upload-input').clone());
            $('.resume-file-upload-content').hide();
            $('.cv-image-upload-wrap').show();
            $('.resume-file-upload-input').val('');
        })

        function resumeManageReadURL(input, type) {
            if (type == 'add') {
                var fileName = document.querySelector('#resume_add_input').files[0].name;
                var fileSize = document.querySelector('#resume_add_input').files[0].size / 1024 / 1024;
                var fileType = document.querySelector('#resume_add_input').files[0].type;
            } else {
                var fileName = document.querySelector('#resume_edit_input').files[0].name;
                var fileSize = document.querySelector('#resume_edit_input').files[0].size / 1024 / 1024;
                var fileType = document.querySelector('#resume_edit_input').files[0].type;
            }
            $('.resume_selected_file_name').html(fileName);
            $('.resume_selected_file_size').html(fileSize.toFixed(4));
            $('.resume_selected_file_type').html(fileType);
            if (input.files && input.files[0]) {
                console.log(input.className)
                var reader = new FileReader();
                reader.onload = function(e) {
                    if (input.className === 'profile-file-upload-input') {
                        $('.profile-image-upload-wrap').hide();
                        $('.profile-file-upload-image').attr('src', e.target.result);
                        $('.profile-file-upload-content').show();
                        // $('.image-title').html(input.files[0].name);
                    }
                    if (input.className === 'banner-file-upload-input') {
                        $('.banner-image-upload-wrap').hide();
                        $('.banner-file-upload-image').attr('src', e.target.result);
                        $('.banner-file-upload-content').show();
                        // $('.image-title').html(input.files[0].name);
                    }
                    if (input.className === 'resume-file-upload-input') {
                        $('.cv-image-upload-wrap').hide();
                        $('.resume-file-upload-content.none').show();
                    }
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.profile-remove-image').on('click', function() {
                    // console.log(this.className)
                    $('.profile-file-upload-input').replaceWith($('.profile-file-upload-input').clone());
                    $('.profile-file-upload-content').hide();
                    $('.profile-file-upload-image').attr('src', '');
                    $('.profile-image-upload-wrap').show();
                })
                $('.banner-remove-image').on('click', function() {
                    // console.log(this.className)
                    $('.banner-file-upload-input').replaceWith($('.banner-file-upload-input').clone());
                    $('.banner-file-upload-content').hide();
                    $('.banner-file-upload-image').attr('src', '');
                    $('.banner-image-upload-wrap').show();
                })
            }
        }
        setTimeout(function() {
            {{ session()->forget('type') }}
        }, 10000);
    </script>

    {{-- Leaflet  --}}
    @include('map::set-edit-leafletmap', ['lat' => $candidate->lat, 'long' => $candidate->long])

    <!-- >=>Mapbox<=< -->
    @include('map::scripts')
    <!--=============== map box ===============-->
    <x-website.map.map-box-check />
    <script>
        var country_code = '{{ current_country_code() }}'
        var token = "{{ $setting->map_box_key }}";
        mapboxgl.accessToken = token;
        const coordinates = document.getElementById('coordinates');
        var oldlat = "{!! $candidate->lat ? $candidate->lat : setting('default_lat') !!}";
        var oldlng = "{!! $candidate->long ? $candidate->long : setting('default_long') !!}";
        const map = new mapboxgl.Map({
            container: 'map-box',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [oldlng, oldlat],
            zoom: 6
        });
        // Add the control to the map.
        map.addControl(
            new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl,
                marker: false,
                countries: country_code ? country_code : ''
            })
        );
        // Add the control to the map.
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            marker: {
                color: 'orange',
                draggable: true
            },
            mapboxgl: mapboxgl
        });
        var marker = new mapboxgl.Marker({
                draggable: true
            }).setLngLat([oldlng, oldlat])
            .addTo(map);

        function onDragEnd() {
            const lngLat = marker.getLngLat();
            let lat = lngLat.lat;
            let lng = lngLat.lng;
            axios.get(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${lng},${lat}.json?&types=address,neighborhood,locality,place,district,postcode,region,country&access_token=${token}`
                )
                .then((res) => {
                    var form = new FormData();
                    form.append('lat', lat);
                    form.append('lng', lng);
                    for (let i = 0; i < res.data.features.length; i++) {
                        form.append(res.data.features[i].place_type[0], res.data.features[i].text);
                    }
                    axios.post(
                            '/set/session', form
                        )
                        .then((res) => {
                            // console.log(res.data);
                            // toastr.success("Location Saved", 'Success!');
                        })
                        .catch((e) => {
                            toastr.error("Something Wrong", 'Error!');
                        });
                })
                .catch((e) => {
                    // toastr.error("Something Wrong", 'Error!');
                });
        }

        function add_marker(event) {
            var coordinates = event.lngLat;
            marker.setLngLat(coordinates).addTo(map);
        }
        map.on('style.load', function() {
            map.on('click', function(e) {
                var coordinates = e.lngLat;
                let lat = parseFloat(coordinates.lat);
                let lng = parseFloat(coordinates.lng);
                axios.get(
                        `https://api.mapbox.com/geocoding/v5/mapbox.places/${lng},${lat}.json?&types=address,neighborhood,locality,place,district,postcode,region,country&access_token=${token}`
                    )
                    .then((res) => {
                        var form = new FormData();
                        form.append('lat', lat);
                        form.append('lng', lng);
                        for (let i = 0; i < res.data.features.length; i++) {
                            form.append(res.data.features[i].place_type[0], res.data.features[i].text);
                        }
                        axios.post(
                                '/set/session', form
                            )
                            .then((res) => {
                                // console.log(res.data);
                                // toastr.success("Location Saved", 'Success!');
                            })
                            .catch((e) => {
                                toastr.error("Something Wrong", 'Error!');
                            });
                    })
                    .catch((e) => {
                        // toastr.error("Something Wrong", 'Error!');
                    });
            });
        });
        map.on('click', add_marker);
        marker.on('dragend', onDragEnd);
        // zoom in and out
        <
        x - mapbox - zoom - control / >
    </script>
    <script>
        $('.mapboxgl-ctrl-logo').addClass('d-none');
        $('.mapboxgl-compact').addClass('d-none');
        $('.mapboxgl-ctrl-attrib-inner').addClass('d-none');
    </script>
    <!-- ============== map box ============= -->
    <!-- ============== google map ========= -->
    <x-website.map.google-map-check />
    <script>
        function initMap() {
            var token = "{{ $setting->google_map_key }}";
            var oldlat = {!! $candidate->lat ? $candidate->lat : setting('default_lat') !!};
            var oldlng = {!! $candidate->long ? $candidate->long : setting('default_long') !!};
            const map = new google.maps.Map(document.getElementById("google-map"), {
                zoom: 7,
                center: {
                    lat: oldlat,
                    lng: oldlng
                },
            });
            const image =
                "https://gisgeography.com/wp-content/uploads/2018/01/map-marker-3-116x200.png";
            const beachMarker = new google.maps.Marker({
                draggable: true,
                position: {
                    lat: oldlat,
                    lng: oldlng
                },
                map,
                // icon: image
            });
            google.maps.event.addListener(map, 'click',
                function(event) {
                    pos = event.latLng
                    beachMarker.setPosition(pos);
                    let lat = beachMarker.position.lat();
                    let lng = beachMarker.position.lng();
                    axios.post(
                        `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=${token}`
                    ).then((data) => {
                        if (data.data.error_message) {
                            toastr.error(data.data.error_message, 'Error!');
                            toastr.error('Your location is not set because of a wrong API key.', 'Error!');
                        }

                        const total = data.data.results.length;
                        let amount = '';
                        if (total > 1) {
                            amount = total - 2;
                        }
                        const result = data.data.results.slice(amount);
                        let country = '';
                        let region = '';
                        for (let index = 0; index < result.length; index++) {
                            const element = result[index];
                            if (element.types[0] == 'country') {
                                country = element.formatted_address;
                            }
                            if (element.types[0] == 'administrative_area_level_1') {
                                const str = element.formatted_address;
                                const first = str.split(',').shift()
                                region = first;
                            }
                        }
                        var form = new FormData();
                        form.append('lat', lat);
                        form.append('lng', lng);
                        form.append('country', country);
                        form.append('region', region);
                        axios.post(
                                '/set/session', form
                            )
                            .then((res) => {
                                // console.log(res.data);
                                // toastr.success("Location Saved", 'Success!');
                            })
                            .catch((e) => {
                                toastr.error("Something Wrong", 'Error!');
                            });
                    })
                });
            google.maps.event.addListener(beachMarker, 'dragend',
                function() {
                    let lat = beachMarker.position.lat();
                    let lng = beachMarker.position.lng();
                    axios.post(
                        `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=${token}`
                    ).then((data) => {
                        if (data.data.error_message) {
                            toastr.error(data.data.error_message, 'Error!');
                            toastr.error('Your location is not set because of a wrong API key.', 'Error!');
                        }

                        const total = data.data.results.length;
                        let amount = '';
                        if (total > 1) {
                            amount = total - 2;
                        }
                        const result = data.data.results.slice(amount);
                        let country = '';
                        let region = '';
                        for (let index = 0; index < result.length; index++) {
                            const element = result[index];
                            if (element.types[0] == 'country') {
                                country = element.formatted_address;
                            }
                            if (element.types[0] == 'administrative_area_level_1') {
                                const str = element.formatted_address;
                                const first = str.split(' ').shift()
                                region = first;
                            }
                        }
                        var form = new FormData();
                        form.append('lat', lat);
                        form.append('lng', lng);
                        form.append('country', country);
                        form.append('region', region);
                        axios.post(
                                '/set/session', form
                            )
                            .then((res) => {
                                // console.log(res.data);
                                // toastr.success("Location Saved", 'Success!');
                            })
                            .catch((e) => {
                                toastr.error("Something Wrong", 'Error!');
                            });
                    })
                });
            // Search
            var input = document.getElementById('searchInput');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            let country_code = '{{ current_country_code() }}';
            if (country_code) {
                var options = {
                    componentRestrictions: {
                        country: country_code
                    }
                };
                var autocomplete = new google.maps.places.Autocomplete(input, options);
            } else {
                var autocomplete = new google.maps.places.Autocomplete(input);
            }

            autocomplete.bindTo('bounds', map);
            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });
            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
            });
        }
        window.initMap = initMap;
    </script>
    <script>
        @php
            $link1 = 'https://maps.googleapis.com/maps/api/js?key=';
            $link2 = $setting->google_map_key;
            $Link3 = '&callback=initMap&libraries=places,geometry';
            $scr = $link1 . $link2 . $Link3;
        @endphp;
    </script>
    <script src="{{ $scr }}" async defer></script>
    <!-- =============== google map ========= -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("[data-toggle=tooltip]").tooltip()
        })
    </script>
    <!-- >=>Mapbox<=< -->
    <script>
        $('#pills-setting-tab').on('click', function() {
            setTimeout(() => {
                map.resize();
                leaflet_map.invalidateSize(true);
            }, 200);
        })
    </script>
    <script type="text/javascript">
        // feature field
        function add_features_field() {
            $("#multiple_feature_part").append(`
        <div class="col-12 custom-select-padding">
            <div class="d-flex">
                <div class="d-flex mborder">
                    <div class="position-relative">
                        <select
                            class="w-100-p border-0 rt-selectactive form-control" name="social_media[]">
                            <option value="" class="d-none" disabled selected>{{ __('select_one') }}</option>
                            <option value="facebook">{{ __('facebook') }}</option>
                            <option value="twitter">{{ __('twitter') }}</option>
                            <option value="instagram">{{ __('instagram') }}</option>
                            <option value="youtube">{{ __('youtube') }}</option>
                            <option value="linkedin">{{ __('linkedin') }}</option>
                            <option value="pinterest">{{ __('pinterest') }}</option>
                            <option value="reddit">{{ __('reddit') }}</option>
                            <option value="github">{{ __('github') }}</option>
                            <option value="other">{{ __('other') }}</option>
                        </select>
                    </div>
                    <div class="w-100">
                        <input class="border-0" type="url" name="url[]" id="" placeholder="{{ __('profile_link_url') }}...">
                    </div>
                </div>
                <div class="ms-2">
                    <button class="btn tw-bg-[#F1F2F4] tw-p-[13px]" type="button" id="remove_item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#18191C" stroke-width="1.5" stroke-miterlimit="10"/>
                            <path d="M15 9L9 15" stroke="#18191C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 15L9 9" stroke="#18191C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    `);
            $(".rt-selectactive").select2({ // minimumResultsForSearch: Infinity,
            });
        }
        $(document).on("click", "#remove_item", function() {
            $(this).parent().parent().parent('div').remove();
        });
    </script>

    <script>
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
                    else{
                        $("#ward_div").addClass('d-none'); 
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
                        $("#pourosova_union_porishod_parmanent").val($("#pourosova_union_porishod").val())
                            .trigger("change");
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
                    else{
                        $("#parmanent_ward_div").addClass('d-none'); 
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
    </script>
@endsection
