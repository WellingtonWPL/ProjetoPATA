<?php

namespace App\Http\Controllers\Auth;

use App\Cidade;
use App\Estado;
use App\User;
use App\FotoUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/lista';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.(new User())->getTable()],
            'senha' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:senha' ],
            ]);
        }

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\User
         */
        protected function create(array $data)
        {
            $user = User::create([
                'nome' => $data['nome'],
                'email' => $data['email'],
                'telefone' => $this->arrumaTelefone($data['fone']),
                'contato' => $data['contato'],
                'descricao' => $data['desc'], 
                'admin' => 'nao',
                'cod_cidade' => $data['cidade'],
                'senha' => Hash::make($data['senha']),
                
                
            ]);
            $foto = $data['fotos'][0];
            $cod_usuario = $user->cod_usuario;
            $this->insereFoto($foto, $cod_usuario);

            return $user;
        }


        private function insereFoto($imag, $cod_usuario){
            $foto = new FotoUsuario();
 
                $image = $imag;
                list($type, $image) = explode(";", $image);
                list(, $image)      = explode(",", $image);
                $image = base64_decode($image);
                $image_name= time().'.jpg';
                $path = public_path('uploadUsuario\\'.$image_name);
                $link = 'uploadUsuario\\'.$image_name;
        
                file_put_contents($path, $image);
        
                $foto->link_foto_usuario= $link;
                $foto->cod_usuario= $cod_usuario;
        
                $foto->save();

        }

        private function arrumaTelefone($fone){

            $caracteresEspeciais = array("(", ")", " ", "-");
            return str_replace($caracteresEspeciais, "", $fone);

        }

        public function showRegistrationForm(){
            $estados = Estado::all()->sortBy('sigla_estado');
            $cidades = Cidade::all()->sortBy('nome_cidade');
            return view('cadastrar', compact('estados', 'cidades'));
        }
}
