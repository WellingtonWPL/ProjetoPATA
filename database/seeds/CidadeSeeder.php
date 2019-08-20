<?php

use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = DB::table('Estado')->get();
        
        DB::table('Estado')->insert(
            [
            "nome_cidade" => "Rio Branco",
            "cod_estado_cidade" => codEstado('AC'),
            ]

        );
        DB::table('Estado')->insert(
            [
            "nome_cidade" => "Maceió",
            "cod_estado_cidade" => codEstado('AL'),
            ]

        );
        DB::table('Estado')->insert(
            [
            "nome_cidade" => "Macapá",
            "cod_estado_cidade" => codEstado('AP'),
            ]

        );
        DB::table('Estado')->insert(
            [
            "nome_cidade" => "Manaus",
            "cod_estado_cidade" => codEstado('AM'),
            ]

        );
        DB::table('Estado')->insert(
            [
            "nome_cidade" => "Salvador",
            "cod_estado_cidade" => codEstado('BA'),
            ]

        );



    }

    function codEstado($sigla){
        $cod= App\Estado::where('sigla_cod', $sigla)->first();
        return $cod;

    }
}
