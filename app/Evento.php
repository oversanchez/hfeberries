<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "evento";

    protected $fillable = ['nombre','decripcion','fecha','lugar','hora','contenido','publico'];
}
