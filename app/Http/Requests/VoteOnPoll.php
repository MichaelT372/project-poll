<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteOnPoll extends FormRequest
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
            'option' => 'required|min:1',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'option.required' => 'You must select an answer',
            'g-recaptcha-response.required' => 'You must complete the CAPTCHA'
        ];
    }
}
