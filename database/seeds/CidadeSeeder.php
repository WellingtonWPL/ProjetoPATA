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
            "cod_estado" => $this->codEstado('AC'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Maceió",
            "cod_estado" => $this->codEstado('AL'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Macapá",
            "cod_estado" => $this->codEstado('AP'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Manaus",
            "cod_estado" => $this->codEstado('AM'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Salvador",
            "cod_estado" => $this->codEstado('BA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Fortaleza",
            "cod_estado" => $this->codEstado('BA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Brasília",
            "cod_estado" => $this->codEstado('DF'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Vitória",
            "cod_estado" => $this->codEstado('ES'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Goiânia",
            "cod_estado" => $this->codEstado('GO'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "São Luís",
            "cod_estado" => $this->codEstado('MA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Cuiabá",
            "cod_estado" => $this->codEstado('MT'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Campo Grande",
            "cod_estado" => $this->codEstado('MS'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Belo Horizonte",
            "cod_estado" => $this->codEstado('MG'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Belém",
            "cod_estado" => $this->codEstado('PA'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "João Pessoa",
            "cod_estado" => $this->codEstado('PB'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Curitiba",
            "cod_estado" => $this->codEstado('PR'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Recife",
            "cod_estado" => $this->codEstado('PE'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Teresina",
            "cod_estado" => $this->codEstado('PI'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Rio de Janeiro",
            "cod_estado" => $this->codEstado('RJ'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Natal",
            "cod_estado" => $this->codEstado('RN'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Porto Alegre",
            "cod_estado" => $this->codEstado('RS'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Porto Velho",
            "cod_estado" => $this->codEstado('RO'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Boa Vista",
            "cod_estado" => $this->codEstado('RR'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Florianópolis",
            "cod_estado" => $this->codEstado('SC'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "São Paulo",
            "cod_estado" => $this->codEstado('SP'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Aracaju",
            "cod_estado" => $this->codEstado('SE'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Palmas",
            "cod_estado" => $this->codEstado('TO'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Ponta Grossa",
            "cod_estado" => $this->codEstado('PR'),
            ]

        );
        DB::table('Cidade')->insert(
            [
            "nome_cidade" => "Castro",
            "cod_estado" => $this->codEstado('PR'),
            ]

        );


    }


}
