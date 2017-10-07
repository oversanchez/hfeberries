<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina_Web extends Model
{
    protected $table = "pagina_web";

    protected $fillable = ['nombre','contenido','publico'];
}
