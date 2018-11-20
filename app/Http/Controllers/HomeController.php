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
        $total_hoy = DB::table('alc_consultas')
            ->where('created_at', '>=', Carbon::today())
            ->count();
        $total = DB::table('alc_botellaslicor')
            ->sum('n_consultas');

        $array_date = DB::table('alc_consultas')
            ->select(DB::raw('count(id) as `nconsult`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupby('year','month')
            ->pluck('nconsult');

        $array_city = DB::table('alc_consultas')
            ->select(DB::raw('count(id) as `nconsult`, ciudad'))
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupby('ciudad')
            ->pluck('nconsult');

<<<<<<< HEAD
        //dump($array_date);
        //dump($array_city);

        //[$values, $names] = array_divide($array_date);
        $graph= (object)['ejex' => [], 'ejey'=> $array_date];
=======
        [$values, $names] = array_divide($array_date);
        $graph= (object)['ejex' => $names, 'ejey'=> $values];
>>>>>>> ab910cd7835db8534c8f60b31567cfd2a76a12a5

        //[$values2, $names2] = array_divide($array_city);
        $graph2= (object)['ejex' => [], 'ejey'=> $array_city];
        return view('home', ['total'=>$total, 'total_hoy'=>$total_hoy, 'graph'=>$graph, 'graph2'=>$graph2]);
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
