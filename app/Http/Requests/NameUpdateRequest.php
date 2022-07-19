<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NameUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255'
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
            'name' => 'アカウント名'
        ];
    }
}
