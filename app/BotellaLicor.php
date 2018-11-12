<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BotellaLicor extends Model
{
    protected $table = 'alc_botellaslicor';

    protected $fillable = [
        'id','tipo','descripcion', 'codigo_qr', 'marca' , 'codigo_b' ,'n_consultas', 'id_tapa'
    ];

    public function tapa()
    {
        return $this->hasOne('App\TapaBotellaLicor', 'id', 'id_tapa'); 
    }
    public function consulta()
    {
        return $this->hasMany('App\Consulta', 'id', 'id_botella'); 
    }
}
