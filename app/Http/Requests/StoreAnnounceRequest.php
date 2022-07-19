<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnounceRequest extends FormRequest
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
            'title' => 'required|max:40',
            'contents' => 'required|max:1000'
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
            'title' => 'タイトル',
            'contents' => '本文'
        ];
    }
}
