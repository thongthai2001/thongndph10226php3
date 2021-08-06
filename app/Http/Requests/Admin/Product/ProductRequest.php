<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',

        ];
    }

    public function attributes(){
        return [
            'name' => 'Họ tên',
            'price' => 'Giá',
            'quantity' => 'Số lượng',

        ];
    }
}
