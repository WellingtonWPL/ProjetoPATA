<?php

use Illuminate\Database\Seeder;

class PorteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Porte')->insert(
            [
            'tipo_porte'=> 'Pequeno',           
            ]
        );
        DB::table('Porte')->insert(
            [
            'tipo_porte'=> 'Médio',           
            ]
        );
        DB::table('Porte')->insert(
            [
            'tipo_porte'=> 'Grande',           
            ]
        );
    }
}
