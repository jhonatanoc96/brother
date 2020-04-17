<?php

namespace App\Http\Controllers;

use App\Income;
use App\Customer;
use App\Debttemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class DebttempController extends Controller
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
        $debts_temp = DB::table('debts_temp')->get();

        return view('debt_temp.index', [
            'debts_temp' => $debts_temp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        if ($request['active']) {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }


        Debttemp::create($request->all());
        return redirect()->back()
            ->with('success', 'Debt created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show()
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

        Debttemp::find($id)->update($request->all());


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
        Debttemp::find($id)->delete();
        return redirect()->back()
            ->with('success', 'Debt_temp deleted successfully');
    }


}
