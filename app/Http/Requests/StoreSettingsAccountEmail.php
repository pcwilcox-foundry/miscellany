<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSettingsAccountEmail extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();
        $rules = [
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];

        // Social media account, no password
        if (empty($user->provider)) {
            $rules['password'] = 'required|hash:' . $user->getAuthPassword();
        }

        return $rules;
    }
}
