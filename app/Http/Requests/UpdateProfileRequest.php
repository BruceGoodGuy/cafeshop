<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|max:100|min:4',
            'phonenumber' => 'required|numeric|digits_between:10,11',
            'username' => 'nullable|min:4|max:50|alpha_num:ascii',
            'location' => 'max:200',
            'full' => 'max:500',
            'password' => ['nullable','confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            ],
            'password_confirmation' => 'required_with:password'
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
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Họ và tên tối thiểu 4 kí tự và tối đa 100 kí tự',
            'name.max' => 'Họ và tên tối thiểu 4 kí tự và tối đa 100 kí tự',
            'phonenumber.required' => 'Vui lòng nhập số điện thoại',
            'phonenumber.numeric' => 'Số điện thoại không đúng định dạng',
            'phonenumber.digits_between' => 'Số điện thoại không đúng định dạng',
            'username.min' => 'Username tối thiểu 4 kí tự và tối đa 50 kí tự',
            'username.max' => 'Username tối thiểu 4 kí tự và tối đa 50 kí tự',
            'username.alpha_num' => 'Username chỉ chấp nhận số và chữ cái',
            'location.max' => 'Vị trí tối đa 200 kí tự',
            'full.max' => 'Mô tả tối đa 500 kí tự',
            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp',
            'password.min' => 'Mật khẩu cần ít nhất 8 kí tự',
            'password_confirmation.required_with' => 'Vui lòng nhập lại mật khẩu.'
        ];
    }
}
