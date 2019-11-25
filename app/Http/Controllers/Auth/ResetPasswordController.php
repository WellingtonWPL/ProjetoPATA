<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // protected function rules()
    // {
    //     return [
    //         'token' => 'required',
    //         'email' => 'required|email',
    //         'senha' => 'required|min:8',
    //         'password_confirmation' => 'required|string|min:8|same:senha',
    //     ];
    // }

    // protected function credentials(Request $request)
    // {
    //     return $request->only(
    //         'email', 'senha', 'password_confirmation', 'token'
    //     );
    // }

    protected function resetPassword($user, $password)
    {
        $user->senha = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }
}
