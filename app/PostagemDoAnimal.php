<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostagemDoAnimal extends Model
{
    private $table = 'Postagem_do_animal';
    protected $primaryKey = 'cod_postagem';
}
