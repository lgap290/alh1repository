<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TapaBotellaLicor extends Model
{
    protected $table = 'alc_tapabotellaslicor';

    protected $fillable = [
        'id','codigo_qr','fecha_abierta'
    ];

    public function botellalicor()
    {
        return $this->belongsTo('App\BotellaLicor', 'id_tapa', 'id');
    }
}
