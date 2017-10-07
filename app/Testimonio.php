<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $table = "testimonio";

    protected $fillable = ['nombres','url_Foto','empresa','ocupacion','publico'];
}
