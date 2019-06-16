<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagemDoAnimalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Postagem_do_animal';

    /**
     * Run the migrations.
     * @table Postagem_do_animal
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_postagem');
            $table->string('nome_animal', 100)->default('Sem Nome');
            $table->char('sexo', 1)->nullable()->default('F');
            $table->date('nascimento')->nullable();
            $table->binary('descricao_saude');
            $table->string('login_dono_postagem', 30);
            $table->decimal('avaliacao', 3, 2)->nullable();
            $table->char('adocao_finalizada', 3);
            $table->unsignedInteger('cod_usuario_adotante')->nullable();
            $table->unsignedInteger('cod_porte');
            $table->unsignedInteger('cod_usuario_postagem');
            $table->unsignedInteger('cod_especie');
            $table->char('listagem_postagem', 3);


            $table->unique(["cod_postagem"], 'cod_animal_UNIQUE');
            $table->unique(["cod_porte"], 'cod_teste_UNIQUE');


        });

       

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_usuario_adotante')
                ->references('cod_usuario')->on('Usuario')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_porte')
                ->references('cod_porte')->on('Porte')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_usuario_postagem')
                ->references('cod_usuario')->on('Usuario')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

         Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_especie')
                ->references('cod_especie')->on('Especie')
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
