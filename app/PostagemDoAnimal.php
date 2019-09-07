<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostagemDoAnimal extends Model
{
    protected $table = 'Postagem_do_animal';
    protected $primaryKey = 'cod_postagem';
    public $timestamps = false;
}
