<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoradiaUsuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Moradia_usuario';

    /**
     * Run the migrations.
     * @table moradia_usuario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('cod_morador');
            $table->unsignedInteger('cod_moradia');


        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_morador')
                ->references('cod_usuario')->on('Usuario');
                //->onDelete('no action')
                //->onUpdate('no action');
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_moradia')
                ->references('cod_moradia')->on('Moradia');
               // ->onDelete('no action')
               // ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
