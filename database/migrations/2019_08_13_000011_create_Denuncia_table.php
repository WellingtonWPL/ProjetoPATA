<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Denuncia';

    /**
     * Run the migrations.
     * @table Denuncia
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_denuncia');
            $table->dateTime('data_denuncia');
            $table->text('descricao_denuncia')->nullable();
            $table->unsignedInteger('cod_usuario_denunciante');
            $table->unsignedInteger('cod_postagem_denunciada');
            $table->unsignedInteger('cod_motivo_denuncia');

            $table->index(["cod_usuario_denunciante"], 'cod_denunciante_idx');

            $table->index(["cod_motivo_denuncia"], 'cod_motivos_denuncia_idx');

            $table->index(["cod_postagem_denunciada"], 'cod_postagem_idx');

            $table->unique(["cod_denuncia"], 'cod_denuncia_UNIQUE');


            $table->foreign('cod_usuario_denunciante', 'cod_denunciante_idx')
                ->references('cod_usuario')->on('Usuario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cod_motivo_denuncia', 'cod_motivos_denuncia_idx')
                ->references('cod_motivo_denuncia')->on('Motivos_Denuncia')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cod_postagem_denunciada', 'cod_postagem_idx')
                ->references('cod_postagem')->on('Postagem_do_animal')
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
