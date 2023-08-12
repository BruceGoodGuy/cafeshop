<?php
namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


class UserRepository implements UserInterface {
    private User $user;
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function authentication(array $data): bool {
        $credential = [];
        $credential['email'] = $data['email'];
        $credential['password'] = $data['password'];
        $credential['status'] = 1;

        return Auth::attempt($credential, isset($data['remember']));
    }

    public function resetPassword(array $data): string {
        $user = $this->user->where([['email', '=', $data['email']], ['status', '=', 1]])->first();
        if ($user) {
            view()->share(['name' => $user->name, 'mail' => Crypt::encryptString($data['email']),]);
            return Password::sendResetLink($data);
        }

        return Password::INVALID_USER;
    }

    public function updatePassword($data) {
        return Password::reset(
            $data,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
    }
}