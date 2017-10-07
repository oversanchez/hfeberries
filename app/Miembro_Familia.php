<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembro_Familia extends Model
{
    protected $table = "miembro_familia";

    protected $fillable = ['persona_id','familia_id','apoderado','vive'];

    public function parentesco(){
        return $this->belongsTo('App\Parentesco');
    }
    public function familia(){
        return $this->belongsTo('App\Familia');
    }
}
