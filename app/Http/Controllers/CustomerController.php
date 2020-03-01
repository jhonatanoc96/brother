<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Income;
use Illuminate\Http\Request;


class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('customer.index', ['customers' => $customers]);
    }


    public function showmotos()
    {
        //
        return view('customer/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('customer/create');
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
            'ident' => 'required',
            'first_name' => 'required',
            'email' => 'required',
        ]);
        Customer::create($request->all());
        return redirect()->route('customer.index')
            ->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
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
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
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
        // $this->validate($request, [
        //     'ident' => 'unique:customers,ident',
        //     'email' => 'unique:customers,email',
        // ]);

        if ($request['active']) {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }

        Customer::find($id)->update($request->all());
        return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Income::where('customer_id', $id)->count();
        if ($clientes > 0) {
            return back()->with('error', 'Advertencia de eliminación: No se puede eliminar el cliente seleccionads debido a que este tiene ingresos asociados, si está seguro de eliminarlo debe de eliminar al cliente de forma manual.');
        } else {
            Customer::destroy($id);
        }
        return redirect()->route('customer.index')
            ->with('success', 'Customer deleted successfully');
        // return redirect('/company')->with('message', 'delete');
    }

}
