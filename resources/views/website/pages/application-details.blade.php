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
    	text-align:justify;
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<style>
    * {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
    }
</style>
<div id="application-print">
    <div class="row">
        <table style="font-family: Arial, Helvetica, sans-serif">
            <tbody>
                @if ($job->company->user->name == 'Welfare Family Bangladesh Ltd.' || str_contains($job->company->user->name, 'Welfare'))
                    <tr style="border:#2e3397 1px solid; min-height: 150px; vertical-align: baseline">
                        {{-- <td style="text-align: left;border-right: 0;  padding:0px;">
                            <img style="margin: 0px; padding:0px; padding-left:10px; border-radius: 3px;" src="images/wfb-new-logo.png"
                                alt="" width="150px" height="auto">
                        </td>
                        <td style="text-align: center; border-right: 0; border-left: 0px;  padding:0px; color: #2e3397">
                            <h2 style="margin-bottom: 0px; padding-bottom: 0px;">Welfare Family Bangladesh</h2>
                            <h5>Welfare Technologies Services Limited</h5>
                            <hr style="color: white; width: 2px; margin:3px; padding:0px">
                            <p style="font-size: 10px">Head Office: Kathaltali, Rangamati Hill District, Bangladesh</p>
                            <p style="font-size: 10px">Corporate Head Office: Chattogram, Bangladesh</p>
                            <p style="font-size: 10px">www.welfarefamily.org</p>
                        </td>
                        <td style="text-align: right; border-left: 0px;  padding:0px; padding-right: 10px; ">
                            <img style="margin: 0px; padding:0px; padding-left:10px; border-radius: 3px; "
                                src="images/Welfare.png" alt="" width="150px" height="auto">
                        </td> --}}
                        <td style="text-align: center">
                            <img src="images/pad.png" alt="Welfare Pad" style="width: 100%">
                        </td>
                    </tr>
                @else
                    <tr style="border:#2e3397 1px solid; min-height: 150px; vertical-align: baseline">
                        <td style="text-align: center; vertical-align: baseline; border-right:0;width:150px">
                            <img style="border-radius: 3px; padding:15px 15px 0px 15px;" src="images/wfb-new-logo.png"
                                alt="" width="120px" height="auto">
                        </td>
                        <td style="text-align: center; border-right: 0; border-left: 0px;  padding:0px; color: #2e3397">
                            <h2 style="margin-bottom: 0px; padding-bottom: 0px; ">
                                <strong>{{ $job->company->user->name }}</strong>
                            </h2>
                            <hr style="color: #2e3397; width: 100%; height:3px; margin:3px; padding:0px; ">
                            <h5
                                style="margin-top:0px; padding-top:0px; padding-left: 5px; padding-right: 5px; text-align: center; word-wrap: break-word;">
                                {{ $job->company->full_address ?? '' }}</h5>
                            <p style="font-size: 8px; margin-top:0px; padding-top:0px">
                                {{ $job->company->website ?? '' }}
                            </p>
                        </td>
                        <td style="text-align: right; border-left: 0px;  padding:15px 15px 15px 0px; width:150px">
                            <img style="margin: 0px; padding:0px; padding-left:0px; border-radius: 3px; "
                                src="{{ $job->company->logo ?? 'images/Welfare-new-logo.png' }}" alt=""
                                width="120px" height="auto">
                        </td>
                    </tr>
                @endif



            </tbody>
        </table>
    </div>
    
    <div class="row">
        <table style="padding-top: 4px; margin-top: 10px">
            <tbody>
                <tr style="text-align: center">
                    <td colspan="2" style="text-align: center;">
                        <strong>Application Form (Applicant's Copy)</strong>
                    </td>
                </tr>
                <tr style="text-align: end;">
                    <td style="text-align: end; width: 60%">User ID: <span>{{ $candidate->user->username ?? '' }}</span>
                    </td>
                    <td style="text-align: end; width: 40%">Submitted Date:
                        <span>{{ date('d F Y', strtotime($applied->created_at)) }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <table style="padding-top: 4px; margin-top:20px">
            <tbody>
                <tr style="padding: 0px; margin: 0px">
                    <td rowspan="15" style="margin: 0px; padding:0px; vertical-align: text-top;" width="150px">
                        <img src="{{ $candidate->photo }}" width="150px" height="140px" alt="Profile Picture"
                            style="margin: 0px; padding:5px; border-radius: 5%;">
                    </td>
                    <td style=" width: 30%;">Post Name</td>
                    <td style="">
                        {{ $job->title ?? '' }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Applicant's Name</td>
                    <td style=""> {{ $candidate->user->name ?? '' }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Applicant's
                        Name (বাংলা)
                    </td>
                    <td style="">
                        {{ $candidate->name_bn ?? '' }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Father's Name
                    </td>
                    <td style="">
                        {{ $candidate->father_name ?? '' }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Father's Name
                        (বাংলা)
                    </td>
                    <td style="">
                        {{ $candidate->father_name_bn ?? '' }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Mother's Name
                    </td>
                    <td style="">
                        {{ $candidate->mother_name ?? '' }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Mother's Name
                        (বাংলা)
                    </td>
                    <td style="">
                        {{ $candidate->mother_name_bn ?? '' }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Date of Birth
                    </td>
                    <td style="">
                        {{ $candidate->birth_date ? date('d M Y', strtotime($candidate->birth_date)) : '' }}</td>
                </tr>

                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Contact Mobile</td>
                    <td style="">{{ $candidate->user->phone ?? '' }}</td>
                </tr>

                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">E-Mail</td>
                    <td style="">{{ $candidate->user->email ?? '' }}</td>
                </tr>

                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Gender</td>
                    <td style="">{{ ucwords($candidate->gender) }}</td>
                </tr>

                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Religion</td>
                    <td style="">{{ ucwords($candidate->religion) }}</td>
                </tr>

                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Quota</td>
                    <td style="">{{ ucwords($candidate->quota) }}</td>
                </tr>

                <tr style="padding: 0px; margin: 0px">
                    <td style="  width: 30%">Home District</td>
                    <td style="">{{ ucwords($candidate->district_parmanents->nameEn) }}</td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="row">
        <table style="padding-top: 4px; margin-top:20px">
            <tbody>
                <tr>
                    <td style="">National ID</td>
                    <td style="">{{ $candidate->nid_no }}</td>
                    <td style="">Passport ID</td>
                    <td style="">{{ $candidate->passport_no ?? "N/A" }}</td>
                </tr>
                <tr>
                    <td style="">Birth Registration</td>
                    <td style="">{{ $candidate->birth_certificate_no ?? "N/A" }}</td>
                    <td style="">Marital Status</td>
                    <td style="">{{ ucwords($candidate->marital_status) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="margin-top:20px">
        <legend style="font-size: 16px">Address Information:</legend>
        <table style="">
            <thead>

                <tr>
                    <th style="width: 25%">Mailing/Present Address</th>
                    <th style="width: 25%"></th>
                    <th style="width: 25%">Permanent Address</th>
                    <th style="width: 25%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Care of: </td>
                    <td>{{ $candidate->care_of }}</td>
                    <td>Care of: </td>
                    <td>{{ $candidate->care_of_parmanent }}</td>
                </tr>
                <tr>
                    <td>Village/Town/Road/House/Flat:</td>
                    <td>{{ $candidate->place }}</td>
                    <td>Village/Town/Road/House/Flat:</td>
                    <td>{{ $candidate->place_parmanent }}</td>
                </tr>
                <tr>
                    <td>Present Post Office:</td>
                    <td>{{ $candidate->post_office }}</td>
                    <td>Permanent Post Office:</td>
                    <td>{{ $candidate->post_office_parmanent }}</td>
                </tr>
                <tr>
                    <td>Present Post Code:</td>
                    <td>{{ $candidate->postcode }}</td>
                    <td>Permanent Post Code:</td>
                    <td>{{ $candidate->postcode_parmanent }}</td>
                </tr>
                <tr>
                    <td>Present Upazila/Thana:</td>
                    <td>{{ $candidate->thanas->nameEn }}</td>
                    <td>Permanent Upazila/Thana:</td>
                    <td>{{ $candidate->thana_parmanents->nameEn }}</td>
                </tr>
                <tr>
                    <td>Present District:</td>
                    <td>{{ $candidate->districts->nameEn }}</td>
                    <td>Permanent District:</td>
                    <td>{{ $candidate->district_parmanents->nameEn }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="margin-top:20px">
        <legend style="font-size: 16px">Academic Qualifications:</legend>
        <table style="">
            <thead>

                <tr>
                    <th>Examination</th>
                    <th>Board/Institute</th>
                    <th>Group/Subject/Degree</th>
                    <th>Result</th>
                    <th>Roll</th>
                    <th>Year</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>

                @if (count($candidate->educations) > 0)
                    @foreach ($candidate->educations as $education)
                        @php
                            $board = $education->institute;
                            if ($education->board) {
                                $board = \DB::table('bd_education_boards')
                                    ->where('id', $education->board)
                                    ->pluck('name')
                                    ->first();
                            }
                        @endphp

                        <tr>
                            <td>{{ __($education->level) ?? '' }}</td>
                            <td>{{ $board ?? 'N/A' }}</td>
                            @if ($education->subject)
                                @php
                                    $subject = \App\Models\Subject::where('code', $education->subject)
                                        ->pluck('name')
                                        ->first();
                                @endphp
                            @endif
                            <td>{{ $education->group ? $education->group : ($education->subject ? $subject : ($education->degree ? $education->degree : '')) }}
                            </td>
                            <td>{{ $education->result_gpa ?? 'N/A' }}</td>
                            <td>{{ $education->roll ?? 'N/A' }}</td>
                            <td>{{ $education->year ?? 'N/A' }}</td>
                            <td>{{ $education->course_duration ?? 'N/A' }}</td>
                        </tr>
                    @endforeach

                @endif
            </tbody>
        </table>
    </div>

    <div class="row" style="margin-top:20px">
        <legend style="font-size: 16px">Professional Experience:</legend>
        <table style="">
            <thead>
                <tr>
                    <th>Organization Name</th>
                    <th> Post Name </th>
                    <th>Responsibilities </th>
                    <th>Start Date </th>
                    <th>End Date</th>
                    <th>Total Experience </th>
                </tr>
            </thead>
            <tbody>
                @if (count($candidate->experiences) > 0)
                    @foreach ($candidate->experiences as $experience)
                        @php
                            $d1 = new DateTime($experience->start);
                            $d2 = new DateTime($experience->end);
                            // @link http://www.php.net/manual/en/class.dateinterval.php
                            $interval = $d2->diff($d1);
                            
                            $diff = $interval->format('%y Years %m Months');
                        @endphp
                        <tr>
                            <td>{{ $experience->company ?? 'N/A' }}</td>
                            <td>{{ $experience->designation ?? 'N/A' }}</td>
                            <td>{{ $experience->responsibilities ?? 'N/A' }}</td>
                            <td>{{ $experience->start ?? 'N/A' }}</td>
                            <td>{{ $experience->end ?? 'N/A' }}</td>
                            <td>{{ $diff ?? 'N/A' }}</td>
                        </tr>
                    @endforeach

                @endif
            </tbody>
        </table>
    </div>


    <div class="row" style="margin-top:20px;" class="jutified-text fulljustify">
        <i>I declare that the information provided in this form are correct, true and complete to the best of my
            knowledge and belief. If any information is found false, incorrect, incomplete or if any ineligibility is
            detected before or after the examination, any action can be taken against me by the authority including
            cancellation of my candidature.</i>
    </div>

    <div class="row" style="margin-top:20px; text-align: right">
        <img src="{{ public_path($candidate->signature) }}" width="150" height="50" alt="Profile Picture"
            style="margin: 0px; padding:0px;">
        <p style="font-size: 10px;">-------------- Applicant's Signature --------------</p>
    </div>



    <div class="row" style="margin-top:20px">
        <table style="padding-top: 4px; border-collapse:collapse; color:white" cellspacing="0">
            <thead style="display:block; page-break-inside:avoid;">
                <tr style="background-color: white">
                    <th colspan="4" style="text-align: left; margin:4px; padding:4px; color:black">
                        <Strong>Congratulations! Application Submitted Successfully!</Strong>
                    </th>
                </tr>
            </thead>
            <style>
                table {
                    page-break-inside: avoid;
                }
            </style>
            <tbody>
                <tr>
                    <td colspan="4" style=" margin:5px; padding:5px; text-align: justify">
                        <p style="color: #2e3397; text-align: justify; align-content: space-between" class="jutified-text" id="fulljustify">
                            ওয়েলফেয়ার ফ্যামিলি বাংলাদেশ ও বেসরকারি উন্নয়ন সংস্থা (NGO) এবং কোম্পানির যৌথ উদ্যোগে
                            (বাংলাদেশ গেজেটে প্রকাশিত বিজ্ঞপ্তির আলোকে ও চাকরির আবেদনকারীরা এককালীন অফেরতযোগ্য
                            রেজিস্ট্রেশন ফি প্রদান করে) 'সাসটেইনেবল ডেভেলপমেন্ট পলিসি' (SDP) ও সোস্যাল অ্যান্ড ইকোনমিক
                            ডেভেলপমেন্ট পলিসি' (SEDP) এবং পভার্টি এলিভিয়েশন পলিসি (Muldhan) প্রজেক্ট ও প্রোগ্রাম
                            বাস্তবায়নের জন্য "সামাজিক ও অর্থনৈতিকক্ষেত্রে টেকসই উন্নয়নের প্রয়াস" শীর্ষক কার্যক্রমে
                            অংশগ্রহণ ও সেবা গ্রহণের এবং সেবা প্রদানের জন্য Google Play store হতে My Welfare App ডাউনলোড
                            করুন অথবা www.welfarebd.org ওয়েবসাইট থেকে রেজিষ্ট্রেশন
                            করুন।
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-right:#2e3397"></td>
                    <td style="width:150px; border-left:#2e3397; border-right: #2e3397"> <a
                            href="https://play.google.com/store/search?q=my+welfare+app&c=apps&hl=en&gl=US"><img
                                src="{{ public_path('images/play_store.png') }}" alt=""
                                style="width:150px; height:50px"></a> </td>
                    <td
                        style="width:150px; border-left:#2e3397; border-right:#2e3397;  text-align: center; color: #2e3397">
                        <span> Scan To
                            Download <br> <strong>My Welfare App</strong></span>
                    </td>
                    <td
                        style="width:150px; border-top:#2e3397; border-left:#2e3397; padding-right: 5px; padding-bottom:5px">
                        <img src="{{ public_path('images/qrcode.png') }}" alt=""
                            style="width:150px; height:200px;">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12" style="margin-top: 4px;">
        <a href="{{ route('verify.application', ['job_id' => $job->id, 'candidate_id' => $candidate->id]) }}"
            style="font-size: 8px; text-decoration: none;">Verify This Registration:
            {{ route('verify.application', ['job_id' => $job->id, 'candidate_id' => $candidate->id]) }}</a>
    </div>
</div>
