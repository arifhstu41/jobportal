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

      
    </style>
    <link rel="stylesheet" type="text/css" href="{{ public_path('css/bd-tables.css') }}" media="all">
</head>

<body class="main-body">
    {{-- <div class="invoice page-break" size="A4">
        <section class="top-content bb">
            <div class="top-left">
                <div>
                    <h4>Company Information:</h4>
                </div>
                <div>
                    <p>{{ $transaction->company->user->name }}</p>
                    <p>{{ $transaction->company->user->email }}</p>
                    <p>{{ $transaction->company->user->contactInfo->address }}</p>
                </div>
            </div>
            <div class="top-right">
                <div class="logo">
                    <img src="{{ setting()->dark_logo_url }}" alt="" class="img-fluid">
                </div>
            </div>
        </section>

        <section class="bill-to-content mt-5">
            <div class="bill-to-content-right">
                <table cellspacing="0">
                    <tr>
                        <td id="invoice-text">
                            <h4>INVOICE</h4>
                        </td>
                        <td>
                            #{{ $transaction->order_id }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>INVOICE DATE</h4>
                        </td>
                        <td>
                            {{ formatTime($transaction->created_at, 'M d, Y') }}
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="product-area mt-4">
            <table class="table" cellspacing="0">
                <thead>
                    <tr>
                        <td class="item-col">Plan</td>
                        <td class="description-col">Description</td>
                        <td>Payment</td>
                        <td>Benefits</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="item-col">
                            {{ $transaction->plan->label }}
                        </td>
                        <td class="description-col">
                            {{ $transaction->plan->description }}
                        </td>
                        <td>
                            {{ ucfirst($transaction->payment_provider) }}
                        </td>
                        <td>
                            <span>Job Limit : {{ $transaction->plan->job_limit }}</span> <br>
                            <span>Featured Job Limit : {{ $transaction->plan->featured_job_limit }}</span> <br>
                            <span>Highlight Job Limit : {{ $transaction->plan->highlight_job_limit }}</span> <br>
                            <span>Candidate CV View Limit : {{ $transaction->plan->candidate_cv_view_limitation == 'limited' ? $transaction->plan->candidate_cv_view_limit:'∞' }}</span>
                            <br>
                        </td>
                        <td>
                            {{ $transaction->currency_symbol }}{{ $transaction->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="balance-info">
            <div class="balance-info-right">
                <table cellspacing="0">
                    <tr class="table-row-bg">
                        <td>
                            <h4>TOTAL</h4>
                        </td>
                        <td>
                            {{ $transaction->currency_symbol }}{{ $transaction->amount }}
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </div> --}}
    <table class="table" style="width: 100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Father Name</th>
                <th>Mother Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $item)
                <tr>
                    <td>{{ $item->user->name ?? ''}}</td>
                    <td>{{ $item->user->username ?? ''}}</td>
                    <td>{{ $item->user->phone ?? ''}}</td>
                    <td>{{ $item->user->email ?? ''}}</td>
                    <td>{{ $item->father_name ?? ''}}</td>
                    <td>{{ $item->mother_name ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
