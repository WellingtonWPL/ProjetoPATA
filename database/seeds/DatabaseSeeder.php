<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(EstadoSeeder::class); 
        $this->call(CidadeSeeder::class);
        $this->call(PorteSeeder::class);
        $this->call(EspecieSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(PostagemSeeder::class);





    }
}
