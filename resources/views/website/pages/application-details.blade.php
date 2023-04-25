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
        border: 1px solid #ddd;
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

    @font-face {
        font-family: 'preeti';
        font-style: normal;
        font-weight: 400;
        src: url('".$public_path."/fonts/PREETI.TTF') format('ttf');
    }
</style>

<div id="application-print">
    {{-- <table style="padding-top: 4px;">
        <tbody>
            <tr>
                <td style="text-align: center; padding:4px">
                    <p>Application Form (Applicant Copy)</p>
                </td>
            </tr>
        </tbody>
    </table> --}}

    <table>
        <tbody style="background-color:  #2e3397">

            <tr style="text-align: center">
                <td colspan="3" style="text-align: center; padding:4px; font-size: 10px">
                    <p>Application Form (Applicant Copy)</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;border-right: 0; padding:0px; width:auto">
                    <img style="margin: 0px; padding:0px; padding-left:10px; border-radius: 3px;"
                        src="images/Welfare-Family-TM.png" alt="" width="170px" height="132px">
                </td>
                @if ($job->company->user->name == 'Welfare Family Bangladesh Ltd.')
                    <td
                        style="text-align: center; border-right: 0; border-left: 0px; padding:0px; background-color:  #2e3397; color: white">
                        <h1 style="margin-bottom: 0px; padding-bottom: 0px;">Welfare Family Bangladesh</h1>
                        <h4>Welfare Technologies Services Limited</h4>
                        <hr style="color: white; width: 2px; margin:3px; padding:0px">
                        <p style="font-size: 10px">Head Office: Kathaltali, Rangamati Hill District, Bangladesh</p>
                        <p style="font-size: 10px">Corporate Head Office: Chattogram, Bangladesh</p>
                        <p style="font-size: 10px">www.welfarefamily.org</p>
                    </td>
                @else
                    <td
                        style="text-align: center; border-right: 0; border-left: 0px; padding:0px; background-color:  #2e3397; color: white">
                        <h2 style="margin-bottom: 0px; padding-bottom: 0px;">{{ $job->company->user->name }}</h2>
                        <h5
                            style="margin-top:0px; padding-top:0px; padding-left: 5px; padding-right: 5px; text-align: center; word-wrap: break-word;">
                            {{ $job->company->full_address ?? '' }}</h5>
                        <p style="font-size: 8px; margin-top:0px; padding-top:0px">{{ $job->company->website ?? '' }}
                        </p>
                    </td>
                @endif
                <td style="text-align: right; border-left: 0px; padding:0px; padding-right: 10px; width:100px">
                    <img style="margin: 0px; padding:0px; padding-left:10px; border-radius: 3px;"
                        src="images/wfb-logo.png" alt="" width="100px" height="100px">
                </td>

            </tr>
        </tbody>
    </table>
    <table style="padding-top: 4px;">
        <tbody>
            <tr style="text-align: end;">
                <th style="text-align: end">User ID: <span>{{ $candidate->user->username ?? '' }}</span></th>
                <th style="text-align: end">Post Name: <span>{{ $job->title ?? 'Executive' }}</span></th>
            </tr>
        </tbody>
    </table>

    <table style="padding-top: 4px;">
        <tbody>
            <tr style="padding: 0px; margin: 0px">
                <td rowspan="7" style="margin: 0px; padding:0px;" width="150px">
                    <img src="{{ $candidate->photo }}" width="150px" height="140px" alt="Profile Picture"
                        style="margin: 0px; padding:5px; border-radius: 5%;">
                </td>
                <td style="font-size: 10px; padding-left:5px; width: 30%;">Applicant's
                    Name</td>
                <td style="font-size: 10px; padding-left:5px;;">
                    {{ $candidate->user->name ?? '' }}</td>
            </tr>
            <tr style="padding: 0px; margin: 0px">
                <td style="font-size: 10px; padding-left:5px;;  width: 30%">Applicant's
                    Name (বাংলা)
                </td>
                <td style="font-size: 10px; padding-left:5px;;">
                    {{ $candidate->name_bn ?? '' }}</td>
            </tr>
            <tr style="padding: 0px; margin: 0px">
                <td style="font-size: 10px; padding-left:5px;;  width: 30%">Father's Name
                </td>
                <td style="font-size: 10px; padding-left:5px;;">
                    {{ $candidate->father_name ?? '' }}</td>
            </tr>
            <tr style="padding: 0px; margin: 0px">
                <td style="font-size: 10px; padding-left:5px;;  width: 30%">Father's Name
                    (বাংলা)
                </td>
                <td style="font-size: 10px; padding-left:5px;;">
                    {{ $candidate->father_name_bn ?? '' }}</td>
            </tr>
            <tr style="padding: 0px; margin: 0px">
                <td style="font-size: 10px; padding-left:5px;;  width: 30%">Mother's Name
                </td>
                <td style="font-size: 10px; padding-left:5px;;">
                    {{ $candidate->mother_name ?? '' }}</td>
            </tr>
            <tr style="padding: 0px; margin: 0px">
                <td style="font-size: 10px; padding-left:5px;;  width: 30%">Mother's Name
                    (বাংলা)
                </td>
                <td style="font-size: 10px; padding-left:5px;;">
                    {{ $candidate->mother_name_bn ?? '' }}</td>
            </tr>
            <tr style="padding: 0px; margin: 0px">
                <td style="font-size: 10px; padding-left:5px;;  width: 30%">Date of Birth
                </td>
                <td style="font-size: 10px; padding-left:5px;;">
                    {{ $candidate->birth_date ? date('d M Y', strtotime($candidate->birth_date)) : '' }}</td>
            </tr>
        </tbody>
    </table>


    <table style="padding-top: 4px;">
        <tbody>
            <tr>
                <td style="margin: 4px; padding:4px; font-size: 10px;">NID No</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">
                    {{ $candidate->nid_no }}</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">Contact No</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">
                    {{ $candidate->user->phone }}</td>
            </tr>
            <tr>
                <td style="margin: 4px; padding:4px; font-size: 10px;">Gender</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">
                    {{ $candidate->gender }}</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">Marital Status</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">
                    {{ $candidate->marital_status }}</td>
            </tr>
            <tr>
                <td style="margin: 4px; padding:4px; font-size: 10px;">Religion</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">
                    {{ $candidate->religion }}</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">Quota</td>
                <td style="margin: 4px; padding:4px; font-size: 10px;">
                    {{ $candidate->quota }}</td>
            </tr>
        </tbody>
    </table>

    <table style="padding-top: 4px;">
        <thead>
            <tr>
                <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; background-color:#DCDCDC">
                    Present Address</th>
                <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; background-color:#DCDCDC">
                    Permanent Address</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="margin: 2px; padding:2px; font-size: 10px;">
                    <p>Care of: <span>{{ $candidate->care_of }}</span></p>
                    <p>Village/Tow: <span>{{ $candidate->place }}</span></p>
                    <p>Post Office: <span>{{ $candidate->post_office }}</span></p>
                    <p>Post Code: <span>{{ $candidate->postcode }}</span></p>
                    <p>Upazila/Thana: <span>{{ $candidate->thanas->nameEn }}</span></p>
                    <p>District: <span>{{ $candidate->districts->nameEn }}</span></p>
                </td>
                <td style="margin: 2px; padding:2px; font-size: 10px;">
                    <p>Care of: <span>{{ $candidate->care_of_parmanent }}</span></p>
                    <p>Village/Tow: <span>{{ $candidate->place_parmanent }}</span></p>
                    <p>Post Office: <span>{{ $candidate->post_office_parmanent }}</span></p>
                    <p>Post Code: <span>{{ $candidate->postcode_parmanent }}</span></p>
                    <p>Upazila/Thana: <span>{{ $candidate->thana_parmanents->nameEn }}</span></p>
                    <p>District: <span>{{ $candidate->district_parmanents->nameEn }}</span></p>
                </td>
            </tr>
        </tbody>
    </table>



    <table style="padding-top: 4px;">
        <thead>
            <tr>
                <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; background-color:#DCDCDC"
                    colspan="7">Education Qualifications:</th>
            </tr>
            <tr>
                <th
                    style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                    Examination</th>
                <th
                    style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                    Board/Institude</th>
                <th
                    style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                    Group/Subject/Degree</th>
                <th
                    style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                    Result</th>
                <th
                    style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                    Year</th>
                <th
                    style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                    Role</th>
                <th
                    style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                    Duration</th>
            </tr>
        </thead>
        <tbody>
            @if (count($candidate->educations) > 0)
                @foreach ($candidate->educations as $education)
                    <tr>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $education->level ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $education->board ? $education->board : ($education->institute ? $education->institute : '') }}
                        </td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $education->group ? $education->group : ($education->subject ? $education->subject : ($education->degree ? $education->degree : '')) }}
                        </td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $education->result_gpa ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $education->year ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $education->roll ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $education->course_duration ?? '' }}</td>
                    </tr>
                @endforeach

            @endif
        </tbody>
    </table>



    @if (count($candidate->experiences) > 0)
        <table style="padding-top: 4px;">
            <thead>
                <tr>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; background-color:#DCDCDC"
                        colspan="6">Professional Experience:</th>
                </tr>
                <tr>
                    <th
                        style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                        Organization Name</th>
                    <th
                        style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                        Post Name</th>
                    <th
                        style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                        Responsibilities</th>
                    <th
                        style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                        Start Date</th>
                    <th
                        style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                        End Date</th>
                    <th
                        style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color:#DCDCDC">
                        Total Experience</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidate->experiences as $experience)
                    <tr>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $experience->company ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $experience->designation ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $experience->responsibilities ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $experience->start ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            {{ $experience->end ?? '' }}</td>
                        <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center;">
                            #</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


    <div style="margin-top: 10px">
        <p style="font-size: 10px;">I declare that the information provided in this form are correct, true and
            complete to the best of my knowledge and belief. If any information is found
            false, incorrect, incomplete or if any ineligibility is detected before or after the examination, any
            action can be taken against me by the Commission
            including cancellation of my candidature.</p>
    </div>

    <div style=" text-align: right">
        <img src="{{ public_path($candidate->signature) }}" width="150" height="50" alt="Profile Picture"
            style="margin: 0px; padding:0px;">
        <p style="font-size: 10px;">-------------- Applicant's Signature --------------</p>

    </div>


    <div class="col-12">
        <table style="padding-top: 4px; background-color: #2e3397; border-collapse:collapse; color:white"
            cellspacing="0">
            <thead>
                <tr style="background-color: white">
                    <th colspan="4"
                        style="text-align: left; font-size: 10px; margin:4px; padding:4px; color:black">
                        <Strong>Congratulations! Application Submitted Successfully!</Strong>
                    </th>
                </tr>
            </thead>
            <tbody style="background-color: #2e3397">
                <tr style="border: #2e3397">
                    <td colspan="4" style=" margin:5px; padding:5px">
                        <p style="font-size: 10px;">
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
                <tr style="border: #2e3397">
                    <td style="border-top:#2e3397; border-right:#2e3397"></td>
                    <td style="width:150px; border:#2e3397;"> <a href="https://play.google.com/store/search?q=my+welfare+app&c=apps&hl=en&gl=US"><img src="{{ public_path('images/play_store.png') }}"
                        alt="" style="width:150px; height:50px"></a> </td>
                    <td style="width:150px; border:#2e3397; text-align: center"><span> Scan To
                            Download <br> <strong>My Welfare App</strong></span></td>
                    <td style="width:50px; border-top:#2e3397; border-left:#2e3397; padding-right: 5px; padding-bottom:5px"><img
                            src="{{ public_path('images/qrcode.png') }}" alt=""
                            style="width:50px; height:75px;"></td>
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

