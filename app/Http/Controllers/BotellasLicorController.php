<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BotellaLicor;
use App\TapaBotellaLicor;
use App\Consulta;

class BotellasLicorController extends Controller
{
    public function index(){

    	$botellaslicor = BotellaLicor::all();
        return view('botellalicor.verbotellaslicor',['botellaslicor'=>$botellaslicor,'respuestaenvio'=>""]);
    }

    public function show($codigo_bar) {

		$botellalicor = BotellaLicor::whereCodigo_b($codigo_bar)->first();
		
		if(is_null($botellalicor)){
			$datares = array('Result'=>"404");
   			return json_encode($datares);
   		}
		// Crear consulta
		$consulta = new Consulta;
		$consulta->id_botella = $codigo_bar;
		$consulta->ciudad = "Bogota";
		$consulta->detalle = "";
		$consulta->save();

		$botellalicor->n_consultas++;
		$botellalicor->save();
		
		$tapabotella = $botellalicor->tapa->fecha_abierta;
		$datares = array( 'Result'=>"200", 'botella'=>$botellalicor, 'tapa'=>$tapabotella);
   		return json_encode($datares);
	}

	public function create() {

		return view('botellalicor.crearbotellalicor');
	}

	public function store(Request $request) {

		$botellalicor = new BotellaLicor;
		$tapabotellalicor = new TapaBotellaLicor;

		$tapabotellalicor->codigo_qr = $request->codigo_b;
		$tapabotellalicor->save();

		$botellalicor->tipo =$request->tipo;
		$botellalicor->descripcion = $request->descripcion;
		$botellalicor->marca = $request->marca;
		$botellalicor->codigo_b = $request->codigo_b;
		$botellalicor->id_tapa = $tapabotellalicor->id;
		
		$botellalicor->save();

		$botellaslicor = BotellaLicor::all();
        return view('botellalicor.verbotellaslicor',['botellaslicor'=>$botellaslicor,'respuestaenvio'=>"El registro se realizo correctamente."]);
	}


}
