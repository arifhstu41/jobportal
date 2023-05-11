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
    <style>
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
    {{-- <link rel="stylesheet" type="text/css" href="{{ public_path('css/bd-tables.css') }}" media="all"> --}}
</head>

<body class="main-body">
    <table  style="margin-top:25px">
        <thead>
            <tr>
                <th>
                    <h1 style="color:#2e3397;">Candidate List</h1>
                </th>
            </tr>
            @if ($filter['division'] || $filter['district'] || $filter['upazila'] || $filter['union'])
            <tr>
                <td>
                    @if ($filter['division'])
                        Region: {{ $filter['division'] }} <br>
                    @endif

                    @if ($filter['district'])
                        District: {{ $filter['district'] }}<br>
                    @endif

                    @if ($filter['upazila'])
                        City Corporation/ Cantonment/ Upazila/ Thana: {{ $filter['upazila'] }}<br>
                    @endif

                    @if ($filter['union'])
                        Paurasava/Union: {{ $filter['union'] }}<br>
                    @endif

                </td>
            </tr>
            @endif
        </thead>
    </table>
    <table class="table" style="width: 100%; border: 1px solid #2e3397">
        <thead>
            <tr style="background: #2e3397;">
                <th style="color:white; ">Image</th>
                <th style="color:white; width:25%">Name</th>
                <th style="color:white; width:25%">Mobile Number/Email</th>
                <th style="color:white;">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $item)
                <tr>
                    <td><img src="{{ $item->photo }}" alt="" style="width: 50px; height:50px"></td>
                    <td>{{ $item->user->name ?? '' }}</td>
                    <td>{{ $item->user->phone ?? '' }}<br>{{ $item->user->email ?? '' }}</td>
                    <td>{{ $item->place ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
