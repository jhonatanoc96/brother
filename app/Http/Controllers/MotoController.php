<?php

namespace App\Http\Controllers;

use App\Moto;
use Illuminate\Http\Request;


class MotoController extends Controller
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
        $motos = Moto::all();
        return view('moto.index', ['motos' => $motos]);
    }


    public function showmotos()
    {
        //
        return view('moto/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('moto/create');
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
        //     'page_name' => 'required',
        //     'page_title' => 'required',
        // 	'meta_title' => 'required',
        // ]);
        Moto::create($request->all());
        return redirect()->route('moto.index')
            ->with('success', 'Entry created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Moto $moto)
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
        $moto = Moto::find($id);
        return view('moto.edit', compact('moto'));
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
        Moto::find($id)->update($request->all());
        return redirect()->route('moto.index')->with('success', 'Entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moto::find($id)->delete();
        return redirect()->route('moto.index')
            ->with('success', 'Entry deleted successfully');
    }
}
