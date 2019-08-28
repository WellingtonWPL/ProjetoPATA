<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->senha, $user->senha)){
                Auth::login($user, true);
            }
        } 
        return redirect('/lista');
    }
}
