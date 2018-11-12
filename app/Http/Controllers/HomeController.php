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
        $total_hoy = DB::table('alc_botellaslicor')
            ->where('created_at', '>=', Carbon::today())
            ->sum('n_consultas');
        $total = DB::table('alc_botellaslicor')
            ->sum('n_consultas');
        return view('home', ['total'=>$total, 'total_hoy'=>$total_hoy]);
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