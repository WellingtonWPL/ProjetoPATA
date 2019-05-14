<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Usuario';

    /**
     * Run the migrations.
     * @table Usuario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_usuario');
            $table->string('email', 100);
            $table->string('nome', 100);
            $table->string('senha', 20);
            $table->decimal('avaliacao', 3, 2);
            $table->string('contato', 50);
            $table->binary('descricao')->nullable();
            $table->tinyInteger('admin');
            $table->unsignedInteger('cod_cidade');

            $table->unique(["email"], 'email_UNIQUE');
 
        });
        
        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_cidade')
                ->references('cod_cidade')->on('Cidade')
                ->onDelete('no action')
                ->onUpdate('no action');
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
