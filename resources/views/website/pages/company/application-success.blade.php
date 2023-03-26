@extends('website.layouts.app')

@section('title')
    {{ __('Application Form') }}
@endsection

@section('main')
    <div class="dashboard-wrapper">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-success">Congratulations! You have successfully applied to the job</h4>
                        <a target="_blank" class="btn btn-info m-2 btn-xs" href="{{ route('website.download.application.form', $job->id) }}">
                            Download Applicant Copy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
