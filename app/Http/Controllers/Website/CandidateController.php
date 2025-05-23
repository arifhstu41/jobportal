<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use App\Models\Skill;
use App\Models\Company;
use App\Models\JobRole;
use App\Models\Candidate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profession;
use App\Models\SocialLink;
use App\Models\ContactInfo;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\CandidateResume;
use App\Models\CandidateLanguage;
use App\Http\Traits\Candidateable;
use Illuminate\Support\Facades\DB;
use Modules\Location\Entities\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\CandidateSkillAble;
use Illuminate\Support\Facades\Hash;
use Modules\Location\Entities\State;

class CandidateController extends Controller
{
    use Candidateable, CandidateSkillAble;

    public function dashboard()
    {
        $candidate = Candidate::where('user_id', auth()->id())->first();

        if (empty($candidate)) {

            $candidate = new Candidate();
            $candidate->user_id = auth()->id();
            $candidate->save();
        }

        $appliedJobs = $candidate->appliedJobs->count();
        $favoriteJobs = $candidate->bookmarkJobs->count();
        $jobs = $candidate->appliedJobs()->withCount(['bookmarkJobs as bookmarked' => function ($q) use ($candidate) {
            $q->where('candidate_id',  $candidate->id);
        }])
            ->latest()->limit(4)->get();
        $notifications = auth('user')->user()->notifications()->count();

        return view('website.pages.candidate.dashboard', compact('candidate', 'appliedJobs', 'jobs', 'favoriteJobs', 'notifications'));
    }

    public function allNotification()
    {

        $notifications = auth()->user()->notifications()->paginate(12);

        return view('website.pages.candidate.all-notification', compact('notifications'));
    }

    public function jobAlerts()
    {

        $notifications = auth()->user()->notifications()->where('type', 'App\Notifications\Website\Candidate\RelatedJobNotification')->paginate(12);

        return view('website.pages.candidate.job-alerts', compact('notifications'));
    }

    public function appliedjobs(Request $request)
    {

        $candidate = Candidate::where('user_id', auth()->id())->first();
        if (empty($candidate)) {

            $candidate = new Candidate();
            $candidate->user_id = auth()->id();
            $candidate->save();
        }

        $appliedJobs = $candidate->appliedJobs()->paginate(8);

        return view('website.pages.candidate.applied-jobs', compact('appliedJobs'));
    }

    public function bookmarks(Request $request)
    {
        $candidate = Candidate::where('user_id', auth()->id())->first();
        if (empty($candidate)) {

            $candidate = new Candidate();
            $candidate->user_id = auth()->id();
            $candidate->save();
        }

        $jobs = $candidate->bookmarkJobs()->withCount(['appliedJobs as applied' => function ($q) use ($candidate) {
            $q->where('candidate_id',  $candidate->id);
        }])->paginate(12);

        if (auth('user')->check() && auth('user')->user()->role == 'candidate') {
            $resumes = auth('user')->user()->candidate->resumes;
        } else {
            $resumes = [];
        }

        return view('website.pages.candidate.bookmark', compact('jobs', 'resumes'));
    }

    public function bookmarkCompany(Company $company)
    {

        $company->bookmarkCandidateCompany()->toggle(auth('user')->user()->candidate);
        return back();
    }

    public function setting()
    {
        
        $candidate = auth()->user()->candidate;

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->id()
            ]);
        }

        // for contact
        $contactInfo = ContactInfo::where('user_id', auth()->id())->first();
        $contact = [];
        if ($contactInfo) {
            $contact = $contactInfo;
        } else {
            $contact = '';
        }

        // for social link
        $socials = auth()->user()->socialInfo;

        // for candidate resume/cv
        $resumes = $candidate->resumes;

        $job_roles = JobRole::all();
        $experiences = Experience::all();
        $educations = Education::all();
        $nationalities = Nationality::all();
        $professions = Profession::all();
        $skills = Skill::all(['id', 'name']);
        $languages = CandidateLanguage::all(['id', 'name']);
        // $divisions = DB::table('divisions')->orderBy('name', 'asc')->get();
        // $districts = DB::table('districts')->where('division_id', $candidate->region)->orderBy('name', 'asc')->get();
        // $upazilas = DB::table('upazilas')->where('district_id', $candidate->district)->orderBy('name', 'asc')->get();
        // $unions = DB::table('unions')->where('upazilla_id', $candidate->thana)->orderBy('name', 'asc')->get();
        // $districts_parmanent = DB::table('districts')->where('division_id', $candidate->region_parmanent)->orderBy('name', 'asc')->get();
        // $upazilas_parmanent = DB::table('upazilas')->where('district_id', $candidate->district_parmanent)->orderBy('name', 'asc')->get();
        // $unions_parmanent = DB::table('unions')->where('upazilla_id', $candidate->thana_parmanent)->orderBy('name', 'asc')->get();
        // $wards= [];
        // for ($i=1; $i <=9 ; $i++) { 
        //     $wards[]= $i;
        // }

        /**
         * Present Address
         */

        $divisions = DB::table('tblgeocode')
        ->where("geoLevelId", "1")
        ->orderBy('nameEn', 'asc')
        ->get();

        $districts = DB::table('tblgeocode')
        ->where("geoLevelId", "2")
        ->where('parentGeoId', $candidate->region)
        ->orderBy('nameEn', 'asc')
        ->get();

        $upazilas = DB::table('tblgeocode')
        ->where('parentGeoId', $candidate->district)
        ->orderBy('nameEn', 'asc')
        ->get();

        $unions = DB::table('tblgeocode')
        ->where('parentGeoId', $candidate->thana)
        ->orderBy('nameEn', 'asc')
        ->get();

        $wards = DB::table('tblgeocode')
        ->where('parentGeoId', $candidate->pourosova_union_porishod)
        ->orderBy('nameEn', 'asc')
        ->get();

        /**
         * Permanent Address
         */
        $districts_parmanent = DB::table('tblgeocode')
        ->where("geoLevelId", "2")
        ->where('parentGeoId', $candidate->region)
        ->orderBy('nameEn', 'asc')
        ->get();

        $upazilas_parmanent = DB::table('tblgeocode')
        ->where('parentGeoId', $candidate->district)
        ->orderBy('nameEn', 'asc')
        ->get();

        $unions_parmanent = DB::table('tblgeocode')
        ->where('parentGeoId', $candidate->thana)
        ->orderBy('nameEn', 'asc')
        ->get();

        $wards_parmanent = DB::table('tblgeocode')
        ->where('parentGeoId', $candidate->pourosova_union_porishod_parmanent)
        ->orderBy('nameEn', 'asc')
        ->get();




        $candidate->load('skills', 'languages', 'experiences', 'educations');

        return view('website.pages.candidate.profile-setting', [
            'candidate' => $candidate->load('skills', 'languages'),
            'contact' => $contact,
            'socials' => $socials,
            'job_roles' => $job_roles,
            'experiences' => $experiences,
            'educations' => $educations,
            'nationalities' => $nationalities,
            'professions' => $professions,
            'resumes' => $resumes,
            'skills' => $skills,
            'candidate_languages' => $languages,
            'divisions' => $divisions,
            'districts' => $districts,
            'upazilas' => $upazilas,
            'unions' => $unions,
            'wards' => $wards,
            'districts_parmanent' => $districts_parmanent,
            'upazilas_parmanent' => $upazilas_parmanent,
            'unions_parmanent' => $unions_parmanent,
            'wards_parmanent' => $wards_parmanent
        ]);
    }
    public function accountSetting()
    {
        $candidate = auth()->user()->candidate;

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->id()
            ]);
        }

        // for contact
        $contactInfo = ContactInfo::where('user_id', auth()->id())->first();
        $contact = [];
        if ($contactInfo) {
            $contact = $contactInfo;
        } else {
            $contact = '';
        }

        // for social link
        // $socials = auth()->user()->socialInfo;

        // // for candidate resume/cv
        // $resumes = $candidate->resumes;

        $job_roles = JobRole::all();
        // $experiences = Experience::all();
        // $educations = Education::all();
        // $nationalities = Nationality::all();
        // $professions = Profession::all();
        // $skills = Skill::all(['id', 'name']);
        // $languages = CandidateLanguage::all(['id', 'name']);

        // $districts = DB::table('districts')->get();
        // $divisions = DB::table('divisions')->get();
        // $unions = DB::table('unions')->get();
        // $upazilas = DB::table('upazilas')->get();

        $candidate->load('skills', 'languages', 'experiences', 'educations');

        return view('website.pages.candidate.account-setting', [
            'candidate' => $candidate->load('skills', 'languages'),
            'contact' => $contact,
            // 'socials' => $socials,
            'job_roles' => $job_roles,
            // 'experiences' => $experiences,
            // 'educations' => $educations,
            // 'nationalities' => $nationalities,
            // 'professions' => $professions,
            // 'resumes' => $resumes,
            // 'skills' => $skills,
            // 'candidate_languages' => $languages,
            // 'divisions' => $divisions,
            // 'districts' => $districts,
            // 'unions' => $unions,
            // 'upazilas' => $upazilas
        ]);
    }

    public function getState(Request $request)
    {

        $states = State::where('country_id', $request->country_id)->get();
        return response()->json($states);
    }

    public function getCity(Request $request)
    {

        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

    public function settingUpdate(Request $request)
    {
        $user = User::FindOrFail(auth()->id());
        $candidate = Candidate::where('user_id', $user->id)->first();
        $contactInfo = ContactInfo::where('user_id', auth()->id())->first();
        $request->session()->put('type', $request->type);

        if ($request->type == 'basic') {
            $this->candidateBasicInfoUpdate($request, $user, $candidate);
            $candidate->update(['profile_complete' => $candidate->profile_complete != 0 ? $candidate->profile_complete - 25 : 0]);
            flashSuccess('Profile Updated');
            return back();
        }

        if ($request->type == 'profile') {
            // return  $request->skills;
            $this->candidateProfileInfoUpdate($request, $user, $candidate, $contactInfo);
            $candidate->update(['profile_complete' => $candidate->profile_complete != 0 ? $candidate->profile_complete - 25 : 0]);
            flashSuccess('Profile Updated');
            return back();
        }

        if ($request->type == 'social') {
            $this->socialUpdate($request);
            $candidate->update(['profile_complete' => $candidate->profile_complete != 0 ? $candidate->profile_complete - 25 : 0]);
            flashSuccess('Profile Updated');
            return back();
        }

        if ($request->type == 'contact') {
            $this->contactUpdate($request, $candidate);
            $candidate->update(['profile_complete' => $candidate->profile_complete != 0 ? $candidate->profile_complete - 25 : 0]);
            flashSuccess('Profile Updated');
            return back();
        }

        if ($request->type == 'alert') {
            $this->alertUpdate($request, $user, $candidate);
            flashSuccess('Profile Updated');
            return back();
        }

        if ($request->type == 'visibility') {
            $this->visibilityUpdate($request, $candidate);
            flashSuccess('Profile Updated');
            return back();
        }

        if ($request->type == 'password') {
            $this->passwordUpdate($request, $user, $candidate);
            flashSuccess('Profile Updated');
            return back();
        }

        if ($request->type == 'account-delete') {
            if ($user->email == 'candidate@mail.com') {
                flashError('You can not delete this candidate');
                return back();
            }

            $this->accountDelete($user);
        }

        return back();
    }

    public function candidateBasicInfoUpdate($request, $user, $candidate)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'date',
            'birth_date' =>  'required',
            'education' =>  'required',
            'experience' =>  'required',
        ]);
        $user->update(['name' => $request->name]);

        // Experience
        $experience_request = $request->experience;
        $experience = Experience::where('id', $experience_request)->first();

        if (!$experience) {
            $experience = Experience::create(['name' => $experience_request]);
        }

        // Education
        $education_request = $request->education;
        $education = Education::where('id', $education_request)->first();

        if (!$education) {
            $education = Education::create(['name' => $education_request]);
        }

        $dateTime = Carbon::parse($request->birth_date);
        $date = $request['birth_date'] = $dateTime->format('Y-m-d H:i:s');

        $candidate->update([
            'title' => $request->title,
            'experience_id' => $experience->id,
            'education_id' => $education->id,
            'website' => $request->website,
            'birth_date' => $date,
        ]);

        // image
        if ($request->image) {
            $request->validate([
                'image' =>  'image|mimes:jpeg,png,jpg,|max:2048'
            ]);

            deleteImage($candidate->photo);
            $path = 'images/candidates/'.auth()->user()->id;
            $image = uploadImage($request->image, $path);

            $candidate->update([
                "photo" => $image,
            ]);
        }
        // cv
        if ($request->cv) {
            $request->validate([
                "cv" => "mimetypes:application/pdf,jpeg,docs|max:5048",
            ]);
            $pdfPath = "/file/candidates/";
            $pdf = pdfUpload($request->cv, $pdfPath);

            $candidate->update([
                "cv" => $pdf,
            ]);
        }
        return true;
    }

    public function candidateProfileInfoUpdate($request, $User, $candidate, $contactInfo)
    {
        // dd($request->all());
        $request->validate([
            'nationality' => 'required',
            'name_bn' => 'required',
            'father_name' => 'required',
            'father_name_bn' => 'required',
            'mother_name' => 'required',
            'mother_name_bn' => 'required',
            // 'gender' => 'required',
            // 'marital_status' => 'required',
            'profession' => 'required',
            'care_of' =>  'required',
            'place' =>  'required',
            'post_office' =>  'required',
            'postcode' =>  'required',
            'thana' =>  'required',
            'district' =>  'required',
            'region' =>  'required',
        ]);

        if ($request->status == 'available_in') {
            $request->validate([
                'available_in' =>  'required'
            ]);
        }

        if (!$request->same_address) {
            $request->validate([
                'care_of_parmanent' =>  'required',
                'place_parmanent' =>  'required',
                'house_and_road_no_parmanent' =>  'required',
                'post_office_parmanent' =>  'required',
                'postcode_parmanent' =>  'required',
                // 'ward_no_parmanent' =>  'required',
                'pourosova_union_porishod_parmanent' =>  'required',
                'thana_parmanent' =>  'required',
                'district_parmanent' =>  'required',
                'region_parmanent' =>  'required',
            ]);
        }

        // Profession
        $profession_request = $request->profession;
        $profession = Profession::where('id', $profession_request)->orWhere('name', $profession_request)->first();

        if (!$profession) {
            $profession = Profession::create(['name' => $profession_request]);
        }


        $candidate->update([
            'name_bn' => $request->name_bn,
            'father_name' => $request->father_name,
            'father_name_bn' => $request->father_name_bn,
            'mother_name' => $request->mother_name,
            'mother_name_bn' => $request->mother_name_bn,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'birth_certificate_no' => $request->birth_certificate_no,
            'nid_no' => $request->nid_no,
            'passport_no' => $request->passport_no,
            'quota' => $request->quota,
            'bio' => $request->bio,
            'nationality_id' => $request->nationality,
            'profession_id' => $profession->id,
            'status' => $request->status,
            'available_in' => $request->available_in ? Carbon::parse($request->available_in)->format('Y-m-d') : null,
            'care_of' => $request->care_of,
            'place' => $request->place,
            'house_and_road_no' => $request->house_and_road_no,
            'post_office' => $request->post_office,
            'postcode' => $request->postcode,
            'thana' => $request->thana,
            'pourosova_union_porishod' => $request->pourosova_union_porishod,
            'ward_no' => $request->ward_no,
            'district' => $request->district,
            'region' => $request->region,
            'care_of_parmanent' => ($request->same_address) ? $request->care_of: $request->care_of_parmanent,
            'house_and_road_no_parmanent' => ($request->same_address) ? $request->house_and_road_no: $request->house_and_road_no_parmanent,
            'place_parmanent' => ($request->same_address) ? $request->place: $request->place_parmanent,
            'post_office_parmanent' => ($request->same_address) ? $request->post_office: $request->post_office_parmanent,
            'postcode_parmanent' => ($request->same_address) ? $request->postcode: $request->postcode_parmanent,
            'ward_no_parmanent' => ($request->same_address) ? $request->ward_no: $request->ward_no_parmanent,
            'pourosova_union_porishod_parmanent' => ($request->same_address) ? $request->pourosova_union_porishod: $request->pourosova_union_porishod_parmanent,
            'thana_parmanent' => ($request->same_address) ? $request->thana: $request->thana_parmanent,
            'district_parmanent' => ($request->same_address) ? $request->district: $request->district_parmanent,
            'region_parmanent' => ($request->same_address) ? $request->region: $request->region_parmanent,
        ]);

        // skill & language
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

        $candidate->languages()->sync($request->languages);

        return true;
    }

    public function contactUpdate($request)
    {
        $contact = ContactInfo::where('user_id', auth()->id())->first();

        if (empty($contact)) {
            ContactInfo::create([
                'user_id' => auth()->id(),
                'phone' => $request->phone,
                'secondary_phone' => $request->secondary_phone,
                'email' => $request->email,
                'secondary_email' => $request->secondary_email,
            ]);
        } else {
            $contact->update([
                'phone' => $request->phone,
                'secondary_phone' => $request->secondary_phone,
                'email' => $request->email,
                'secondary_email' => $request->secondary_email,
            ]);
        }

        // Location
        updateMap(auth()->user()->candidate);

        return true;
    }

    public function socialUpdate($request)
    {
        $user = User::find(auth()->id());

        $user->socialInfo()->delete();
        $social_medias = $request->social_media;
        $urls = $request->url;

        if ($social_medias && $urls) {
            foreach ($social_medias as $key => $value) {
                if ($value && $urls[$key]) {
                    $user->socialInfo()->create([
                        'social_media' => $value,
                        'url' => $urls[$key],
                    ]);
                }
            }
        }

        return true;
    }

    public function visibilityUpdate($request, $candidate)
    {
        $candidate->update([
            'visibility' => $request->profile_visibility ? 1 : 0,
            'cv_visibility' => $request->cv_visibility ? 1 : 0
        ]);

        return true;
    }

    public function passwordUpdate($request, $user, $candidate)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);
        auth()->logout();

        return true;
    }

    public function accountDelete($user)
    {
        $user->delete();
        return true;
    }

    public function alertUpdate($request, $user, $candidate)
    {
        $user->update([
            'recent_activities_alert' => $request->recent_activity ? 1 : 0,
            'job_expired_alert' => $request->job_expired ? 1 : 0,
            'new_job_alert' => $request->new_job ? 1 : 0,
            'shortlisted_alert' => $request->shortlisted ? 1 : 0
        ]);

        // Jobrole
        $candidate->update([
            'role_id' => $request->role_id,
            'received_job_alert' => $request->received_job_alert ? 1 : 0,
        ]);

        return true;
    }

    /**
     *  Candidate resume upload with normal form
     * @param $request
     */
    public function resumeStore(Request $request)
    {
        
        $request->validate([
            // 'resume_name' => 'required',
            // 'resume_file' => 'required|mimes:pdf|max:5120',
        ]);

        $candidate = auth()->user()->candidate;
        $data['name'] = $request->resume_name ?? "Basic Resume";
        $data['candidate_id'] = $candidate->id;

        // cv
        if ($request->resume_file) {
            $pdfPath = "file/candidates/";
            $file = uploadFileToPublic($request->resume_file, $pdfPath);
            $data['file'] = $file ?? "uploads/file/cv.pdf";
        }
        else{
            $data['file'] = "uploads/file/cv.pdf";
        }

        CandidateResume::create($data);

        return back()->with('success', 'Resume added successfully');
    }

    /**
     *  Candidate resume upload with normal form
     * @param $request
     */
    public function resumeStoreAjax(Request $request)
    {

        $request->validate([
            // 'resume_name' => 'required',
            // 'resume_file' => 'required|mimes:pdf|max:5120',
        ]);

        $candidate = auth()->user()->candidate;
        $data['name'] = $request->resume_name ?? "Blank resume";
        $data['candidate_id'] = $candidate->id;

        // cv
        if ($request->resume_file) {
            $pdfPath = "file/candidates/";
            $file = uploadFileToPublic($request->resume_file, $pdfPath);
            $data['file'] = $file ?? "uploads/file/cv.pdf";
        }
        else{
            $data['file'] = "uploads/file/cv.pdf";
        }

        CandidateResume::create($data);

        return response()->json(['success' => 'Resume added successfully']);
    }

    /**
     * Candidate all resume
     */
    public function getResumeAjax()
    {
        if (auth('user')->check() && auth('user')->user()->role == 'candidate') {
            $resumes = auth('user')->user()->candidate->resumes()->latest()->get();
        } else {
            $resumes = [];
        }

        return response()->json($resumes);
    }

    public function resumeUpdate(Request $request)
    {
        $request->validate([
            // 'resume_name' => 'required',
        ]);

        $resume = CandidateResume::where('id', $request->resume_id)->first();
        $candidate = auth()->user()->candidate;
        $data['name'] = $request->resume_name?? "Basic Resume";
        $data['candidate_id'] = $candidate->id;

        // cv
        if ($request->resume_file) {
            $request->validate([
                'resume_file' => 'required|mimes:pdf|max:5120',
            ]);
            deleteFile($resume->file);
            $pdfPath = "file/candidates/";
            $file = uploadFileToPublic($request->resume_file, $pdfPath);
            $data['file'] = $file ?? "uploads/file/cv.pdf";
        }else{
            $data['file'] = "uploads/file/cv.pdf";
        }

        $resume->update($data);

        return back()->with('success', 'Resume updated successfully');
    }

    public function resumeDelete(CandidateResume $resume)
    {
        deleteFile($resume->file);
        $resume->delete();

        return back()->with('success', 'Resume deleted successfully');
    }
}
