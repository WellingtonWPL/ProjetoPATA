<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moradia extends Model
{
    private $table = 'Moradia';
    protected $primaryKey = 'cod_moradia';
}
