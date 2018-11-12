<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'alc_consultas';

    protected $fillable = [
        'id','id_botella','ciudad'
    ];

    public function botellalicor()
    {
        return $this->belongsTo('App\BotellaLicor', 'id_botella', 'id');
    }
}
