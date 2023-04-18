@extends('website.layouts.app')

@section('title', __('job applications'))

@section('main')
    <div class="dashboard-wrapper">
        <div class="container">
            <div class="row">
                <x-website.company.sidebar />
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard-right-header">
                            <div class="left-text">
                                <h5>{{ __('job_title') }}, {{ Str::limit($job->title, 36, '...') }}</h5>
                            </div>
                            <span class="sidebar-open-nav">
                                <i class="ph-list"></i>
                            </span>
                        </div>

                        <div class="recently-applied-wrap d-flex justify-content-between align-items-center rt-mb-15">
                            <h3 class="f-size-16">{{ __('applications') }}</h3>
                        </div>

                        <div class="db-job-card-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ __('candidate') }}</th>
                                        <th>{{ __('profession') }}</th>
                                        <th>{{ __('experience') }}</th>
                                        <th>{{ __('action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($appliedJobs->count() > 0)
                                        @foreach ($appliedJobs as $applied)
                                            {{-- @dd($applied->shortlists) --}}
                                            {{-- @dd($applied->job->company->id) --}}
                                            <tr>
                                                <td>
                                                    <a href="{{ route('company.applications.sms') }}">
                                                        {{ $applied->candidate->user->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $applied->candidate->profession->name ?? "" }}
                                                </td>
                                                <td>
                                                    {{ $applied->candidate->experience->name ?? "" }}
                                                </td>
                                                <td>
                                                    <div class="db-job-btn-wrap d-flex justify-content-end">
                                                        @if (!$applied->short_listed)
                                                            <a href="{{ route('company.shortlist.candidte', ['company_id' => $applied->job->company->id, 'applied_job_id' => $applied->id]) }}"
                                                                class="btn bg-gray-50 text-primary-500 rt-mr-8">
                                                                <span class="button-text">
                                                                    {{ __('short_list') }}
                                                                </span>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('company.remove.shortlist.candidte', $applied->id) }}" class="rt-mr-8 disabled">
                                                                <span class="text-secondary">
                                                                    Unsort
                                                                </span>
                                                            </a>
                                                            {{-- <a href="#"
                                                                class="ms-2 d-flex align-items-center sms_send_btn" application-id="{{ $applied->id }}">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z"
                                                                        stroke="#0A65CC" stroke-width="1.5"
                                                                        stroke-miterlimit="10" />
                                                                    <path d="M6.875 10H13.125" stroke="#0A65CC"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M10 6.875V13.125" stroke="#0A65CC"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                                {{ __('Send SMS') }}
                                                            </a> --}}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <x-svg.not-found-icon />
                                                <p class="mt-4">{{ __('no_data_found') }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-footer text-center body-font-4 text-gray-500">
            <x-website.footer-copyright />
        </div>
    </div>
@endsection
@section('script')
<script>
    $(".sms_send_btn").on("click", function(e){
        let application_id= $(this).attr("application-id");
        // console.log(application_id);
        $.ajax({
            type: "get",
            url: "/company/send-interview-sms/"+application_id,
            dataType: "json",
            success: function (response) {
                if(response ==1){
                    Swal.fire('SMS Sent for interview')
                }
                else{
                    Swal.fire('Failed to send SMS!')
                }
            }
        });
        e.preventDefault();

    })
</script>
@endsection
