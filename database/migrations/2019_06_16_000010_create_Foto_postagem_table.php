<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoPostagemTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Foto_postagem';

    /**
     * Run the migrations.
     * @table Foto_postagem
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_foto_postagem');
            $table->unsignedInteger('cod_postagem');
            $table->string('link_foto_postagem', 100);

            $table->unique(["cod_foto_postagem"], 'cod_foto_postagem_UNIQUE');
        });

        Schema::table($this->tableName, function ($table) {
            $table->foreign('cod_postagem')
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