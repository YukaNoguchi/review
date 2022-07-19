<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|max:20',
            'bio' => 'max:500',
            'file' => 'image'
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
            'file' => 'アイコン',
            'name' => 'ユーザー名',
            'bio' => '自己紹介文'
        ];
    }
}
