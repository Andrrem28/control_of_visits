<?php

namespace App\Http\Requests\Admin\Institution;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'building_number' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ];
    }
}
