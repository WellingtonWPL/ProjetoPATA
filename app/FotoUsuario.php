<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoUsuario extends Model
{
    protected $table = 'Foto_usuario';
    protected $primaryKey = 'cod_foto_usuario';
    public $timestamps = false;

}
