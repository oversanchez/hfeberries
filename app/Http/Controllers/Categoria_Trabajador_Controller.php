<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Categoria_Trabajador_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/categoria_trabajador');
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
        $categoria_trabajador = new \App\Categoria_Trabajador();
        $categoria_trabajador->nombre = $request->input('nombre');
        $categoria_trabajador->abreviatura = $request->input('abreviatura');
        $categoria_trabajador->save();
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
            return \App\Categoria_Trabajador::find($id);
        } else if($id == "*"){
            return \App\Categoria_Trabajador::all();
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
        $categoria_trabajador = \App\Categoria_Trabajador::find($id);
        $categoria_trabajador->nombre = $request->input('nombre');
        $categoria_trabajador->abreviatura = $request->input('abreviatura');
        $categoria_trabajador->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria_trabajador = \App\Categoria_Trabajador::find($id);
        $categoria_trabajador->delete();
    }
}
