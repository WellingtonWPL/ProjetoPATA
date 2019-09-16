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

        DB::table('Usuario')->insert(
            [
            "nome" => "Lucas",
            "email" => 'lucas@gmail.com',
            "senha" => bcrypt('senha1234'),
            "telefone" => '42998086371',
            "contato" => '42998086471',
            "descricao"=> 'Gosto de toca cavaquinho. Amo chachorros',
            "admin" => "nao",
            "cod_cidade" => 1,
            ]
        );
        DB::table('Usuario')->insert(
            [
            "nome" => "Paulo Silveira",
            "email" => 'psilveira@gmail.com',
            "senha" => bcrypt('senha1234'),
            "telefone" => '42998086372',
            "contato" => '42998086472',
            "descricao"=> ' Amo chachorros e gatos',
            "admin" => "nao",
            "cod_cidade" => 2,
            ]
        );
        DB::table('Usuario')->insert(
            [
            "nome" => "Jailton",
            "email" => 'jailton@gmail.com',
            "senha" => bcrypt('senha1234'),
            "telefone" => '42998086373',
            "contato" => '42998086473',
            "descricao"=> ' Amo chachorros',
            "admin" => "nao",
            "cod_cidade" => 3,
            ]
        );

        DB::table('Usuario')->insert(
            [
            "nome" => "Marcos",
            "email" => 'mascos@gmail.com',
            "senha" => bcrypt('senha1234'),
            "telefone" => '42998086374',
            "contato" => '42998086474',
            "descricao"=> 'Amo chachorros e passaros',
            "admin" => "nao",
            "cod_cidade" => 4,
            ]
        );




    }
}
