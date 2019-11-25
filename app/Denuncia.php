<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table= 'Denuncia';
    protected $primaryKey = 'cod_denuncia';
    public $timestamps = false;
}
