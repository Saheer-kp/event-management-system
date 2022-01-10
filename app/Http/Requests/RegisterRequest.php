<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class RegisterRequest extends FormRequest
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
        Validator::extend("check_age", function ($attribute, $value, $parameters, $validator) {
            if(Carbon::parse($value)->age < 18) {
                return false;
            }
            return true;
        });

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'date_of_birth' => 'required|date|before:today|check_age',
        ];
    }

    public function messages()
    {
        return [
            'check_age' => 'Age is must be 18 or more'
        ];
    }
}
