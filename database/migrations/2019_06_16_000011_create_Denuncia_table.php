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
            $table->unsignedInteger('cod_usuario_denunciante');
            $table->unsignedInteger('cod_postagem_denunciada');
            $table->unsignedInteger('cod_motivo_denuncia');


            $table->unique(["cod_denuncia"], 'cod_denuncia_UNIQUE');

        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_usuario_denunciante')
                ->references('cod_usuario')->on('Usuario')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_motivo_denuncia')
                ->references('cod_motivo_denuncia')->on('Motivos_Denuncia')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_postagem_denunciada')
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