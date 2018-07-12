<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            $rules['name'] = 'required',
//            $rules['phone'] = 'required',
//            $rules['address'] = 'required',
//            $rules['field'] = 'required',
//            $rules['country_id'] = 'required',
//            $rules['visites_date'] = 'required',

        ];
    }
}