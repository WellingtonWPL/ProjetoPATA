<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Usuario')->insert(
            [
            "nome" => "Pedro Brandalise",
            "email" => 'pedroaugustopb@gmail.com',
            "senha" => bcrypt('senha123'),
            "telefone" => '42999935898',
            "contato" => '42999935898',
            "descricao"=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque vitae officia quo adipisci consequatur dignissimos quos molestias voluptatem ex ab dolorum nesciunt possimus asperiores enim quasi earum, nihil ducimus labore.',
            "admin" => "sim",
            "cod_cidade" => 16,            
            ]
        );
        DB::table('Usuario')->insert(
            [
            "nome" => "Bruno Otavio",
            "email" => 'brunootavioramos13@gmail.com',
            "senha" => md5('senha1234'),
            "telefone" => '42998086976',
            "contato" => '42998086976',
            "descricao"=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque vitae officia quo adipisci consequatur dignissimos quos molestias voluptatem ex ab dolorum nesciunt possimus asperiores enim quasi earum, nihil ducimus labore.',
            "admin" => "nao",
            "cod_cidade" => 16,            
            ]
        );
        DB::table('Usuario')->insert(
            [
            "nome" => "Gesonel",
            "email" => 'gesonel@gmail.com',
            "senha" => bcrypt('senha1234'),
            "telefone" => '42998086971',
            "contato" => '42998086976',
            "descricao"=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque vitae officia quo adipisci consequatur dignissimos quos molestias voluptatem ex ab dolorum nesciunt possimus asperiores enim quasi earum, nihil ducimus labore.',
            "admin" => "nao",
            "cod_cidade" => 16,            
            ]
        );
    }
}
