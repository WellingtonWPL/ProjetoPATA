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
            $table->enum('sexo', ['macho', 'femea', 'indefinido'])->nullable()->default('F');
            $table->date('nascimento')->nullable();
            $table->text('descricao');
            $table->enum('castrado', ['sim', 'nao', 'indefinido'])->nullable();
            $table->enum('vacinacao_em_dia', ['sim', 'nao', 'indefinido'])->nullable();
            $table->enum('vermifugado', ['sim', 'nao', 'indefinido'])->nullable();
            $table->text('descricao_saude');
            $table->decimal('avaliacao', 3, 2)->nullable();
            $table->integer('cod_usuario_adotante');
            $table->unsignedInteger('cod_usuario_postagem');
            $table->unsignedInteger('cod_porte');
            $table->unsignedInteger('cod_especie');
            $table->enum('listagem_postagem', ['sim', 'nao']);

            $table->index(["cod_especie"], 'cod_especie_idx');

            $table->index(["cod_usuario_adotante"], 'cod_adotante_idx');

            $table->index(["cod_usuario_postagem"], 'cod_dono_post_idx');

            $table->unique(["cod_postagem"], 'cod_animal_UNIQUE');


            $table->foreign('cod_especie', 'cod_especie_idx')
                ->references('cod_especie')->on('Especie')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cod_usuario_adotante', 'cod_adotante_idx')
                ->references('cod_usuario')->on('Usuario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cod_usuario_postagem', 'cod_dono_post_idx')
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
