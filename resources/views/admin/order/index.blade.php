@extends('admin.layouts.app')

@section('title')
    {{ __('orders') }}
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title line-height-36">{{ __('orders') }}</h3>
                            <div class="d-flex justify-content-between">
                                @if (request('company') || request('provider') || request('plan') || request('sort_by'))
                                <div>
                                    <a href="{{ route('order.index') }}"
                                        class="btn"><i
                                            class="fas fa-times"></i> &nbsp;{{ __('clear') }}
                                    </a>
                                </div>
                            @endif
                            <button type="button" class="btn btn-danger mx-3" id="pdfButton">PDF</button>
                            </div>
                        </div>
                    </div>
                    <form id="filterForm" action="{{ route('order.index') }}" method="GET">
                        @csrf
                        <div class="card-body border-bottom row">
                            <div class="col-2">
                                <label>{{ __('Select Payer') }}</label>
                                <select name="payer" class="form-control select2bs4 w-100-p">
                                    <option {{ request('payer') ? '' : 'selected' }} value="" selected>
                                        {{ __('all') }}
                                    </option>
                                    <option {{ request('payer') == 'candidate' ? 'selected' : '' }}
                                        value="candidate">{{ __('candidate') }}</option>
                                    <option {{ request('payer') == 'company' ? 'selected' : '' }}
                                        value="company">{{ __('company') }}</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label>{{ __('payment_provider') }}</label>
                                <select name="provider" id="filter" class="form-control w-100-p">
                                    <option {{ request('provider') == 'shurjopay' ? 'selected' : '' }} value="shurjopay">
                                        {{ __('shurjopay') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label>{{ __('From Date') }}</label>
                                <input type="text" name="from_date" id="from_date" value="{{ request('from_date') ? date('d-m-Y', strtotime(request('from_date'))) : '' }}" placeholder="Enter Date" class="form-control w-100-p">
                            </div>

                            <div class="col-2">
                                <label>{{ __('To Date') }}</label>
                                <input type="text" name="to_date" id="to_date" value="{{ request('to_date') ? date('d-m-Y', strtotime(request('to_date'))) : '' }}" placeholder="Enter Date" class="form-control w-100-p">
                            </div>
                            
                            <div class="col-2">
                                <label>{{ __('sort_by') }}</label>
                                <select name="sort_by" class="form-control w-100-p">
                                    <option  value="" >All</option>
                                    <option {{request('sort_by') == 'latest' ? 'selected' : '' }}
                                        value="latest" >
                                        {{ __('latest') }}
                                    </option>
                                    <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">
                                        {{ __('oldest') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="card-body text-center table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('order_no') }}</th>
                                    <th>{{ __('transaction_no') }}</th>
                                    {{-- <th>{{ __('plan_name') }}</th> --}}
                                    <th>{{ __('payment_provider') }}</th>
                                    <th>{{ __('user') }}</th>
                                    <th>{{ __('amount') }}</th>
                                    <th>{{ __('created_time') }}</th>
                                    <th>{{ __('payment_status') }}</th>
                                    @if (userCan('order.download'))
                                        <th width="10%">{{ __('action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders))
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            #{{ $order->order_id }}
                                        </td>
                                        <td>
                                            {{ $order->transaction_id }}
                                        </td>
                                        {{-- <td>
                                            @if ($order->payment_type == 'per_job_based')
                                                <span class="badge badge-secondary">{{ ucfirst(Str::replace('_', ' ', $order->payment_type)) }}</span>
                                            @else
                                                <span class="badge badge-primary">{{ $order->plan->label }}</span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if ($order->payment_provider == 'offline')
                                                Offline
                                                @if (isset($order->manualPayment) && isset($order->manualPayment->name))
                                                    (<b>{{ $order->manualPayment->name }}</b>)
                                                @endif
                                            @else
                                                {{ ucfirst($order->payment_provider) }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $order->user->name ?? '' }}
                                        </td>
                                        <td>
                                            ৳{{ $order->amount ?? 0 }}
                                        </td>
                                        <td class="text-muted">
                                            {{ formatTime($order->created_at, 'M d, Y') }}
                                        </td>
                                        <td>
                                            {{ $order->payment_status ?? '' }}
                                            {{-- @if ($order->payment_status == 'paid')
                                                <span class="badge badge-pill bg-success">{{ __('paid') }}</span>
                                            @else
                                                <span class="badge badge-pill bg-warning">{{ __('unpaid') }}</span> <br>
                                                <a onclick="return confirm('{{ __('are_you_sure') }}')"
                                                    href="{{ route('manual.payment.mark.paid', $order->id) }}">{{ __('mark_as_paid') }}</a>
                                            @endif --}}
                                        </td>
                                        <td class="d-flex ">
                                            <a href="{{ route('order.show', $order->id) }}" class="btn bg-primary mr-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if (userCan('order.download'))
                                                <form
                                                    action="{{ route('admin.transaction.invoice.download', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="fas fa-download"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                
                                @endforeach

                                @else
                                    
                                <tr>
                                    <td colspan="9">
                                        <div class="empty py-5">
                                            <x-not-found message="{{ __('no_data_found') }}" />
                                        </div>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    @if ($orders->total() > $orders->count())
                        <div class="mt-3 d-flex justify-content-center">{{ $orders->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('#filterForm').on('change', function() {
            $(this).submit();
        })

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $(document).ready(function() {
            $('#to_date').datepicker({
                format: 'dd-mm-yyyy'
            });
            $('#from_date').datepicker({
                format: 'dd-mm-yyyy'
            });
        });

         // submit for pdf export
         $(document).ready(function() {
            $("#pdfButton").click(function() {
                $('#filterForm').attr('method',"POST");
                $('#filterForm').attr('action',"{{ route('orders.export.pdf') }}");
                $("#filterForm").submit();
            });
        });

    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap-datepicker.min.css">
    <style>
        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #fff;
            border: 1px solid #fff;
            background: #007bff;
            border-radius: 30px;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }
    </style>
@endsection
