<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            ],
            'password_confirmation' => 'required',
        ];
    }

    /**
     * Customize error messages.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function messages(): array
    {
        return [
            //
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp',
            'password.min' => 'Mật khẩu cần ít nhất 8 kí tự',
            'password_confirmation.required' => 'Vui lòng nhập trường này.',
        ];
    }
}
