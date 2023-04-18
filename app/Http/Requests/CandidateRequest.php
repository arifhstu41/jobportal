<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'name' => 'required',
            'phone' => ["required","unique:users,phone,{$this->candidate->user->id}", 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'email' => 'nullable|email|unique:users,email',
        ];
    }
}
