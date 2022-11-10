<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UserRequest extends FormRequest
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
        $routeName = $this->path();

        if($routeName === 'api/auth/login') {
            return [
                'phone_number' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric'
            ];
        }
        if($routeName === 'api/auth/verify') {
            return [
                'code' => 'required|numeric'
            ];
        }

        return  [];
    }
}
