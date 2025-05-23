<?php

namespace App\Http\Traits;

use App\Models\CandidateEducation;
use Illuminate\Http\Request;
use App\Models\CandidateExperience;

trait CandidateSkillAble
{
    public function experienceStore(Request $request){
        $request->session()->put('type', 'experience');

        $request->validate([
            'company' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'start' =>  'required',
            'end' => 'sometimes',
        ]);

        $start_date = $request->start ? formatTime($request->start, 'Y-m-d'): null;
        $end_date = $request->end ? formatTime($request->end, 'Y-m-d'): null;

        CandidateExperience::create([
            'candidate_id' => currentCandidate()->id,
            'company' => $request->company,
            'department' => $request->department,
            'designation' => $request->designation,
            'start' => $start_date,
            'end' => $end_date,
            'responsibilities' => $request->responsibilities,
        ]);

        return back()->with('success', 'Experience added successfully');
    }

    public function experienceUpdate(Request $request){

        $request->session()->put('type', 'experience');

        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'start' =>  'required',
            'end' => 'sometimes',
        ]);

        $experience = CandidateExperience::findOrFail($request->experience_id);

        $start_date = $request->start ? formatTime($request->start, 'Y-m-d'): null;
        $end_date = $request->end ? formatTime($request->end, 'Y-m-d'): null;

        $experience->update([
            'candidate_id' => currentCandidate()->id,
            'company' => $request->company,
            'department' => $request->department,
            'designation' => $request->designation,
            'start' => $start_date,
            'end' => $end_date,
            'responsibilities' => $request->responsibilities,
        ]);

        return back()->with('success', 'Experience updated successfully');
    }

    public function experienceDelete(CandidateExperience $experience){
        session()->put('type', 'experience');

        $experience->delete();
        return back()->with('success', 'Experience deleted successfully');
    }

    public function educationStore(Request $request){
        $request->session()->put('type', 'experience');

        $request->validate([
            'degree' => 'required',
            'year' => 'required',
            'level' => 'required',
            'institute' => 'required',
            'result' => 'required',
        ]);

        CandidateEducation::create([
            'candidate_id' => currentCandidate()->id,
            'level' => $request->level,
            'degree' => $request->degree,
            'year' => $request->year,
            'institute' => $request->institute,
            'result_gpa' => $request->result,
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Education added successfully');
    }

    public function educationUpdate(Request $request){
        $request->session()->put('type', 'experience');

        $request->validate([
            'level' => 'required',
            'degree' => 'required',
            'year' => 'required',
            'institute' => 'required',
            'result' => 'required',
        ]);

        $education = CandidateEducation::findOrFail($request->education_id);

        $education->update([
            'candidate_id' => currentCandidate()->id,
            'level' => $request->level,
            'degree' => $request->degree,
            'year' => $request->year,
            'institute' => $request->institute,
            'result_gpa' => $request->result,
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Education updated successfully');
    }

    public function educationDelete(CandidateEducation $education){
        session()->put('type', 'experience');

        $education->delete();
        return back()->with('success', 'Education deleted successfully');
    }
}
