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
                                                        <td style="">{{ ucwords($candidate->gender) }}</td>
                                                    </tr>
                                    
                                                    <tr style="padding: 0px; margin: 0px">
                                                        <td style="  width: 30%">Religion</td>
                                                        <td style="">{{ ucwords($candidate->religion) }}</td>
                                                    </tr>
                                    
                                                    <tr style="padding: 0px; margin: 0px">
                                                        <td style="  width: 30%">Quota</td>
                                                        <td style="">{{ ucwords($candidate->quota) }}</td>
                                                    </tr>
                                    
                                                    <tr style="padding: 0px; margin: 0px">
                                                        <td style="  width: 30%">Home District</td>
                                                        <td style="">{{ ucwords($candidate->district_parmanents->nameEn) }}</td>
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
                                                        <td style="">{{ $candidate->nid_no }}</td>
                                                        <td style="">Passport ID</td>
                                                        <td style="">{{ $candidate->passport_no ?? "N/A" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="">Birth Registration</td>
                                                        <td style="">{{ $candidate->birth_certificate_no ?? "N/A" }}</td>
                                                        <td style="">Marital Status</td>
                                                        <td style="">{{ ucwords($candidate->marital_status) }}</td>
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
                                                        <th style="width: 25%">Mailing/Present Address</th>
                                                        <th style="width: 25%"></th>
                                                        <th style="width: 25%">Permanent Address</th>
                                                        <th style="width: 25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Care of: </td>
                                                        <td>{{ $candidate->care_of }}</td>
                                                        <td>Care of: </td>
                                                        <td>{{ $candidate->care_of_parmanent }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Village/Town/Road/House/Flat:</td>
                                                        <td>{{ $candidate->place }}</td>
                                                        <td>Village/Town/Road/House/Flat:</td>
                                                        <td>{{ $candidate->place_parmanent }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Present Post Office:</td>
                                                        <td>{{ $candidate->post_office }}</td>
                                                        <td>Permanent Post Office:</td>
                                                        <td>{{ $candidate->post_office_parmanent }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Present Post Code:</td>
                                                        <td>{{ $candidate->postcode }}</td>
                                                        <td>Permanent Post Code:</td>
                                                        <td>{{ $candidate->postcode_parmanent }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Present Upazila/Thana:</td>
                                                        <td>{{ $candidate->thanas->nameEn }}</td>
                                                        <td>Permanent Upazila/Thana:</td>
                                                        <td>{{ $candidate->thana_parmanents->nameEn }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Present District:</td>
                                                        <td>{{ $candidate->districts->nameEn }}</td>
                                                        <td>Permanent District:</td>
                                                        <td>{{ $candidate->district_parmanents->nameEn }}</td>
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
                                                        <th>Board/Institute</th>
                                                        <th>Group/Subject/Degree</th>
                                                        <th>Result</th>
                                                        <th>Roll</th>
                                                        <th>Year</th>
                                                        <th>Duration</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (count($candidate->educations) > 0)
                                                        @foreach ($candidate->educations as $education)
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
                                                                <td>{{ __($education->level) ?? '' }}</td>
                                                                <td>{{ $board ?? 'N/A' }}</td>
                                                                @if ($education->subject)
                                                                    @php
                                                                        $subject = \App\Models\Subject::where('code', $education->subject)
                                                                            ->pluck('name')
                                                                            ->first();
                                                                    @endphp
                                                                @endif
                                                                <td>{{ $education->group ? $education->group : ($education->subject ? $subject : ($education->degree ? $education->degree : '')) }}
                                                                </td>
                                                                <td>{{ $education->result_gpa ?? 'N/A' }}</td>
                                                                <td>{{ $education->roll ?? 'N/A' }}</td>
                                                                <td>{{ $education->year ?? 'N/A' }}</td>
                                                                <td>{{ $education->course_duration ?? 'N/A' }}</td>
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
                                                        <th> Post Name </th>
                                                        <th>Responsibilities </th>
                                                        <th>Start Date </th>
                                                        <th>End Date</th>
                                                        <th>Total Experience </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($candidate->experiences) > 0)
                                                        @foreach ($candidate->experiences as $experience)
                                                            @php
                                                                $d1 = new DateTime($experience->start);
                                                                $d2 = new DateTime($experience->end);
                                                                // @link http://www.php.net/manual/en/class.dateinterval.php
                                                                $interval = $d2->diff($d1);
                                                                
                                                                $diff = $interval->format('%y Years %m Months');
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $experience->company ?? 'N/A' }}</td>
                                                                <td>{{ $experience->designation ?? 'N/A' }}</td>
                                                                <td>{{ $experience->responsibilities ?? 'N/A' }}</td>
                                                                <td>{{ $experience->start ?? 'N/A' }}</td>
                                                                <td>{{ $experience->end ?? 'N/A' }}</td>
                                                                <td>{{ $diff ?? 'N/A' }}</td>
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
