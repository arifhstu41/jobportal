<!DOCTYPE html>
<html>

<head>
    <title>Application Print Page</title>
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
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
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

    

        footer{
        position: fixed;
        left: 0px;
        right: 0px;
        height: 50px;
        margin-bottom: -50px;
      }
    </style>
</head>

<body>
    <div id="application-print">
        <table>
            <tbody>
                <tr>
                    @if ($job->company->logo)
                    <td style="text-align: left;border-right: 0; width: 60px; padding:0px">
                        <img style="margin: 0px; padding:0px; padding-left:10px; border-radius: 3px;" src="{{ $job->company->logo }}" alt="" width="40px" height="40px">
                    </td>
                    @endif
                    
                    <td style="text-align: left; border-right: 0; border-left: 0px; padding:0px;">
                        <p style="margin-bottom: 0px; padding-bottom: 0px;">{{ $job->company->user->name }}</p>
                        <p style="font-size: 8px; margin-top:0px; padding-top:0px">Dhaka, Bangladesh</p>
                    </td>
                    <td style="text-align: right; border-left: 0px; padding:0px; padding-right: 10px">Barcode</td>
                </tr>
            </tbody>
        </table>
        <table style="padding-top: 4px;">
            <tbody>
                <tr style="text-align: end;">
                    <th style="text-align: end">User ID: <span>ASFDFD232</span></th>
                    <th style="text-align: end">Post Name: <span>{{ $job->title ?? "Executive" }}</span></th>
                </tr>
            </tbody>
        </table>
        <table style="padding-top: 4px;">
            <tbody>
                <tr style="padding: 0px; margin: 0px">
                    <td rowspan="4" style="margin: 0px; padding:0px;"  width="150px">
                        <img src="{{ $job->company->logo }}" width="150px" height="140px"
                            alt="Profile Picture" style="margin: 0px; padding:5px; border-radius: 5%;">
                    </td>
                    <td style="font-size: 10px; padding-left:5px; width: 30%; background-color: #DCDCDC">Applicant's Name</td>
                    <td style="font-size: 10px; padding-left:5px; background-color: #DCDCDC;">{{ $candidate->user->name ?? "" }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="font-size: 10px; padding-left:5px; background-color: #DCDCDC;  width: 30%">Father's Name</td>
                    <td style="font-size: 10px; padding-left:5px; background-color: #DCDCDC;">{{ $candidate->father_name ?? "" }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="font-size: 10px; padding-left:5px; background-color: #DCDCDC;  width: 30%">Mother's Name</td>
                    <td style="font-size: 10px; padding-left:5px; background-color: #DCDCDC;">{{ $candidate->mother_name ?? "" }}</td>
                </tr>
                <tr style="padding: 0px; margin: 0px">
                    <td style="font-size: 10px; padding-left:5px; background-color: #DCDCDC;  width: 30%">Date of Birth</td>
                    <td style="font-size: 10px; padding-left:5px; background-color: #DCDCDC;">{{ ($candidate->birth_date) ? date("d M Y", strtotime($candidate->birth_date)) : "" }}</td>
                </tr>
            </tbody>
        </table>


        <table style="padding-top: 4px;">
            <tbody>
                <tr>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">NID No</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">{{ $candidate->nid_no }}</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">Contact No</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">{{ $candidate->user->phone }}</td>
                </tr>
                <tr>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">Gender</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">{{ $candidate->gender }}</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">Marital Status</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">{{ $candidate->marital_status }}</td>
                </tr>
                <tr>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">Religion</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">{{ $candidate->religion }}</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">Quota</td>
                    <td style="margin: 4px; padding:4px; font-size: 10px; background-color: #DCDCDC">{{ $candidate->quota }}</td>
                </tr>
            </tbody>
        </table>


        <table style="padding-top: 4px;">
            <thead>
                <tr>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; background-color: #696969">Present Address</th>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; background-color: #696969">Permanent Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="margin: 2px; padding:2px; font-size: 10px; background-color: #DCDCDC">
                        <p>Care of: <span>{{ $candidate->care_of }}</span></p>
                        <p>Village/Tow: <span>{{ $candidate->place }}</span></p>
                        <p>Post Office: <span>{{ $candidate->post_office }}</span></p>
                        <p>Post Code: <span>{{ $candidate->postcode }}</span></p>
                        <p>Upazila/Thana: <span>{{ $candidate->thana }}</span></p>
                        <p>District: <span>{{ $candidate->district }}</span></p>
                    </td>
                    <td style="margin: 2px; padding:2px; font-size: 10px; background-color: #DCDCDC">
                        <p>Care of: <span>{{ $candidate->care_of_parmanent }}</span></p>
                        <p>Village/Tow: <span>{{ $candidate->place_parmanent }}</span></p>
                        <p>Post Office: <span>{{ $candidate->post_office_parmanent }}</span></p>
                        <p>Post Code: <span>{{ $candidate->postcode_parmanent }}</span></p>
                        <p>Upazila/Thana: <span>{{ $candidate->thana_parmanent }}</span></p>
                        <p>District: <span>{{ $candidate->district_parmanent }}</span></p>
                    </td>
                </tr>
            </tbody>
        </table>


        <table style="padding-top: 4px;">
            <thead>
                <tr>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; background-color: #696969" colspan="7">Education Qualifications:</th>
                </tr>
                <tr>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color: #696969">Examination</th>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color: #696969">Board/Institude</th>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color: #696969">Group/Subject/Degree</th>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color: #696969">Result</th>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color: #696969">Year</th>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color: #696969">Role</th>
                    <th style="text-align: left; font-size: 10px; margin:2px; padding:2px; text-align: center; background-color: #696969">Duration</th>
                </tr>
            </thead>
            <tbody>
                @if(count($candidate->educations)>0)
                @foreach ($candidate->educations as $education)
                <tr>
                    <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center; background-color: #DCDCDC">{{ $education->level ?? ""}}</td>
                    <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center; background-color: #DCDCDC">{{ $education->institute ?? ""}}</td>
                    <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center; background-color: #DCDCDC">{{ $education->group ?? ""}}</td>
                    <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center; background-color: #DCDCDC">{{ $education->result_gpa ?? ""}}</td>
                    <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center; background-color: #DCDCDC">{{ $education->year ?? ""}}</td>
                    <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center; background-color: #DCDCDC">{{ $education->roll ?? ""}}</td>
                    <td style="margin: 2px; padding:2px; font-size: 10px; text-align: center; background-color: #DCDCDC">{{ $education->course_duration ?? ""}}</td>
                </tr>
                @endforeach
                
                @endif
            </tbody>
        </table>

        <div style="margin-top: 50px">
            <p style="font-size: 10px;">I declare that the information provided in this form are correct, true and complete to the best of my knowledge and belief. If any information is found
                false, incorrect, incomplete or if any ineligibility is detected before or after the examination, any action can be taken against me by the Commission
                including cancellation of my candidature.</p>
        </div>

        <div style=" text-align: right">
            <img src="{{ $job->company->logo }}" width="200" height="80"
                            alt="Profile Picture" style="margin: 0px; padding:0px;">
            <p style="font-size: 10px;">-------------- Applicant's Signature --------------</p>
            
        </div>
    </div>
    <footer>
            <a href="" style="font-size: 8px; text-decoration: none">Verify This Registration: {{ route('verify.application', ['job_id' => $job->id , 'candidate_id' => $candidate->id]) }}</a>
    </footer>
</body>

</html>
