@extends('admin.layouts.app')
@section('title')
    {{ $user->name }} {{ __('details') }}
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title line-height-36">
                        {{ __('details') }}
                    </h3>
                    <a href="{{ route('candidate.index') }}"
                        class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-left"></i>
                        &nbsp; {{ __('back') }}
                    </a>
                </div>
                <div class="row m-2">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset($candidate->photo ?? 'backend/image/default.png') }}" alt="image" class="image-fluid"
                            height="350px" width="350px">
                    </div>
                    <div class="col-md-8">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <tbody>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Applicant's Name</td>
                                    <td style=""> {{ $candidate->user->name ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Applicant's
                                        Name (বাংলা)
                                    </td>
                                    <td style="">
                                        {{ $candidate->name_bn ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Father's Name
                                    </td>
                                    <td style="">
                                        {{ $candidate->father_name ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Father's Name
                                        (বাংলা)
                                    </td>
                                    <td style="">
                                        {{ $candidate->father_name_bn ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Mother's Name
                                    </td>
                                    <td style="">
                                        {{ $candidate->mother_name ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Mother's Name
                                        (বাংলা)
                                    </td>
                                    <td style="">
                                        {{ $candidate->mother_name_bn ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Date of Birth
                                    </td>
                                    <td style="">
                                        {{ $candidate->birth_date ? date('d M Y', strtotime($candidate->birth_date)) : '' }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Contact Mobile</td>
                                    <td style="">{{ $candidate->user->phone ?? '' }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">E-Mail</td>
                                    <td style="">{{ $candidate->user->email ?? '' }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Gender</td>
                                    <td style="">{{ ucwords($candidate->gender ?? "") }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Religion</td>
                                    <td style="">{{ ucwords($candidate->religion ?? "") }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Quota</td>
                                    <td style="">{{ ucwords($candidate->quota ?? "") }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Home District</td>
                                    <td style="">{{ ucwords($candidate->district_parmanents->nameEn ?? "") }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row m-2">
                    <div class="col-md-12">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="">National ID</td>
                                    <td style="">{{ $candidate->nid_no ?? "" }}</td>
                                    <td style="">Passport ID</td>
                                    <td style="">{{ $candidate->passport_no ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <td style="">Birth Registration</td>
                                    <td style="">{{ $candidate->birth_certificate_no ?? "N/A" }}</td>
                                    <td style="">Marital Status</td>
                                    <td style="">{{ ucwords($candidate->marital_status ?? "") }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row m-2">
                    <div class="col-md-12">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="mb-1">
                                    <td>
                                        <p>Care of: <span>{{ $user->candidate->care_of ?? ""}}</span></p>
                                        <p>Village/Tow: <span>{{ $user->candidate->place ?? ""}}</span></p>
                                        <p>Post Office: <span>{{ $user->candidate->post_office ?? ""}}</span></p>
                                        <p>Post Code: <span>{{ $user->candidate->postcode ?? ""}}</span></p>
                                        <p>Upazila/Thana: <span>{{ $user->candidate->thanas->nameEn ?? '' }}</span></p>
                                        <p>District: <span>{{ $user->candidate->districts->nameEn ?? '' }}</span></p>
                                    </td>
                                    <td>
                                        <p>Care of: <span>{{ $user->candidate->care_of_parmanent ?? ''}}</span></p>
                                        <p>Village/Tow: <span>{{ $user->candidate->place_parmanent ?? ''}}</span></p>
                                        <p>Post Office: <span>{{ $user->candidate->post_office_parmanent ?? ''}}</span></p>
                                        <p>Post Code: <span>{{ $user->candidate->postcode_parmanent ?? ''}}</span></p>
                                        <p>Upazila/Thana: <span>{{ $user->candidate->thana_parmanents->nameEn ?? '' }}</span></p>
                                        <p>District: <span>{{ $user->candidate->district_parmanents->nameEn ?? '' }}</span></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="row m-2">
                    <div class="col-md-12">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th colspan="7">Education Qualifications:</th>
                                </tr>
                                <tr>
                                    <th>Examination</th>
                                    <th>Board/Institude</th>
                                    <th>Group/Subject/Degree</th>
                                    <th>Result</th>
                                    <th>Year</th>
                                    <th>Role</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($user->candidate->educations) > 0)
                                    @foreach ($user->candidate->educations as $education)
                                    @php
                                        $board = $education->institute;
                                        if ($education->board) {
                                            $board = \DB::table('bd_education_boards')
                                                ->where('id', $education->board)
                                                ->pluck('name')
                                                ->first();
                                        }
                                    @endphp
                                        <tr>
                                            <td>{{ $education->level ?? '' }}</td>
                                            <td>{{ $board ?? 'N/A' }}</td>
                                            @if ($education->subject)
                                                @php
                                                    $subject = \App\Models\Subject::where('code', $education->subject)
                                                        ->pluck('name')
                                                        ->first();
                                                @endphp
                                            @endif
                                        <td>{{ $education->group ? $education->group : ($education->subject ? $subject : ($education->degree ? $education->degree : '')) }} </td>
                                            <td>{{ $education->result_gpa ?? '' }}</td>
                                            <td>{{ $education->year ?? '' }}</td>
                                            <td>{{ $education->roll ?? '' }}</td>
                                            <td>{{ $education->course_duration ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="row m-2">
                    <div class="col-md-12">

                        <table class="ml-1 table table-striped     table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th colspan="6">Professional Experience:</th>
                                </tr>
                                <tr>
                                    <th>Organization Name</th>
                                    <th>Post Name</th>
                                    <th>Responsibilities</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Experience</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($user->candidate->experiences) > 0)
                                    @foreach ($user->candidate->experiences as $experience)
                                        <tr>
                                            <td>{{ $experience->company ?? '' }}</td>
                                            <td>{{ $experience->designation ?? '' }}</td>
                                            <td>{{ $experience->responsibilities ?? '' }}</td>
                                            <td>{{ $experience->start ?? '' }}</td>
                                            <td>{{ $experience->end ?? '' }}</td>
                                            <td>#</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title line-height-36">
                        {{ __('location') }}
                    </h3>
                </div>
                <div class="card-body">
                    <x-website.map.map-warning/>

                    @php
                        $map = setting('default_map');
                    @endphp
                    @if ($map == 'map-box')
                        <div class="map mymap" id='map-box'></div>
                    @elseif ($map == 'google-map')
                        <div class="map mymap" id="google-map"></div>
                    @else
                        <div id="leaflet-map"></div>
                    @endif
                </div>
            </div> --}}
            {{-- <x-admin.candidate.card-component title="{{ __('applied_jobs') }}" :jobs="$appliedJobs"
                link="website.job.apply" />
                 --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title line-height-36">
                        {{ __('applied_jobs') }}
                    </h3>
                </div>
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th width="2%">#</th>
                            <th width="15%">{{ __('title') }}</th>
                            <th width="10%">{{ __('experience') }}</th>
                            <th width="10%">{{ __('job_type') }}</th>
                            <th width="10%">{{ __('deadline') }}</th>
                            {{-- <th width="10%">{{ __('status') }}</th> --}}
                            <th width="10%">{{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($appliedJobs->count() > 0)
                            @foreach ($appliedJobs as $job)
                                <tr>
                                    <td class="text-center" tabindex="0">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ $job->title }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ $job->experience ? $job->experience->name : '' }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ $job->job_type ? $job->job_type->name : '' }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ date('j F, Y', strtotime($job->deadline)) }}
                                    </td>
                                    {{-- <td class="text-center" tabindex="0">
                                        <div class="d-flex justify-content-center input-group-prepend">
                                            <button type="button"
                                                class="btn-sm btn-{{ $job->status == 'active' ? 'success' : ($job->status == 'pending' ? 'info' : 'danger') }} dropdown-toggle"
                                                data-toggle="dropdown">
                                                {{ __($job->status) }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('admin.job.status.change', $job->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="active">
                                                    <button type="submit" class="btn bg-white text-left w-100-p"><span
                                                            class="text-primary">{{ __('active') }}</span>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.job.status.change', $job->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="pending">
                                                    <button type="submit" class="btn bg-white text-left w-100-p"><span
                                                            class="text-primary">{{ __('pending') }}</span>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.job.status.change', $job->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="expired">
                                                    <button type="submit" class="btn bg-white text-left w-100-p"><span
                                                            class="text-primary">{{ __('expired') }}</span>
                                                    </button>
                                                </form>
                                            </ul>
                                        </div>
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('job.show', $job->id) }}" class="btn bg-info ml-1"><i
                                                class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ route($link, $job->slug) }}"
                                            onclick="return confirm('{{ __('are_you_sure_you_want_to_delete_this_item') }}');"
                                            class="d-inline btn btn-danger"><i class="fas fa-trash"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">{{ __('no_data_found') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <x-admin.candidate.card-component title="{{ __('bookmark_jobs') }}" :jobs="$bookmarkJobs"
                link="website.job.bookmark" />
        </div>
    </div>
@endsection


