<?php

namespace App\Http\Requests\Admin\Visit;

use Illuminate\Foundation\Http\FormRequest;

class VisitUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required',
            'individual_registration' =>'required',
            'general_record' =>'required',
            'phone_number' =>'required',
            'image' => 'required',
            'date' =>'required|date_format:d/m/Y',
            'status' => 'required',
            'unit_id' =>'required'
        ];
    }
}
