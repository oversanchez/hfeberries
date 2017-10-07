<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion_Footer extends Model
{
    protected $table = "opcion_footer";

    protected $fillable = ['nombre','url','footer','publico'];
}
