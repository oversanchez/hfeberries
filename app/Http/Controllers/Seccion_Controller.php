<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class Seccion_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/seccion');
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
        $seccion = new \App\Seccion();
        $seccion->anio_lectivo_id = $request->input('anio_lectivo_id');
        $seccion->grado_id = $request->input('grado_id');
        $seccion->trabajador_id = $request->input('trabajador_id');
        $seccion->letra= $request->input('letra');
        $seccion->turno_id= $request->input('turno_id');
        $seccion->tipo_calificacion= $request->input('tipo_calificacion');
        $seccion->vacantes= $request->input('vacantes');
        $seccion->activo= $request->input('activo');

        $seccion->save();
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
            return \App\Seccion::find($id);
        } else if($id == "*"){
            return \App\Seccion::all();
        }
    }

    public function listar()
    {
        $turno_id = Input::get('turno_id');
        $anio_lectivo_id = Input::get('anio_lectivo_id');
        $secciones =  \App\Seccion::where([
                                        ['anio_lectivo_id','=', $anio_lectivo_id],
                                        ['turno_id', '=', $turno_id],
                                            ])->get();
        foreach ($secciones as $seccion){
            $seccion->grado;
            $seccion->grado->nivel;
            $seccion->trabajador;
            $seccion->turno;
        }
        return $secciones;
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
        $seccion = \App\Seccion::find($id);
        $seccion->grado_id = $request->input('grado_id');
        $seccion->trabajador_id = $request->input('trabajador_id');
        $seccion->letra= $request->input('letra');
        $seccion->tipo_calificacion= $request->input('tipo_calificacion');
        $seccion->vacantes= $request->input('vacantes');
        $seccion->activo= $request->input('activo');

        $seccion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seccion = \App\Seccion::find($id);
        $seccion->delete();
    }
}
