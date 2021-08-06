<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class RuleEmailUniqueOnUpdateUser implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $newEmail)
    {
        User::find(request()->id)->email;
        // $oldEmail = request()->user->email;
        if ($newEmail === $oldEmail){
            return true;
        }else{
            $kiemtra = User::where('email', $newEmail)->count();
        }
       
       if($kiemtra > 0){
           return false;
       }
       return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'email đã tồn tại';
    }
}
