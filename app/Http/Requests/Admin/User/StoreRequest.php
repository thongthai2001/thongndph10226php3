<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:100',
            'password' => 'required|min:3|max:10',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'role' => 'required|in:' . implode(',', config('common.user.role')),
            'gender' => 'required|in:' . implode(',', config('common.user.gender')),
            
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'Họ tên không được vượt quá 100 kí tự',
            'email.email' => 'Email sai định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.min' => 'ít nhất 3 kí tự',
            'password.max' => 'không quá 10 kí tự',


        ];
    }

    public function attributes(){
        return [
            'name' => 'Họ tên',
            'email' => 'email',
            'password' => 'password',
            'address' => 'Địa chỉ',
            'role' => 'Tài khoản',
            'gender' => 'Giới tính',

        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     if ($this->ajax() == false){
    //         super.failedValidation();
    //     }else {
    //         throw new HttpReponseException(
    //             reponse()->json($validator->errors()),
    //             422
    //         );
    //     }
    // }   
}
