<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{{ config('app.name') }} | Invoice </title>
    <style>
        /* Font Include */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        #application-print {
            max-width: 800px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        h1,
        h2 {
            margin-top: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            /* padding: 10px; */
            border: 1px solid #2e3397;
            /* background-color: #f2f2f2; */
        }

        /* table th {
            background-color: #f2f2f2;
        } */

        .personal-info

        /* CSS styles go here */
        @media print {
            /* Print styles go here */
        }

        /* Display the image and personal info side by side */
        .personal-info {
            display: flex;
            align-items: center;
        }

        .personal-info-image {
            width: 30%;
        }

        .personal-info-image img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .personal-info-details {
            width: 70%;
        }

        .personal-info-details table {
            margin-bottom: 0;
        }

        .barcode-div {
            display: flex;
            justify-content: space-between;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .d-flex {
            display: flex !important;
        }

        .justify-content-end {
            justify-content: flex-end !important;
        }

        /* body{
            font-family: bangla
        } */

        /* @font-face {
        font-family: 'preeti';
        font-style: normal;
        font-weight: 400;
        src: url('".$public_path."/fonts/PREETI.TTF') format('ttf');
    } */

        /* @font-face{
        font-family: Arial, Helvetica, sans-serif;
    } */

        /* @page {
        margin-left: 4%;
        margin-right: 4%;
    } */

        td,
        th {
            padding: 6px;
        }

        .fulljustify {
            text-align: justify;
        }

        .fulljustify:after {
            content: "";
            display: inline-block;
            width: 100%;
        }

        .jutified-text {
            /* height: 80px; */
            overflow: hidden;
            /* line-height: 80px;  */
        }
    </style>
</head>

<body class="main-body">
    <div class="invoice page-break" size="A4">

        <div class="card-body text-center table-responsive p-0">
            <table class="table table-hover text-nowrap table-bordered">
                <thead>
                    <tr>
                        <th colspan="7" style="text-align: center">
                            Order/Statement
                        </th>
                    </tr>
                    <tr style="background: #2e3397;">
                        <th style="color:white;">{{ __('order_no') }}</th>
                        <th style="color:white;">{{ __('transaction_no') }}</th>
                        <th style="color:white;">{{ __('payment_provider') }}</th>
                        <th style="color:white;">{{ __('User') }}</th>
                        <th style="color:white;">{{ __('amount') }}</th>
                        <th style="color:white;">{{ __('created_time') }}</th>
                        <th style="color:white;">{{ __('payment_status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($orders as $order)
                        @php
                            $total += $order->amount;
                        @endphp
                        <tr>
                            <td>
                                {{ $order->order_id }}
                            </td>
                            <td>
                                {{ $order->transaction_id }}
                            </td>
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
                            </td>
                        </tr>
                    @endforeach
                        <tr style="background: #2e3397">
                            <td colspan="6" style="text-align: right; color:white;"><strong>Total</strong></td>
                            <td style="color:white;">{{ $total }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
