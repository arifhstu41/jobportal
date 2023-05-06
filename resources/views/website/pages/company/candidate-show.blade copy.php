@extends('website.layouts.app')

@section('title', __('Candidate Details'))

@section('main')
    <div class="dashboard-wrapper">
        <div class="container">
            <div class="row">
                <div class="row">
                    <x-website.company.sidebar />
                    <div class="col-lg-9">
                        <div class="dashboard-right">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header  d-flex justify-content-between">
                                        <h3 class="card-title line-height-36">
                                            {{ __('details') }}
                                        </h3>
                                        <a href="{{ url()->previous() }}"
                                            class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                                            <i class="fas fa-arrow-left"></i>
                                            &nbsp; {{ __('back') }}
                                        </a>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-4 text-center">
                                            <img src="{{ asset($candidate->photo) }}" alt="image" class="image-fluid"
                                                height="350px" width="350px">
                                        </div>
                                        <div class="col-md-8">
                                            <table id="datatable-responsive"
                                                class="ml-1 table table-striped     table-bordered dt-responsive nowrap"
                                                cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr class="">
                                                        <th width="30%">{{ __('name') }}</th>
                                                        <td width="70%">{{ $user->name }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <th width="30%">Candidate Name(বাংলা)</th>
                                                        <td width="70%">{{ $user->candidate->name_bn }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <th width="30%">Father's Name</th>
                                                        <td width="70%">{{ $user->candidate->father_name }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <th width="30%">Father's Name(বাংলা)</th>
                                                        <td width="70%">{{ $user->candidate->father_name_bn }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <th width="30%">Mother's Name</th>
                                                        <td width="70%">{{ $user->candidate->mother_name }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <th width="30%">Mother's Name(বাংলা)</th>
                                                        <td width="70%">{{ $user->candidate->mother_name_bn }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <th width="30%">Date of Birth</th>
                                                        <td width="70%">
                                                            {{ date('Y-m-d', strtotime($user->candidate->birth_date)) }}
                                                        </td>
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
                                                    <tr class="mb-1">
                                                        <th width="20%">NID No</th>
                                                        <td width="30%">{{ $user->candidate->nid_no }}</td>
                                                        <th width="20%">Contact No</th>
                                                        <td width="30%">{{ $user->phone }}</td>
                                                    </tr>
                                                    <tr class="mb-1">
                                                        <th width="20%">Gender</th>
                                                        <td width="30%">{{ $user->candidate->gender }}</td>
                                                        <th width="20%">Marital Status</th>
                                                        <td width="30%">{{ $user->candidate->marital_status }}</td>
                                                    </tr>
                                                    <tr class="mb-1">
                                                        <th width="20%">Religion</th>
                                                        <td width="30%">{{ $user->candidate->religion }}</td>
                                                        <th width="20%">Quota</th>
                                                        <td width="30%">{{ $user->candidate->quota }}</td>
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
                                                <thead>
                                                    <tr>
                                                        <th>Present Address</th>
                                                        <th>Permanent Address</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="mb-1">
                                                        <td>
                                                            <p>Care of: <span>{{ $user->candidate->care_of }}</span></p>
                                                            <p>Village/Tow: <span>{{ $user->candidate->place }}</span></p>
                                                            <p>Post Office:
                                                                <span>{{ $user->candidate->post_office }}</span></p>
                                                            <p>Post Code: <span>{{ $user->candidate->postcode }}</span></p>
                                                            <p>Upazila/Thana:
                                                                <span>{{ $user->candidate->thanas->name ?? '' }}</span></p>
                                                            <p>District:
                                                                <span>{{ $user->candidate->districts->name ?? '' }}</span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p>Care of:
                                                                <span>{{ $user->candidate->care_of_parmanent }}</span></p>
                                                            <p>Village/Tow:
                                                                <span>{{ $user->candidate->place_parmanent }}</span></p>
                                                            <p>Post Office:
                                                                <span>{{ $user->candidate->post_office_parmanent }}</span>
                                                            </p>
                                                            <p>Post Code:
                                                                <span>{{ $user->candidate->postcode_parmanent }}</span></p>
                                                            <p>Upazila/Thana:
                                                                <span>{{ $user->candidate->thana_parmanents->name ?? '' }}</span>
                                                            </p>
                                                            <p>District:
                                                                <span>{{ $user->candidate->district_parmanents->name ?? '' }}</span>
                                                            </p>
                                                        </td>
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
                                                            <tr>
                                                                <td>{{ $education->level ?? '' }}</td>
                                                                <td>{{ $education->board ? $education->board : ($education->institute ? $education->institute : '') }}
                                                                </td>
                                                                <td>{{ $education->group ? $education->group : ($education->subject ? $education->subject : ($education->degree ? $education->degree : '')) }}
                                                                </td>
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

                                            <table class="ml-1 table table-striped     table-bordered dt-responsive nowrap"
                                                cellspacing="0" width="100%">
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
                                                <th width="25%">{{ __('title') }}</th>
                                                <th width="10%">{{ __('experience') }}</th>
                                                <th width="10%">{{ __('job_type') }}</th>
                                                <th width="10%">{{ __('deadline') }}</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".sms_send_btn").on("click", function(e) {
            let application_id = $(this).attr("application-id");
            // console.log(application_id);
            $.ajax({
                type: "get",
                url: "/company/send-interview-sms/" + application_id,
                dataType: "json",
                success: function(response) {
                    if (response == 1) {
                        Swal.fire('SMS Sent for interview')
                    } else {
                        Swal.fire('Failed to send SMS!')
                    }
                }
            });
            e.preventDefault();

        })
        $("#application-filter").on("change", function() {
            var urlParams = new URLSearchParams(window.location.search);
            let job = urlParams.get('job');
            let filter = $(this).val();
            let url = "{{ url()->current() }}" + "?job=" + job + "&filter=" + filter;
            // alert(url);
            window.location.href = url;
        })

        $("#message-button").on("click", function() {
            let selected_candidates = []
            $('.checkbox:checked').each(function() {
                selected_candidates.push(this.value);
            });
            if (!selected_candidates.length) {
                Swal.fire({
                    icon: 'warning',
                    text: 'Please select at least one candidate'
                });
            } else {
                $("#applicants").val(selected_candidates);
                $("#messageModal").modal('show');
            }
        })

        $("#send_message").on("click", function() {
            var text = $('#message_content').val();
            if (!text.length) {
                Swal.fire({
                    icon: 'warning',
                    text: 'Please write message content'
                });
            } else {
                $("#messageForm").submit();
            }

        })
    </script>
@endsection
