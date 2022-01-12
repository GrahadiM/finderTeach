<?php

namespace App\Http\Requests;

use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Snippet Code for Validation Image Start
            'current_password' => ['required', 'string', new CurrentPassword()],
            'password' => ['required', 'string', 'confirmed', Password::min(8)
            ->letters()
            ->numbers()
            ->uncompromised()],
            // Snippet Code End
        ];
    }
}
