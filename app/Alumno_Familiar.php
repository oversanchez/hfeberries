<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_Familiar extends Model
{
    protected $table = "alumno_familiar";

    protected $fillable = ['apoderado','vive_educando','familiar_id','parentesco_id','alumno_id'];

    public function familiar(){
        return $this->belongsTo('App\Familiar');
    }

    public function parentesco(){
        return $this->belongsTo('App\Parentesco');
    }

    public function alumno(){
        return $this->belongsTo('App\Alumno');
    }


}
