<?php

use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    function codEstado($sigla){
        $cod= App\Estado::where('sigla_estado', $sigla)->value('cod_estado');
        return $cod;

    }

    public function run()
    {
        $estados = DB::table('Estado')->get();
        
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Rio Branco",
            "cod_estado_cidade" => $this->codEstado('AC'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Maceió",
            "cod_estado_cidade" => $this->codEstado('AL'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Macapá",
            "cod_estado_cidade" => $this->codEstado('AP'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Manaus",
            "cod_estado_cidade" => $this->codEstado('AM'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Salvador",
            "cod_estado_cidade" => $this->codEstado('BA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Fortaleza",
            "cod_estado_cidade" => $this->codEstado('BA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Brasília",
            "cod_estado_cidade" => $this->codEstado('DF'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Vitória",
            "cod_estado_cidade" => $this->codEstado('ES'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Goiânia",
            "cod_estado_cidade" => $this->codEstado('GO'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "São Luís",
            "cod_estado_cidade" => $this->codEstado('MA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Cuiabá",
            "cod_estado_cidade" => $this->codEstado('MT'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Campo Grande",
            "cod_estado_cidade" => $this->codEstado('MS'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Belo Horizonte",
            "cod_estado_cidade" => $this->codEstado('MG'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Belém",
            "cod_estado_cidade" => $this->codEstado('PA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "João Pessoa",
            "cod_estado_cidade" => $this->codEstado('PB'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Curitiba",
            "cod_estado_cidade" => $this->codEstado('PR'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Recife",
            "cod_estado_cidade" => $this->codEstado('PE'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Teresina",
            "cod_estado_cidade" => $this->codEstado('PI'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Rio de Janeiro",
            "cod_estado_cidade" => $this->codEstado('RJ'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Natal",
            "cod_estado_cidade" => $this->codEstado('RN'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Porto Alegre",
            "cod_estado_cidade" => $this->codEstado('RS'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Porto Velho",
            "cod_estado_cidade" => $this->codEstado('RO'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Boa Vista",
            "cod_estado_cidade" => $this->codEstado('RR'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Florianópolis",
            "cod_estado_cidade" => $this->codEstado('SC'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "São Paulo",
            "cod_estado_cidade" => $this->codEstado('SP'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Aracaju",
            "cod_estado_cidade" => $this->codEstado('SE'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Palmas",
            "cod_estado_cidade" => $this->codEstado('TO'),
            ]

        );


    }

   
}
