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
            $table->increments('cod_animal');
            $table->string('nome', 100)->default('Sem Nome');
            $table->char('sexo', 1)->nullable()->default('F');
            $table->date('nascimento')->nullable();
            $table->string('porte', 10);
            $table->binary('descrição');
            $table->string('foto', 100);
            $table->string('login_dono_postagem', 30);
            $table->binary('descricao_saude');
            $table->unsignedInteger('cod_adotante')->nullable();
            $table->tinyInteger('adocao_finalizada');
            $table->unsignedInteger('cod_dono_postagem');
            $table->unsignedInteger('cod_especie');

        
            
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_especie')
                ->references('cod_especie')->on('Especie')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_adotante')
                ->references('cod_usuario')->on('Usuario')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_dono_postagem')
                ->references('cod_usuario')->on('Usuario')
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
