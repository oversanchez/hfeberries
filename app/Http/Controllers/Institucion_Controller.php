<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Institucion_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/institucion');
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Institucion::take(1)->get();
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
        $institucion = \App\Institucion::find($id);
        $institucion->telefonos= $request->input('telefonos');
        $institucion->correo= $request->input('correo');
        $institucion->ciudad= $request->input('ciudad');
        $institucion->direccion= $request->input('direccion');
        $institucion->link_mapa= $request->input('link_mapa');
        $institucion->bienvenida_url= $request->input('bienvenida_url');
        $institucion->bienvenida_texto= $request->input('bienvenida_texto');
        $institucion->porque_nosotros_1= $request->input('porque_nosotros_1');
        $institucion->porque_nosotros_2= $request->input('porque_nosotros_2');
        $institucion->porque_nosotros_3= $request->input('porque_nosotros_3');
        $institucion->porque_nosotros_4= $request->input('porque_nosotros_4');
        $institucion->anio_ficha = $request->input('anio_ficha');
        $institucion->mostrar_ficha = $request->input('mostrar_ficha');
        $institucion->mostrar_tramite = $request->input('mostrar_tramite');
        $institucion->sms_celular = $request->input('sms_celular');
        $institucion->sms_cabecera = $request->input('sms_cabecera');

        $institucion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
