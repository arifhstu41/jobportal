<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use App\Models\CandidateLanguage;
use App\Models\ContactInfo;
use App\Models\Earning;
use App\Models\Education;
use App\Models\Experience;
use App\Models\GeoCode;
use App\Models\JobRole;
use App\Models\PaymentModel;
use App\Models\PaymentVerification;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\UpdateCompanyPassNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\Location\Entities\City;
use Modules\Location\Entities\Country;
use Modules\Location\Entities\State;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class CandidateController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        abort_if(!userCan('candidate.view'), 403);
        // dd($request->all());
        $query = Candidate::with('user');

        // verified status
        if ($request->has('ev_status') && $request->ev_status != null) {
            $ev_status = null;
            if ($request->ev_status == 'true') {
                $query->whereHas('user', function ($q) use ($ev_status) {
                    $q->whereNotNull('email_verified_at');
                });
            } else {
                $query->whereHas('user', function ($q) use ($ev_status) {
                    $q->whereNull('email_verified_at');
                });
            }
        }

        if ($request->name && $request->name != null) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%$request->name%");
            });
        }

        if ($request->phone && $request->phone != null) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('phone', 'LIKE', "%$request->phone%");
            });
        }

        if ($request->email && $request->email != null) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'LIKE', "%$request->email%");
            });
        }

        if ($request->region && $request->region != null) {

            $query->where(function ($q) use ($request) {
                $q->where('region', '=', $request->region);
            });
        }

        if ($request->district && $request->district != null) {

            $query->where(function ($q) use ($request) {
                $q->where('district', '=', $request->district);
            });
        }

        if ($request->thana && $request->thana != null) {

            $query->where(function ($q) use ($request) {
                $q->where('thana', '=', $request->thana);
            });
        }

        if ($request->pourosova_union_porishod && $request->pourosova_union_porishod != null) {

            $query->where(function ($q) use ($request) {
                $q->where('pourosova_union_porishod', '=', $request->pourosova_union_porishod);
            });
        }

        if ($request->ward_no && $request->ward_no != null) {

            $query->where(function ($q) use ($request) {
                $q->where('ward_no', '=', $request->ward_no);
            });
        }

        if ($request->house_and_road_no && $request->house_and_road_no != null) {

            $query->where(function ($q) use ($request) {
                $q->where('house_and_road_no', '=', $request->house_and_road_no);
            });
        }

        // sortby
        if ($request->sort_by == 'latest' || $request->sort_by == null) {
            $query->latest();
        } else {
            $query->oldest();
        }

        $candidates = $query->paginate(10)->withQueryString();

        $filter = [
            "district"                 => @$request->district,
            "division"                 => @$request->region,
            "upazila"                  => @$request->thana,
            "union"                    => @$request->union,
            "house_and_road_no"        => @$request->house_and_road_no,
            "pourosova_union_porishod" => @$request->pourosova_union_porishod,
            "ward_no"                  => @$request->ward_no,
        ];

        $filter = (object) $filter;

        $wards = [];
        for ($i = 1; $i <= 10; $i++) {
            $wards[] = $i;
        }

        $divisions = DB::table('tblgeocode')
            ->where("geoLevelId", "1")
            ->orderBy('nameEn', 'asc')
            ->get();
        $districts = DB::table('tblgeocode')
            ->where("geoLevelId", "2")
            ->orderBy('nameEn', 'asc')
            ->get();

        $upazilas = DB::table('tblgeocode')
            ->where("geoLevelId", "3")
            ->orderBy('nameEn', 'asc')
            ->get();

        $unions = DB::table('tblgeocode')
            ->where("geoLevelId", "4")
            ->orderBy('nameEn', 'asc')
            ->get();

        $wards = DB::table('tblgeocode')
            ->where("geoLevelId", "5")
            ->orderBy('nameEn', 'asc')
            ->get();
        // $districts = DB::table( 'districts' )->get();
        // $upazilas  = DB::table( 'upazilas' )->get();
        // $unions    = DB::table( 'unions' )->get();

        return view('admin.candidate.index', compact('candidates', 'divisions', 'districts', 'unions', 'upazilas', 'filter', 'wards'));
    }

    // export pdf
    public function exportPDF(Request $request) {
        $query = Candidate::with('user');

        // verified status
        if ($request->has('ev_status') && $request->ev_status != null) {
            $ev_status = null;
            if ($request->ev_status == 'true') {
                $query->whereHas('user', function ($q) use ($ev_status) {
                    $q->whereNotNull('email_verified_at');
                });
            } else {
                $query->whereHas('user', function ($q) use ($ev_status) {
                    $q->whereNull('email_verified_at');
                });
            }
        }

        if ($request->name && $request->name != null) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%$request->name%");
            });
        }

        if ($request->phone && $request->phone != null) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('phone', 'LIKE', "%$request->phone%");
            });
        }

        if ($request->email && $request->email != null) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'LIKE', "%$request->email%");
            });
        }

        if ($request->region && $request->region != null) {

            $query->where(function ($q) use ($request) {
                $q->where('region', '=', $request->region);
            });

            $division= GeoCode::where('id', $request->region)->pluck('nameEn')->first();
        }

        if ($request->district && $request->district != null) {

            $query->where(function ($q) use ($request) {
                $q->where('district', '=', $request->district);
            });
            $district= GeoCode::where('id', $request->district)->pluck('nameEn')->first();
        }

        if ($request->thana && $request->thana != null) {

            $query->where(function ($q) use ($request) {
                $q->where('thana', '=', $request->thana);
            });
            $upazila= GeoCode::where('id', $request->thana)->pluck('nameEn')->first();
        }

        if ($request->pourosova_union_porishod && $request->pourosova_union_porishod != null) {

            $query->where(function ($q) use ($request) {
                $q->where('pourosova_union_porishod', '=', $request->pourosova_union_porishod);
            });
            $union= GeoCode::where('id', $request->pourosova_union_porishod)->pluck('nameEn')->first();
        }

        if ($request->ward_no && $request->ward_no != null) {

            $query->where(function ($q) use ($request) {
                $q->where('ward_no', '=', $request->ward_no);
            });
        }

        if ($request->house_and_road_no && $request->house_and_road_no != null) {

            $query->where(function ($q) use ($request) {
                $q->where('house_and_road_no', '=', $request->house_and_road_no);
            });
        }

        // sortby
        if ($request->sort_by == 'latest' || $request->sort_by == null) {
            $query->latest();
        } else {
            $query->oldest();
        }
        $candidates = $query->get();

        $filter = [
            "district"                 => $district ?? '',
            "division"                 => $division ?? '',
            "upazila"                  => $thana ?? '',
            "union"                    => $union ?? '',
        ];

        // pdf part started
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData          = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf ([
            'format'       => 'A4',
            'fontDir'      => array_merge($fontDirs, [public_path() . '/fonts']),
            'fontdata'     => $fontData + [
                'bangla' => [
                    'R'          => 'Siyamrupali.ttf',
                    'B'          => 'Siyamrupali.ttf',
                    'I'          => 'Siyamrupali.ttf',
                    'BI'         => 'Siyamrupali.ttf',
                    'useOTL'     => 0xFF,
                    'useKashida' => 75,
                ],
            ],
            'default_font' => 'bangla',
        ]);

        $stylesheet = public_path('css/custom.css'); // external css
        // $stylesheet = public_path('css/bd-tables.css'); // external css
        $page       = view('admin.candidate.pdf', compact('candidates', 'filter')); //table part
        $mpdf->WriteHTML($stylesheet, 1);
        $title = "Candidate List.pdf";
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML('<img src="images/pad.png" alt="Welfare Pad" style="width: 100%">');
        $mpdf->WriteHTML($page);
        // $mpdf->WriteHTML("<p>Hello World</p>");
        $mpdf->SetHTMLFooter('<span style="color: #2e3397">© 2023 Welfare Family Bangladesh All Rights Reserved.</span>');
        $mpdf->Output($title, 'I');
    }

    public function state(Request $request) {
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json($states);
    }

    public function city(Request $request) {
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        abort_if(!userCan('candidate.create'), 403);

        $data['countries']           = Country::all();
        $data['job_roles']           = JobRole::all();
        $data['professions']         = Profession::all();
        $data['experiences']         = Experience::all();
        $data['educations']          = Education::all();
        $data['skills']              = Skill::all(['id', 'name']);
        $data['candidate_languages'] = CandidateLanguage::all(['id', 'name']);

        return view('admin.candidate.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userCreate($request) {
        $request->validate([
            'username'      => 'unique:users,username',
            'email'         => 'unique:users,email',
            'contact_phone' => 'required',
        ]);

        $password = $request->password ?? Str::random(8);

        $data = User::create([
            'role'              => 'candidate',
            'name'              => $request->name,
            'phone'             => $request->contact_phone,
            'username'          => Str::slug('K' . $request->name . '122'),
            'email'             => $request->email,
            'email_verified_at' => now(),
            'password'          => Hash::make($password),
            'remember_token'    => Str::random(10),
        ]);

        return [$password, $data];
    }
    public function candidateCreate($request, $data) {
        $dateTime = Carbon::parse($request->birth_date);
        $date     = $request['birth_date']     = $dateTime->format('Y-m-d H:i:s');

        $candidate = Candidate::where('user_id', $data[1]->id)->first();

        $candidate->update([
            "role_id"        => $request->role_id,
            "profession_id"  => $request->profession_id,
            "experience_id"  => $request->experience,
            "education_id"   => $request->education,
            "gender"         => $request->gender,
            "website"        => $request->website,
            "bio"            => $request->bio,
            "marital_status" => $request->marital_status,
            "birth_date"     => $date,
        ]);

        // cv
        if ($request->cv) {
            $pdfPath = "/file/candidates/";
            $pdf     = pdfUpload($request->cv, $pdfPath);

            $candidate->update([
                "cv" => $pdf,
            ]);
        }

        // image
        if ($request->image) {
            $path  = 'images/candidates';
            $image = uploadImage($request->image, $path);

            $candidate->update([
                "photo" => $image,
            ]);
        }

        // skills
        $skills = $request->skills;
        if ($skills) {
            $skillsArray = [];

            foreach ($skills as $skill) {
                $skill_exists = Skill::where('id', $skill)->orWhere('name', $skill)->first();

                if (!$skill_exists) {
                    $select_tag = Skill::create(['name' => $skill]);
                    array_push($skillsArray, $select_tag->id);
                } else {
                    array_push($skillsArray, $skill);
                }
            }

            $candidate->skills()->attach($skillsArray);
        }

        // languages
        $candidate->languages()->attach($request->languages);

        return $candidate;
    }

    public function store(CandidateRequest $request) {
        // dd($request->all());
        abort_if(!userCan('candidate.create'), 403);

        // $location = session()->get('location');
        // if (!$location) {

        //     $request->validate([
        //         'location' => 'required',
        //     ]);
        // }

        try {

            if ($request->image) {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif',
                ]);
            }
            if ($request->cv) {
                $request->validate([
                    "cv" => "mimetypes:application/pdf",
                ]);
            }

            $data = $this->userCreate($request);

            $candidate = $this->candidateCreate($request, $data);

            // Location
            // updateMap($candidate);

            // make Notification /
            // checkMailConfig() ? Notification::route('mail', $data[1]->email)->notify(new CandidateCreateNotification($data)) : '';

            flashSuccess('Candidate Created Successfully');
            return redirect()->route('candidate.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', config('app.debug') ? $th->getMessage() : 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($candidate) {
        abort_if(!userCan('candidate.view'), 403);
       
        $candidate    = Candidate::with('skills:id,name', 'languages:id,name')->where('id', $candidate)->first();
        if(!$candidate){
            flashError('Candidate not found!');
            return redirect('admin/candidate');
        }
        $user         = User::with('contactInfo')->FindOrFail($candidate->user_id);
        if(!$user){
            flashError('User not found!');
            return redirect('admin/candidate');
        }
        $appliedJobs  = $candidate->appliedJobs()->get();
       
        $bookmarkJobs = $candidate->bookmarkJobs()->get();
       
        return view('admin.candidate.show', compact('candidate', 'user', 'appliedJobs', 'bookmarkJobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate) {
        abort_if(!userCan('candidate.update'), 403);

        $user                = User::with('contactInfo')->findOrFail($candidate->user_id);
        $contactInfo         = ContactInfo::where('user_id', $user->id)->first();
        $job_roles           = JobRole::all();
        $professions         = Profession::all();
        $experiences         = Experience::all();
        $educations          = Education::all();
        $skills              = Skill::all(['id', 'name']);
        $candidate_languages = CandidateLanguage::all(['id', 'name']);
        $candidate->load('skills:id,name', 'languages:id,name');

        return view('admin.candidate.edit', compact('contactInfo', 'candidate', 'user', 'job_roles', 'professions', 'experiences', 'educations', 'skills',
            'candidate_languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate) {
        abort_if(!userCan('candidate.update'), 403);

        if ($candidate->user->email == 'candidate@mail.com') {
            flashError('You can not update this candidate');
            return back();
        }

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $candidate->user_id,
        ]);

        $user = User::FindOrFail($candidate->user_id);
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $candidate->update([
            "role_id"        => $request->role_id,
            'profession_id'  => $request->profession,
            'experience_id'  => $request->experience,
            'education_id'   => $request->education,
            'gender'         => $request->gender,
            'website'        => $request->website,
            'bio'            => $request->bio,
            "marital_status" => $request->marital_status,
            "birth_date"     => date('Y-m-d', strtotime($request->birth_date)),
        ]);

        // password change
        if ($request->password) {
            $request->validate([
                'password' => 'required',
            ]);
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // image
        if ($request->image) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            $old_photo = $candidate->photo;
            if (file_exists($old_photo)) {
                if ($old_photo != 'backend/image/default.png') {
                    unlink($old_photo);
                }
            }
            $path  = 'images/candidates';
            $image = uploadImage($request->image, $path);

            $candidate->update([
                "photo" => $image,
            ]);
        }
        // cv
        if ($request->cv) {
            $request->validate([
                "cv" => "mimetypes:application/pdf",
            ]);
            $pdfPath = "/file/candidates/";
            $pdf     = pdfUpload($request->cv, $pdfPath);

            $candidate->update([
                "cv" => $pdf,
            ]);
        }

        // Location
        // updateMap($candidate);

        // skills
        $skills = $request->skills;
        DB::table('candidate_skill')->where('candidate_id', $candidate->id)->delete();

        if ($skills) {
            $skillsArray = [];

            foreach ($skills as $skill) {
                $skill_exists = Skill::where('id', $skill)->orWhere('name', $skill)->first();

                if (!$skill_exists) {
                    $select_tag = Skill::create(['name' => $skill]);
                    array_push($skillsArray, $select_tag->id);
                } else {
                    array_push($skillsArray, $skill_exists->id);
                }
            }

            $candidate->skills()->attach($skillsArray);
        }

        // languages
        $candidate->languages()->sync($request->languages);

        if ($request->password) {
            // make Notification /
            $data[] = $user;
            $data[] = $request->password;
            $data[] = 'Candidate';

            checkMailConfig() ? Notification::route('mail', $user->email)->notify(new UpdateCompanyPassNotification($data)) : '';
        }
        flashSuccess('Candidate Updated Successfully');
        return back();
        // return redirect()->route('candidate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate) {
        if ($candidate->user->email == 'candidate@mail.com') {
            flashError('You can not delete this candidate');
            return back();
        }

        abort_if(!userCan('candidate.delete'), 403);

        $user = User::FindOrFail($candidate->user_id);
        $user->delete();

        if (file_exists($candidate->cv)) {
            unlink($candidate->cv);
        }

        if (file_exists($candidate->photo)) {
            if ($candidate->photo != 'backend/image/default.png') {
                unlink($candidate->photo);
            }
        }
        
        // delete earnings and payments and payment verifications
        Earning::where('user_id', $candidate->user_id)->delete();
        PaymentModel::where('user_id', $candidate->user_id)->delete();
        PaymentVerification::where('user_id', $candidate->user_id)->delete();

        $candidate->delete();

        flashSuccess('Candidate Deleted Successfully');
        return redirect()->back();
    }

    public function statusChange(Request $request) {
        $user = User::findOrFail($request->id);
        if ($user->email == 'candidate@mail.com') {
            flashError('You can not update status to this candidate');
            return back();
        }
        $user->status = $request->status;
        $user->save();

        if ($request->status == 1) {
            return responseSuccess('Candidate Activated Successfully');
        } else {
            return responseSuccess('Candidate Deactivated Successfully');
        }
    }
}
