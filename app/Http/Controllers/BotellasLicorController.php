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
		$image = '/img/siva/products/aguardiente_blanco.jpg';
		if($botellalicor->tipo == "Blanco del Valle"){
			$image = '/img/siva/products/aguardiente_blanco.jpg';
		}else if($botellalicor->tipo == "Ron Marqués del Valle 8 años"){
			$image = '/img/siva/products/ron_marquez.jpg';
		}else if($botellalicor->tipo == "Aguardiente Origen"){
			$image = '/img/siva/products/aguardiente_origen.png';
		}else if($botellalicor->tipo == "Aguardiente Blanco Sin Azúcar"){
			$image = '/img/siva/products/aguardiente.jpg';
		}else if($botellalicor->tipo == "Ron Premium"){
			$image = '/img/siva/products/ron_premium.png';
		}else if($botellalicor->tipo == "Aguardiente Antioqueño"){
			$image = '/img/siva/products/aguardiente_antioqueno.jpg';
		}else if($botellalicor->tipo == "Aguardiente Antioqueño Sin Azúcar"){
			$image = '/img/siva/products/aguardiente_antioqueno_sin_azucar.jpg';
		}else if($botellalicor->tipo == "Aguardiente Real"){
			$image = '/img/siva/products/aguardiente_real.jpg';
		}else if($botellalicor->tipo == "Ron Medellín 10 años"){
			$image = '/img/siva/products/ron_medellin_10.png';
		}else if($botellalicor->tipo == "Ron Medellin Añejo 3 años x 750ml"){
			$image = '/img/siva/products/ron_medellin_3x750.png';
		}else if($botellalicor->tipo == "Ron Medellin Añejo 12 años x 750ml"){
			$image = '/img/siva/products/ron_medellin_12x750.png';
		}else{
			$image = '/img/siva/products/pulgar_arriba.jpg';
		}
		
		$datares = array( 
			'Result'=>"200",
			'botella'=>$botellalicor,
			'tapa'=>$tapabotella,
			'image'=>asset($image)
		);

   		return json_encode($datares, JSON_UNESCAPED_SLASHES);
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
