<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "slider";

    protected $fillable = ['orden','nombre','url_foto','url_vinculo','nombre_vinculo','publico'];

}
