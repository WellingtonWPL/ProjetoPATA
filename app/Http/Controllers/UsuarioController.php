<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        $errors = ['email' => trans('auth.failed')];

        if($user){
            if(Hash::check($request->senha, $user->senha)){
                Auth::login($user, true);
            }
        } 

        return redirect()->back()
        ->withInput($request->only($request->email, 'remember'))
        ->withErrors($errors);

        
        //return redirect('/lista');
    }

    public function loggedOut(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/lista');  

    }
}
