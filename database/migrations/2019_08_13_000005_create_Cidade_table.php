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
            $table->string('nome_cidade', 100);

            $table->unsignedInteger('cod_estado_cidade');

            // $table->index(["cod_estado"], 'cod_estado_idx');

            // $table->unique(["cod_cidade"], 'cod_cidade_UNIQUE');

            $table->foreign('cod_estado_cidade')
                ->references('cod_estado')->on('Estado')->onDelete('cascade');

        });

        // Schema::table($this->tableName, function($table) {
            
        // });


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
