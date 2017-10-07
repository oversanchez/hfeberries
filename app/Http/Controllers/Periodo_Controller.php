<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Periodo_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/periodo');
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
        $periodo = new \App\Periodo();
        $periodo->anio_lectivo_id = $request->input('anio_lectivo_id');
        $periodo->nombre = $request->input('nombre');
        $periodo->abreviatura = $request->input('abreviatura');
        $periodo->activo = $request->input('activo');
        $periodo->save();
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
            return \App\Periodo::find($id);
        } else if($id == "*"){
            return \App\Periodo::all();
        }
    }

    public function listar()
    {
        return \App\Periodo::where('anio_lectivo_id',Input::get('anio_lectivo_id'))->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $periodo = \App\Periodo::find($id);
        $periodo->anio_lectivo_id = $request->input('anio_lectivo_id');
        $periodo->nombre = $request->input('nombre');
        $periodo->abreviatura = $request->input('abreviatura');
        $periodo->activo = $request->input('activo');
        $periodo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo = \App\Periodo::find($id);
        $periodo->delete();
    }
}
