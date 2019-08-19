<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

$states = [
    [
        
        "nome_estado" => "Rondônia",
        "sigla_estado" => "RO",
    ], [
        
        "nome_estado" => "Acre",
        "sigla_estado" => "AC",
    ], [
        
        "nome_estado" => "Amazonas",
        "sigla_estado" => "AM",
    ], [
        
        "nome_estado" => "Roraima",
        "sigla_estado" => "RR",
    ], [
        
        "nome_estado" => "Pará",
        "sigla_estado" => "PA",
    ], [
        
        "nome_estado" => "Amapá",
        "sigla_estado" => "AP",
    ], [
        
        "nome_estado" => "Tocantins",
        "sigla_estado" => "TO",
    ], [
        
        "nome_estado" => "Maranhão",
        "sigla_estado" => "MA",
    ], [
        
        "nome_estado" => "Piauí",
        "sigla_estado" => "PI",
    ], [
        
        "nome_estado" => "Ceará",
        "sigla_estado" => "CE",
    ], [
        
        "nome_estado" => "Rio Grande do Norte",
        "sigla_estado" => "RN",
    ], [
        
        "nome_estado" => "Paraíba",
        "sigla_estado" => "PB",
    ], [
        
        "nome_estado" => "Pernambuco",
        "sigla_estado" => "PE",
    ], [
        
        "nome_estado" => "Alagoas",
        "sigla_estado" => "AL",
    ], [
        
        "nome_estado" => "Sergipe",
        "sigla_estado" => "SE",
    ], [
        
        "nome_estado" => "Bahia",
        "sigla_estado" => "BA",
    ], [
        
        "nome_estado" => "Minas Gerais",
        "sigla_estado" => "MG",
    ], [
        
        "nome_estado" => "Espírito Santo",
        "sigla_estado" => "ES",
    ], [
        
        "nome_estado" => "Rio de Janeiro",
        "sigla_estado" => "RJ",
    ], [
        
        "nome_estado" => "São Paulo",
        "sigla_estado" => "SP",
    ], [
        
        "nome_estado" => "Paraná",
        "sigla_estado" => "PR",
    ], [
        
        "nome_estado" => "Santa Catarina",
        "sigla_estado" => "SC",
    ], [
        
        "nome_estado" => "Rio Grande do Sul",
        "sigla_estado" => "RS",
    ], [
        
        "nome_estado" => "Mato Grosso do Sul",
        "sigla_estado" => "MS",
    ], [
        
        "nome_estado" => "Mato Grosso",
        "sigla_estado" => "MT",
    ], [
        
        "nome_estado" => "Goiás",
        "sigla_estado" => "GO",
    ], [
        
        "nome_estado" => "Distrito Federal",
        "sigla_estado" => "DF",
    ],
];

        foreach ($states as $estado)
        DB::table('Estado')->insert($estado);
    }
}
