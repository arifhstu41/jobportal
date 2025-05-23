<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'category_id'  => 'required',
            'role_id'  => 'required',
            'experience' => 'required',
            'education'  => 'required',
            'job_type'  => 'required',
            'vacancies'  => 'required',
            'min_salary'  => 'nullable|numeric',
            'max_salary' => 'nullable|numeric',
            'salary_type' => 'required',
            'deadline' => 'required|date',
            'description' => 'required',
            'featured' => 'nullable|numeric',
            'is_remote' => 'nullable|numeric',
            'apply_on' => 'required',
            // 'location' => $this->method() == 'PUT' ? '' : Rule::requiredIf(!session('location'))
        ];
    }
}
