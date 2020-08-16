<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerRequest extends FormRequest
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
            'name_ar' =>'required|max:100|unique:offers,name_ar',
            'name_en' =>'required|max:100|unique:offers,name_en',
            'price' =>'required|numeric',
            'details_ar' =>'required',
            'details_en' =>'required',
        ];
    }

    public  function messages()
    {
        return [
            'name_ar.required' => __('messages.offername require'),
            'name_ar.unique'=> __('messages.offernameunique'),
            'name_en.required' => __('messages.offername require'),
            'name_en.unique'=> __('messages.offernameunique'),
            'price.numeric' => __('messages.offerpricenumeric'),
            'price.required' => __('messages.offerpricerequired'),
            'details_ar.required'=> __('messages.offerdatailsrequire'),
            'details_en.required'=> __('messages.offerdatailsrequire'),
        ];
    }
}
