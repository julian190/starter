<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            //
            'name'=>'Required',
            'price'=>'Required|numeric',
            'details'=>'Required'
        ];
    }

    function messages()
    {
        return [
          'name.required'=>'a7a ya daghal el Ism',
          'price.required'=>'a7a ya daghal el Seer',
          'price.numeric'=>'a7a ya raqem ya ahbal',
          'details.required'=>'a7a ya daghal el tafasil'
        ];
    }
}
