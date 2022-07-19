<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailUpdateRequest extends FormRequest
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
     * validationルール
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email'
        ];
    }

    /**
     * 項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'メールアドレス'
        ];
    }
}
