<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\TapaBotellaLicor;
use App\BotellaLicor;

class TapaBotellasLicor extends Controller {

    public function update($id_tapa) {
        //Se consulta el codigo unico de la tapa
        $tapabotella = TapaBotellaLicor::whereCodigo_qr($id_tapa)->first();
        if (is_null($tapabotella)) {
            //Revisa que la tapa existe, si no existe retorna 404
            $data_tapa = array('Result' => "404");
            return json_encode($data_tapa);
        } else if ($tapabotella->fecha_abierta != '0000-00-00 00:00:00') {
            //Si la tapa existe pero ya ha sido modificada, si no existe retorna 202
            $data_tapa = array('Result' => "202");
            return json_encode($data_tapa);
        } else {
            //Si la tapa existe y no ha sido modificada se modifica la fecha de creación y se guarda
            $tapabotella->fecha_abierta = Carbon::now();
            $tapabotella->save();
            //Se retorna el error 200
            $botellalicor = BotellaLicor::whereId_tapa($tapabotella->id)->first();
            $tapabotellalicor = $botellalicor->tapa->fecha_abierta;
            $data_tapa = array('Result' => "200", 'tapa_fecha_abierta' => $tapabotellalicor,'botella'=>$botellalicor);
            return json_encode($data_tapa);
        }
    }

}
