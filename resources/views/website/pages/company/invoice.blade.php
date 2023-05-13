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
        --muted: #606364;
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
            /* border: 2px solid #606364; */
            border: 2px solid #2e3397;
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
            margin-right: -10px;
            margin-left: -10px;
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
       /* h6{
        margin: 10px 5px 10px 5px;
       } */
       h3, h6, span{
        font-size: 18px;
       }
    </style>
</head>

<body class="main-body">
    <div class="invoice page-break" size="A4">
        <table style="width:100%">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center; padding-top:20px; padding-bottom:20px; ">
                        <h2 style="font-family: Arial, Helvetica, sans-serif;  color: #2e3397; ">INVOICE</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style="padding-top:10px; padding-bottom:10px; "><h3 style="font-family: Arial, Helvetica, sans-serif">Candidate Information</h3></td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; padding-top:10px; padding-bottom:10px; "><h6 style="margin: 25px 5px 25px 5px;">Name</h6></td>

                    <td style="width: 60%; border-bottom: none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364;">{{ $transaction->user->name ?? "" }}</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Details Information</h6></td>

                    <td style="width: 60%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">{{ $transaction->user->candidate->place ?? "" }}</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Contact Number</h6></td>

                    <td style="width: 60%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">{{ $transaction->user->phone ?? "" }}</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>E-Mail Address</h6></td>

                    <td style="width: 60%; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">{{ $transaction->user->email ?? "" }}</span></h6>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding-top:20px; padding-bottom:20px; "><h3 style="font-family: Arial, Helvetica, sans-serif">Payment Information</h3></td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; padding-top:10px; padding-bottom:10px; "><h6>Payment Date</h6></td>

                    <td style="width: 60%; border-bottom: none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364;">{{ date('M j, Y', strtotime($transaction->created_at)) }}</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Payment Details</h6></td>

                    <td style="width: 60%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">Registration Fee</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Invoice No</h6></td>

                    <td style="width: 60%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">#{{ $transaction->order_id ?? "" }}</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Transaction No</h6></td>

                    <td style="width: 60%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">{{ $transaction->transaction_id ?? "" }}</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Payment Provider</h6></td>
                    <td style="width: 60%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">{{ Str::ucfirst($transaction->payment_provider) }}</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Payment Amount</h6></td>

                    <td style="width: 60%; border-bottom: none; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">৳ {{ number_format($transaction->amount, 2) }} BDT</span></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; border-top:none; padding-top:10px; padding-bottom:10px; "><h6>Payment Status</h6></td>

                    <td style="width: 60%; border-top:none; padding-top:10px; padding-bottom:10px; ">
                        <h6><span style="color: #606364">{{ Str::ucfirst($transaction->payment_status) }}</span></h6>
                    </td>
                </tr>
                <tr style="">
                    <td style="border-right: none; vertical-align: bottom; padding-top:20px; padding-bottom:20px; "><h6 style="font-family: Arial, Helvetica, sans-serif; color:green">Payment Received</h6></td>
                    <td style="color:green; text-align: right; padding-left:0px; padding-top:10px; padding-bottom:10px; "><h6 >৳ <span style="font-family: Arial, Helvetica, sans-serif; color:green">{{ number_format($transaction->amount, 2) }} BDT</span></h6></td>
                </tr>
                <tr>
                    <td colspan="2" style="vertical-align: bottom; text-align: center; padding-top: 25px; padding-bottom:10px; padding-bottom:10px; "><span style="color: #606364">This report has been generated electronically</span></td>
                </tr>
            </tbody>
        </table>
        {{-- <table style="width:100%">
            <tbody>
                <tr>
                    <td style="text-align: left; word-wrap: no">
                        <h6>INVOICE: #<span>{{ $transaction->order_id }}</span></h6>
                    </td>
                    <td style="text-align: right">
                       <h6>INVOICE DATE: <span>{{ formatTime($transaction->created_at, 'M d, Y') }}</span> </h6> 
                </tr>
            </tbody>
        </table> --}}

        {{-- <section class="product-area mt-4">
            <table class="table" style="width: 100%" cellspacing="0">
                <thead>
                    <tr>
                        <td class="item-col">Plan</td>
                        <td class="description-col">Description</td>
                        <td>Payment</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody>
                    @if (!isset($transaction->plan->label))
                        <tr>
                            <td class="item-col">
                                Basic Plan
                            </td>
                            <td class="description-col">
                                এক কালীন অফেরতযোগ্য রেজিস্ট্রেশন ফি
                            </td>
                            <td>
                                {{ ucfirst($transaction->payment_provider) }}
                            </td>
                            <td>
                                {{ $transaction->currency_symbol }}{{ number_format($transaction->amount, 2) }}
                            </td>
                        </tr>
                   @else
                    <tr>
                        <td class="item-col">
                            {{ $transaction->plan->label ?? "" }}
                        </td>
                        <td class="description-col">
                            {{ $transaction->plan->description ?? "" }}
                        </td>
                        <td>
                            {{ ucfirst($transaction->payment_provide ?? "") }}
                        </td>
                        <td>
                            {{ $transaction->currency_symbol ?? "৳" }}{{ number_format($transaction->amount, 2) }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="3"></td>
                        <td>{{ $transaction->currency_symbol ?? "৳" }}{{ number_format($transaction->amount, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </section> --}}

    </div>
</body>

</html>
