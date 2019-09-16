<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd('dsa');
        if(Auth::check()){
            $usuario = Auth::user();
            if($usuario->admin == 'nao'){
                $msg = 'Para acessar essa página é necessario ser administrador do sistema';
                // dd($msg);
                // return view('sucesso', ['msg'=>$msg]);
                return new Response(view('sucesso', ['msg'=>$msg]));
            }

        }else{
            return redirect('login');
        }
        return $next($request);
    }
}
