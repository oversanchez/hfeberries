<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defecto extends Model
{
    protected $table = "defecto";

    protected $fillable = ['nombre','tipo','vigencia'];


}
