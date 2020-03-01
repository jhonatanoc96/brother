<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Income;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $incomes = Income::all();

        $enero = Income::whereBetween('created_at', ['2018-01-01', '2018-01-31'])->get();

        // $prueba = $this->returnSuma();

        return view('dashboard.index', compact('incomes', 'enero'));
        // return view('dashboard.index');
    }

    public function returnSuma($year)
    {
        $fechaActual = date('d-m-Y');
        $arregloSumaXMes = [];
        $sumatoria = 0;

        // $sumaAnio = Income::whereBetween('created_at', [$fechaInicial, $fechaFinal])->get();


        // for ($i = 0; $i <= strtotime($fechaActual."+ 1 month"); $i++) {
        //     $sumatoria = $sumatoria + $mes->amount;

        // }




        // array_push($arregloSumaXMes, 15, 0);

        return $arregloSumaXMes;
    }
}
