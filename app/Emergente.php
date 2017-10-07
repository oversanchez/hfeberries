<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergente extends Model
{
    protected $table = "emergente";

    protected $fillable = ['tipo','nombre','fecha','contenido','url','url_foto','publico'];

}
