<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Cidade';

    /**
     * Run the migrations.
     * @table Cidade
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_cidade');
            $table->string('nome', 50);
            $table->unsignedInteger('cod_estado');
          
        });
        
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->foreign('cod_estado')
                ->references('cod_estado')->on('Estado');
                //->onDelete('no action')
                //->onUpdate('no action');
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
