<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Emergente_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/emergente');
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
        $emergente = new \App\Emergente();
        $emergente->nombre = $request->input('nombre');
        $emergente->fecha = $request->input('fecha');
        $emergente->tipo = $request->input('tipo');
        $emergente->contenido = $request->input('contenido');
        $emergente->url = $request->input('url');
        $emergente->url_foto = $request->input('url_foto');
        $emergente->publico= $request->input('publico');
        $emergente->save();
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
            return \App\Emergente::find($id);
        } else if($id == "*"){
            return \App\Emergente::all();
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
        $emergente = \App\Emergente::find($id);
        $emergente->nombre = $request->input('nombre');
        $emergente->fecha = $request->input('fecha');
        $emergente->tipo = $request->input('tipo');
        $emergente->contenido = $request->input('contenido');
        $emergente->url = $request->input('url');
        $emergente->url_foto = $request->input('url_foto');
        $emergente->publico= $request->input('publico');
        $emergente->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emergente = \App\Emergente::find($id);
        $emergente->delete();
    }
}
