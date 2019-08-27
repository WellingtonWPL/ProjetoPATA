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
            $table->string('nome', 100);
            $table->rememberToken();
            $table->string('email', 100);
            $table->char('senha', 32);
            $table->string('telefone', 15);
            $table->string('contato', 50);
            $table->text('descricao');
            $table->enum('admin', ['sim', 'nao']);
            $table->unsignedInteger('cod_cidade');

            $table->index(["cod_cidade"], 'cod_cidade_idx');

            $table->unique(["telefone"], 'telefone_UNIQUE');

            $table->unique(["cod_usuario"], 'cod_usuario_UNIQUE');

            $table->unique(["email"], 'email_UNIQUE');


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
