<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagina_Web_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/pagina_web');
    }

    public function ver_pagina($id)
    {
        $opciones = \App\Opcion_Menu::where('publico',true)->orderBy('orden','asc')->get();
        $pagina_web = \App\Pagina_Web::find($id);
        $opciones_footer = \App\Opcion_Footer::where('publico',true)->orderBy('id', 'desc')->get();
        $institucion = \App\Institucion::take(1)->get()[0];
        return view('website/paginas',['pagina_web'=>$pagina_web,'opciones'=>$opciones,'institucion'=>$institucion,'opciones_footer'=>$opciones_footer]);
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
        $pagina_web = new \App\Pagina_Web();
        $pagina_web->nombre = $request->input('nombre');
        $pagina_web->contenido = $request->input('contenido');
        $pagina_web->publico= $request->input('publico');
        $pagina_web->save();
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
            return \App\Pagina_Web::find($id);
        } else if($id == "*"){
            return \App\Pagina_Web::select('id','nombre')->get();
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
        $pagina_web = \App\Pagina_Web::find($id);
        $pagina_web->nombre = $request->input('nombre');
        $pagina_web->contenido = $request->input('contenido');
        $pagina_web->publico= $request->input('publico');
        $pagina_web->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pagina_web = \App\Pagina_Web::find($id);
        $pagina_web->delete();
    }
}
