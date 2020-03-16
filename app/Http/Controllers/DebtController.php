<?php

namespace App\Http\Controllers;

use App\Income;
use App\Customer;
use App\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class DebtController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //
        $debts = DB::table('debts')->where('income_id', '0')->get(); //No mostrar ningún registro
        $incomes = Income::all();
        $incomeSelected = '';


        return view('debt.index', [
            'debts' => $debts,
            'incomes' => $incomes,
            'incomeSelected' => $incomeSelected
        ]);
    }


    public function showpages()
    {
        //
        return view('income/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ingreso seleccionado en deudas
        // $incomeSelected =  DB::table('incomes')->where('id', $request->income)->get();

        return view('income/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'description' => 'required',
        //     'customer_id' => 'required',
        //     'amount' => 'required',
        // ]);

        // Recibir variable de sesión desde ConsultarIncome
        $incomeSelected = \Session::get('incomeSelected');

        $request['income_id'] = $incomeSelected[0]->id;

        if ($request['active']) {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }


        Debt::create($request->all());
        return redirect()->back()
            ->with('success', 'Debt created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income = Income::find($id);
        //$customers = Customer::all();
        $customers = Customer::all();

        return view('income.edit', compact('income', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //    $this->validate($request, [
        //         'page_name' => 'required',
        //         'page_title' => 'required',
        // 		'meta_title' => 'required',
        //     ]);

        if ($request['active']) {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }

        Debt::find($id)->update($request->all());


        // Redireccionar a la misma página donde se encuentra
        return redirect()->back()->with('success', 'Debt updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Debt::find($id)->delete();
        return redirect()->back()
            ->with('success', 'Debt deleted successfully');
    }

    public function listIncomes(Request $request)
    {
        // dd($request->income);
        $debts = DB::table('debts')->where('income_id', $request->income)->get();
        $incomes = Income::all();

        // Ingreso seleccionado en deudas
        $incomeSelected =  DB::table('incomes')->where('id', $request->income)->get();

        // Declarar variable de sesión que durará otro request
        Session::flash('incomeSelected', $incomeSelected);

        return view('debt.index', [
            'debts' => $debts,
            'incomes' => $incomes,
            'incomeSelected' => $incomeSelected
        ]);
    }
}
