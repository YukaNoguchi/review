<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:30',
            'category' => 'required',
            'price' => 'required',
            'detail' => 'required|max:500',
            'images' => 'image'
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
            'name' => '商品名',
            'category' => 'カテゴリ',
            'price' => '値段',
            'detail' => '商品情報',
            'images' => '商品画像'
        ];
    }
}
