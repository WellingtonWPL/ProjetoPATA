<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('Postagem_do_animal')->insert(
        //     [
        //     'nome_animal'=> 'Totó',
        //     'sexo'=>'macho',
        //     'nascimento'=>Carbon::parse('2018-01-01'),
        //     'descricao'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe fugiat odit doloremque itaque et, magni, eveniet quisquam asperiores animi atque temporibus vitae voluptatem ipsum similique deleniti officiis, quia quae ducimus.',
        //     'castrado'=>'sim',
        //     'vacinacao_em_dia'=>'sim',
        //     'vermifugado'=>'nao',
        //     'descricao_saude'=>'Tudo ok',
        //     'avaliacao'=> NULL,
        //     'cod_usuario_adotante'=> NULL,
        //     'cod_usuario_postagem'=>1,
        //     'cod_porte'=>2,
        //     'cod_especie'=> 1,
        //     'listagem_postagem'=> 'sim',
        //     ]
        // );

        DB::table('Postagem_do_animal')->insert(
            [
            'nome_animal'=> 'Cachorro Dog',
            'sexo'=>'femea',
            'nascimento'=>Carbon::parse('2015-02-01'),
            'descricao'=>'O nome é cachorro dog, pq eu achava q era macho, mas esses dias descobri q uma femea XD',
            'castrado'=>'sim',
            'vacinacao_em_dia'=>'sim',
            'vermifugado'=>'nao',
            'descricao_saude'=>'Tudo ok, mas as vezes ele dá um tossida',
            'avaliacao'=> NULL,
            'cod_usuario_adotante'=> NULL,
            'cod_usuario_postagem'=>1,
            'cod_porte'=>1,
            'cod_especie'=> 1,
            'listagem_postagem'=> 'sim',
            ]
        );
        DB::table('Postagem_do_animal')->insert(
            [
            'nome_animal'=> 'Gatop',
            'sexo'=>'femea',
            'nascimento'=>Carbon::parse('2015-02-01'),
            'descricao'=>'O nome é cachorro dog, pq eu achava q era macho, mas esses dias descobri q uma femea XD',
            'castrado'=>'sim',
            'vacinacao_em_dia'=>'sim',
            'vermifugado'=>'nao',
            'descricao_saude'=>'Tudo ok, mas as vezes ele dá um tossida',
            'avaliacao'=> NULL,
            'cod_usuario_adotante'=> NULL,
            'cod_usuario_postagem'=>1,
            'cod_porte'=>1,
            'cod_especie'=> 1,
            'listagem_postagem'=> 'sim',
            ]
        );
    }
}
