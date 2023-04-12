<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateFormRequest extends FormRequest
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
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'required|unique:users,"regex:/^(?:\+88|88)?(01[3-9]\d{8})$/",',
            'address' => 'required',
            'password' => 'required',
            'organization_type_id' => 'required',
            'industry_type_id' => 'required',
            'team_size_id' => 'nullable',
            'nationality_id' => 'required',
            'establishment_date' => 'nullable',
            'website' => 'nullable|url|max:255',
        ];
    }
}
