<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

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
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '使用者名稱已被使用，請重新填寫',
            'name.regex' => '使用者名稱只支援英文、數字、橫線和底線。',
            'name.between' => '使用者名稱必須介於3~25個字之間。',
            'name.required' => '使用者名稱不能為空。',
        ];
    }

}
