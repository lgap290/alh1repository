<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        //Consultas ultimos 6 meses por fecha
        $total_productos = DB::table('alc_botellaslicor')
            ->count();

        //Consultas hoy
        $total_hoy = DB::table('alc_consultas')
            ->where('created_at', '>=', Carbon::today())
            ->count();

        //Consultas total
        $total_consultas = DB::table('alc_botellaslicor')
            ->sum('n_consultas');

        //Consultas ultimos 6 meses por fecha
        $array_date = DB::table('alc_consultas')
            ->select(DB::raw('count(id) as `nconsult`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupby('year','month')
            ->pluck('nconsult');

        //Consultas ultimos 6 meses por ciudad
        $array_city = DB::table('alc_consultas')
            ->select(DB::raw('count(id) as `nconsult`, ciudad'))
            ->groupby('ciudad')
            ->pluck('nconsult');

        //Consultas mayor producto consultado
        $product_best = DB::table('alc_botellaslicor')
            ->select(DB::raw('marca, sum(n_consultas) as total'))
            ->groupby('marca')
            ->orderBy("total", 'desc')
            ->first();

        $product_best->porcentaje = ($product_best->total*100)/$total_consultas;

        //Consultas mayor producto en produccion
        $product_max = DB::table('alc_botellaslicor')
            ->select(DB::raw('marca, count(marca) as total'))
            ->groupby('marca')
            ->orderBy("total", 'desc')
            ->first();

        $product_max->porcentaje = ($product_best->total*100)/$total_productos;

        //Consultas por mayor ciudad
        $ciudad_max = DB::table('alc_consultas')
            ->select(DB::raw('ciudad, count(ciudad) as total'))
            ->groupby('ciudad')
            ->orderBy("total", 'desc')
            ->first();

        $ciudad_max->porcentaje = ($ciudad_max->total*100)/$total_consultas;

        //print(json_encode($product_max));
        // [$values, $names] = array_divide($array_date);
        
        // $graph= (object)['ejex' => $names, 'ejey'=> $values];

        //[$values, $names] = array_divide($array_date);
        $graph= (object)['ejex' => [], 'ejey'=> $array_date];

        //[$values2, $names2] = array_divide($array_city);
        $graph2= (object)['ejex' => [], 'ejey'=> $array_city];
        return view('home', [
            'total_productos'=> $total_productos,
            'total_consultas'=> $total_consultas, 
            'total_hoy'=> $total_hoy, 
            'graph'=> $graph, 
            'graph2'=> $graph2,
            'product_best'=> $product_best,
            'product_max'=> $product_max,
            'ciudad_max'=> $ciudad_max
        ]);
    }

    public function chartjs()
    {
    /*     $viewer = View::select(DB::raw("SUM(numberofview) as count"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("year(created_at)"))
            ->get()->toArray();

        $viewer = array_column($viewer, 'count');

        $click = Click::select(DB::raw("SUM(numberofclick) as count"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("year(created_at)"))
            ->get()->toArray();
        $click = array_column($click, 'count');

        return view('chartjs')
                ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
                ->with('click',json_encode($click,JSON_NUMERIC_CHECK)); */

    }
}
