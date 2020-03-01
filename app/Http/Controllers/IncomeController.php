<?php

namespace App\Http\Controllers;

use App\Income;
use App\Customer;
use Illuminate\Http\Request;


class IncomeController extends Controller
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

    public function index()
    {
        //
        $incomes = Income::all();
        return view('income.index', ['incomes' => $incomes]);
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
        $customers = Customer::all();

        return view('income/create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'customer_id' => 'required',
            'amount' => 'required',
        ]);

        if ($request['active']) {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }

        $request['amountAvailable'] = $request->amount;
        Income::create($request->all());
        return redirect()->route('income.index')
            ->with('success', 'Income created successfully');
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

        Income::find($id)->update($request->all());

        return redirect()->route('income.index')->with('success', 'Income updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Income::find($id)->delete();
        return redirect()->route('income.index')
            ->with('success', 'Income deleted successfully');
    }
}
