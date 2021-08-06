<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            

        ];
    }
}
