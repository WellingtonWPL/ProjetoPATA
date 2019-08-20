<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    private $table = 'Usuario';
    protected $primaryKey = 'cod_usuario';
}
