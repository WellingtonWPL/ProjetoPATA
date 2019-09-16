<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;



class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        // dd($exception);
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // // dd($exception->errorInfo[2]);

        // if($exception->errorInfo[2]=="TriggerError: usuario adotando proprio animal"){
        // // dd($exception);
        //     dd('nao pode adotar o proprio animal');
        //     $msg = 'Você não pode adotar seu proprio animal';
        //     return response()->view('sucesso', ['msg'=> $msg], 500);



        // }
        // if($exception->errorInfo[2]=="TriggerError: Alteração de avaliação sem finalizar adoção: "){
        //     // dd($exception);
        //         dd('nao pode adotar avaliar adoção não finalizada');
        //         $msg = 'Você não pode avaliar uma postagem não finalizada';
        //         return response()->view('sucesso', ['msg'=> $msg], 500);



        // }
        // if($exception->errorInfo[2]=="TriggerError: usuario denunciando própria postagem"){
        //     // dd($exception);
        //         // dd('nao pode denunciar a propria postagem');
        //         $msg = 'Você não pode denunciar seu proprio animal';
        //         return response()->view('sucesso', ['msg'=> $msg], 500);


        // }
        // if($exception->errorInfo[2]=='TriggerError: usuario denunciando a mesma postagem mais de uma vez'){
        //     // dd($exception);
        //         // dd('nao pode denunciar a propria postagem');
        //         $msg = 'Você não pode denunciar a mesma postagem várias vezes';
        //         return response()->view('sucesso', ['msg'=> $msg], 500);


        // }

        // if($exception->errorInfo[2]=='TriggerError: usuario solicitando a mesma postagem mais de uma vez'){
        //     // dd($exception);
        //         // dd('nao pode denunciar a propria postagem');
        //         $msg = 'Você não pode solicitar o mesmo animal mais de uma vez';
        //         return response()->view('sucesso', ['msg'=> $msg], 500);


        // }

        return parent::render($request, $exception);
    }

}
