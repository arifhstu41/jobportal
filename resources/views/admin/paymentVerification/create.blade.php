@extends('admin.layouts.app')
@section('title')
    {{ __('create_role') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title line-height-36">{{ __('create') }}</h3>
                        <a href="{{ route('payment.verification') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-left mr-1"></i> 
                            {{ __('back') }}
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form role="form" action="{{ route('payment.verification.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <x-forms.label name="phone" />

                                        <input name="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" id="phone"
                                            placeholder="{{ __('phone') }}" value="{{ old('phone') }}"> 
                                        @error('phone')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success mr-1"><i class="fa fa-plus"></i>
                                            {{ __('save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
