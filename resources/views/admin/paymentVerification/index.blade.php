<?php //echo "<pre>";print_r($filter);die;
    ?>
    @extends('admin.layouts.app')
    @section('title')
        {{ __('payment_verification_list') }}
    @endsection
    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title line-height-36">{{ __('payment_verification_list') }}</h3>
                            <div>
                                @if (userCan('candidate.create'))
                                    <a href="{{ route('payment.verification.create') }}" class="btn bg-primary"><i
                                            class="fas fa-plus mr-1"></i> {{ __('create') }}
                                    </a>
                                @endif
                                {{-- @if (request('keyword') || request('ev_status') || request('sort_by'))
                                    <a href="{{ route('company.index') }}" class="btn bg-danger"><i
                                            class="fas fa-times"></i>&nbsp; {{ __('clear') }}
                                    </a>
                                @endif
                                <button type="button" class="btn btn-danger" id="pdfButton">PDF</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- Table  --}}
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('phone') }}</th>
                                    <th width="10%">{{ __('status') }}</th>
                                    <th>{{ __('date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @if ($payments->count() > 0)
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td class="text-center" tabindex="0">
                                                @if (isset($payment->user->name))
                                                    {{ $payment->user->name }}
                                                @else
                                                    <span class="text-danger">Candidate not found</span>
                                                @endif
                                            </td>
                                            <td class="text-center" tabindex="0">
                                                {{ $payment->user->phone ?? "" }}
                                            </td>
                                            <td class="text-center" tabindex="0">
                                                @if($payment->status ==1 )
                                                    <span class="badge badge-sm badge-success">Verified</span>
                                                @else
                                                <span class="badge badge-sm badge-danger">Not verified</span>
                                                @endif
                                            </td>
                                            <td class="text-center" tabindex="0">
                                                {{ $payment->created_at ?? "" }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="8">
                                            {{ __('no_data_found') }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if ($payments->count())
                            <div class="mt-3 d-flex justify-content-center">
                                {{ $payments->onEachSide(1)->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
    
    @section('style')
        <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
       
    @endsection
    
    @section('script')
        <script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    @endsection
    