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
                'descricao_denuncia'=> 'Venda de animais'
            ]
        );
        DB::table('Motivos_Denuncia')->insert(
            [
                'descricao_denuncia'=> 'Conteudo impróprio'
            ]
        );
        DB::table('Motivos_Denuncia')->insert(
            [
                'descricao_denuncia'=> 'Postagem falsa'
            ]
        );
        DB::table('Motivos_Denuncia')->insert(
            [
                'descricao_denuncia'=> 'Outro'
            ]
        );
    }
}
