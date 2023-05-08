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
        :root {
        --muted: #9ea2a5;
        }
        #application-print {
            max-width: 800px;
            margin: 0 auto;
            font-family: Arial, Helvetica, sans-serif;
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
            padding: 5px;
            border: 2px solid #9ea2a5;
            /* background-color: #f2f2f2; */
        }


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
                <thead style="page-break-inside: avoid">
                    <tr>
                        <th colspan="4" style="text-align: center; color: black; ">
                            <h2 style="font-family: Arial, Helvetica, sans-serif">Order Statement</h2>
                            
                            @if ($filters['from_date'] && $filters['to_date'])
                                <h3>Statement for the period of : <span style="color: #9ea2a5">{{ $filters['from_date'] }}</span> To <span style="color: #9ea2a5">{{ $filters['to_date'] }}</span></h3>
                            @endif
                            @if ($filters['provider'])
                                <h3>Payment Provider : <span style="color: #9ea2a5">{{ Str::ucfirst($filters['provider']) }}</span></h3>
                            @endif
                            @if ($filters['payer'])
                                <h3>Payer : <span style="color: #9ea2a5">{{ Str::ucfirst($filters['payer']) }}</span></h3>
                            @endif
                        </th>
                    </tr>
                    <tr style="font-family: Arial, Helvetica, sans-serif">
                        <th style="width: 17%;"><h3 style="font-family: Arial, Helvetica, sans-serif">{{ __('Transaction Date') }}</h3></th>
                        <th style="width: 35%"><h3 style="font-family: Arial, Helvetica, sans-serif">{{ __('Candiate Information') }}</h3></th>
                        <th style="width: 30%"><h3 style="font-family: Arial, Helvetica, sans-serif">{{ __('Payment Information') }}</h3></th>
                        <th style="width: 18%"><h3 style="font-family: Arial, Helvetica, sans-serif">{{ __('Payment Amount') }}</h3></th>
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
                            <td style="vertical-align: top">
                                <h5>{{ date('M j, Y', strtotime($order->created_at)) }}</h5>
                            </td>
                            <td style="vertical-align: top">
                                <h5>Name: <span style="color: #9ea2a5">{{ $order->user->name ?? ''  }}</span></h5>
                                <h5>Contact Number: <span style="color: #9ea2a5">{{ $order->user->phone ?? ''  }}</span></h5>
                                @if ( $order->user->email)
                                <h5>Email: <span style="color: #9ea2a5">{{ $order->user->email ?? ''  }}</span></h5>
                                @endif
                                <h5>Details Information: <span style="color: #9ea2a5">{{ $order->user->candidate->place ?? ''  }}</span></h5>
                            </td>
                            <td style="vertical-align: top">
                                <h5>Payment Date: <span style="color: #9ea2a5">{{ date('F j, Y', strtotime($order->created_at))  }}</span></h5>
                                <h5>Invoice No: <span style="color: #9ea2a5">#{{ $order->order_id  }}</span></h5>
                                <h5>Transaction No: <span style="color: #9ea2a5">{{ $order->transaction_id   }}</span></h5>
                                <h5>Payment Provider: <span style="color: #9ea2a5">{{ Str::ucfirst($order->provider) }}</span></h5>
                                <h5>Payment Status: <span style="color: #9ea2a5">{{ Str::ucfirst($order->payment_status) }}</span></h5>
                                <h5>Payment Amountr: <span style="color: #9ea2a5">৳ {{ number_format($order->amount, 2) }} BDT</span></h5>
                            </td>
                            <td style="vertical-align: top; text-align: right; padding-left:0px">
                                <span style="color: #9ea2a5">৳ {{ number_format($order->amount, 2)   }} BDT</span>
                            </td>
                        </tr>
                    @endforeach
                        <tr style="">
                            <td colspan="2" style="text-align: right; border-right: none; padding-top:15px; padding-bottom: 5px; vertical-align: bottom "><h5 style="font-family: Arial, Helvetica, sans-serif; color:green">Payment Receivable</h5></td>
                            <td style="text-align: center; color:green; border-left: none; padding-top:15px; padding-bottom: 5px; vertical-align: bottom"><h5 style="font-family: Arial, Helvetica, sans-serif; color:green">Total Amount</h3></td>
                            <td style="color:green; padding-top:15px; padding-bottom: 5px; text-align: right; padding-left:0px">৳ {{ number_format($total, 2) }} BDT</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="vertical-align: bottom; text-align: center; padding-top: 25px"><span style="color: #9ea2a5">This report has been generated electronically</span></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
