@extends('website.layouts.app')

@section('title', __('Job Applications'))

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
                            <h3 class="f-size-16 w-25">{{ __('applications') }}</h3>
                            <button type="button" id="message-button" class="btn btn-sm btn-info"><i
                                    class="ph ph-chat"></i> Send Message</button>
                            <select name="application-filter" id="application-filter" class="w-50">
                                <option value="">Please Select</option>
                                @foreach ($application_states as $key => $value)
                                    <option value="{{ $key }}"
                                        {{ $filter != null && $filter == $key ? 'selected' : '' }}>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="db-job-card-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" class="form-check-input" style="width: 1.5em; height: 1.5em;"></th>
                                        <th>{{ __('candidate') }}</th>
                                        <th>{{ __('profession') }}</th>
                                        <th>{{ __('experience') }}</th>
                                        <th>{{ __('Download CV') }}</th>
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
                                                    <input type="checkbox" name="selected_candidates[]"
                                                        class="form-check-input checkbox" style="width: 1.5em; height: 1.5em;"
                                                        value="{{ $applied->candidate->user_id }}">
                                                </td>
                                                <td>
                                                    <a href="{{ route('company.applications.candidate.show', $applied->candidate_id) }}">
                                                        {{ $applied->candidate->user->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $applied->candidate->profession->name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $applied->candidate->experience->name ?? '' }}
                                                </td>
                                                <td>
                                                    @foreach ($applied->candidate->resumes as $item)
                                                        <a href="{{ asset($item->file) }}" class="m-1 text-danger" title="{{ $item->name }}"><i class="ph ph-file-pdf"></i></a>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('company.change.application.status', $applied->id) }}"
                                                        id="application-{{ $applied->id }}" method="post"
                                                        onchange="this.submit()">
                                                        @csrf
                                                        <select name="application_state-{{ $applied->id }}"
                                                            id="application_state-{{ $applied->id }}">
                                                            @foreach ($application_states as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $applied->short_listed ? 'selected' : '' }}>
                                                                    {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
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

    <!-- Send SMS modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-transparent">
                    <h5 class="modal-title" id="messageModalLabel">Send Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('company.applications.send.custom.message') }}" method="POST" id="messageForm">
                    @csrf
                    <div class="modal-body mt-3">
                        <input type="hidden" name="applicants" id="applicants">
                        <div class="from-group">
                            <label for="">Message Type: </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="message_type" id="sms"
                                    value="sms" checked>
                                <label class="form-check-label" for="sms">SMS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="message_type" id="email"
                                    value="email">
                                <label class="form-check-label" for="email">Email</label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <x-forms.label name="message_content" :required="true" />
                            <textarea class="form-control @error('message_content') is-invalid @enderror" name="message_content"
                                id="message_content" rows="7" required>অভিনন্দন, আপনি ইন্টারভিউয়ের জন্য নির্বাচিত হয়েছেন, আপনার জন্য শুভ কামনা।</textarea>
                            @error('message_content')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer border-transparent">
                        <button type="button" class="bg-priamry-50 btn btn-outline-primary" data-bs-dismiss="modal"
                            aria-label="Close">{{ __('cancel') }}</button>
                        <button type="button" id="send_message" class="btn btn-primary btn-lg">
                            <span class="button-content-wrapper ">
                                <span class="button-icon align-icon-right"><i class="ph-arrow-right"></i></span>
                                <span class="button-text">
                                    {{ __('send_message') }}
                                </span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add resume modal -->
        <x-website.candidate.add-resume-modal />
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

        $("#select_all").on("click", function(){
            $('input:checkbox').prop('checked', this.checked);
        })
    </script>
@endsection
