<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    private $table = 'Especie';
    protected $primaryKey = 'cod_especie';
}
