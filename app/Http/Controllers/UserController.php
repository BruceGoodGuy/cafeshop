<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Crypt;
use DB;

class UserController extends Controller
{
    private UserInterface $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        return view('back.login');
    }

    public function authentication(UserLoginRequest $request)
    {
        if ($this->userRepository->authentication($request->only(['email', 'password', 'remember']))) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors(['password' => 'Thông tin đăng nhập không đúng.'])->withInput();
    }

    public function forget()
    {
        return view('back.forget_password');
    }

    public function submitForget(ForgetPasswordRequest $request)
    {
        $mail = $request->only(['email']);
        $status = $this->userRepository->resetPassword($request->only(['email']));
        if ($status === Password::RESET_LINK_SENT) {
            return view('back.confirm_reset_password', $mail);
        }

        return redirect()->back()->withErrors(['email' =>  __($status)])->withInput();
    }

    public function resetForm(string $token) {
        return view('back.resetpassword', ['token' => $token]);
    }

    public function resetPassword(string $token, ResetPasswordRequest $request) {
        try {
            [$token, $emailencrypt] = explode('+', $request->token);
            $email = Crypt::decryptString($emailencrypt);
            $data = $request->only('password');
            $data['email'] = $email;
            $data['token'] = $token;
            $status = $this->userRepository->updatePassword($data);
            if ($status === Password::PASSWORD_RESET) {
                return redirect()->route('login')->with('success', __($status));
            }
            return redirect()->back()->withErrors(['password' => [__($status)]]);
        } catch (\Throwable $error) {
            return redirect()->route('login')->with('danger', 'Token không hợp lệ');
        }
    }
}
