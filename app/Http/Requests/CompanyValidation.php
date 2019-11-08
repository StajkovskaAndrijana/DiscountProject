<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyValidation extends FormRequest
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
            'name' => 'required|string',
            'type_of_discount' => 'required',
            'title' => 'required',
            'price' => 'required',
            'category' => 'required',
            'thumbnail' => 'required',
            'description' => 'required|string|min:10',
            'websiteLink' => 'required',
            'facebookLink' => 'required',
            'phoneNumber' => 'required',
            'companyEmail' => 'required|email',
            'googleMapsAddress' => 'required',
            'address' => 'required',
            'image' => 'required'
        ];
    }
}