<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Enlace_Rapido_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/enlace_rapido');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enlace_rapido = new \App\Enlace_Rapido();
        $enlace_rapido->orden= $request->input('orden');
        $enlace_rapido->nombre = $request->input('nombre');
        $enlace_rapido->categoria = $request->input('categoria');
        $enlace_rapido->url = $request->input('url');
        $enlace_rapido->color= $request->input('color');
        $enlace_rapido->publico= $request->input('publico');
        $enlace_rapido->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Enlace_Rapido::find($id);
        } else if($id == "*"){
            return \App\Enlace_Rapido::all();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enlace_rapido = \App\Enlace_Rapido::find($id);
        $enlace_rapido->orden= $request->input('orden');
        $enlace_rapido->nombre = $request->input('nombre');
        $enlace_rapido->categoria = $request->input('categoria');
        $enlace_rapido->url = $request->input('url');
        $enlace_rapido->color= $request->input('color');
        $enlace_rapido->publico= $request->input('publico');
        $enlace_rapido->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enlace_rapido = \App\Enlace_Rapido::find($id);
        $enlace_rapido->delete();
    }
}
