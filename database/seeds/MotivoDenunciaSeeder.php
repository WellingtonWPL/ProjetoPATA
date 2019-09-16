<?php

use Illuminate\Database\Seeder;

class MotivoDenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Motivos_Denuncia')->insert(
            [
                'descricao'=> 'Venda de animais'
            ]
        );
        DB::table('Motivos_Denuncia')->insert(
            [
                'descricao'=> 'Conteudo impróprio'
            ]
        );
        DB::table('Motivos_Denuncia')->insert(
            [
                'descricao'=> 'Postagem falsa'
            ]
        );
        DB::table('Motivos_Denuncia')->insert(
            [
                'descricao'=> 'Outro'
            ]
        );
    }
}
