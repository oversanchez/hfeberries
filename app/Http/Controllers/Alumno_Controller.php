<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Alumno_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/alumno');
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
        $alumno = new \App\Alumno();

        $alumno->nombres = $request->input('nombres');
        $alumno->apellido_paterno = $request->input('apellido_paterno');
        $alumno->apellido_materno = $request->input('apellido_materno');
        $alumno->numero_documento= $request->input('numero_documento');
        $alumno->tipo_documento= $request->input('tipo_documento');
        $alumno->fecha_nacimiento= $request->input('fecha_nacimiento');
        $alumno->sexo= $request->input('sexo');
        $alumno->direccion = $request->input('direccion');
        $alumno->telf_fijo= $request->input('telf_fijo');

        $alumno->colegio_procedencia_id= $request->input('colegio_procedencia_id');
        $alumno->codigo_educando= $request->input('codigo_educando');
        $alumno->codigo_recaudacion= $request->input('codigo_recaudacion');
        $alumno->padres_juntos= $request->input('padres_juntos');
        $alumno->activo= $request->input('activo');
        $alumno->save();
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
            $alumno = \App\Alumno::find($id);
            $alumno->colegio_procedencia;
            $alumno->user_info;
            $alumno->user_info->user;
            return $alumno;
        }else if($id == "*"){
            return \App\Alumno::where('activo',true)->select('id','apellido_paterno', 'apellido_materno','nombres')->get();
        }
    }

    public function listar()
    {
        $alumnos =  \App\Alumno::orderBy('apellido_paterno', 'ASC')->orderBy('apellido_materno', 'ASC')->orderBy('nombres', 'ASC')->get();
        foreach ($alumnos as $alumno){
            $alumno->colegio_procedencia;
        }
        return $alumnos;
    }

    public function buscar_numero_documento()
    {
        $numero_documento = Input::get('numero_documento');
        if (is_numeric($numero_documento)) {
            return \App\Alumno::where('numero_documento',$numero_documento)->get();
        }
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
        $alumno = \App\Alumno::find($id);

        $alumno->nombres = $request->input('nombres');
        $alumno->apellido_paterno = $request->input('apellido_paterno');
        $alumno->apellido_materno = $request->input('apellido_materno');
        $alumno->numero_documento= $request->input('numero_documento');
        $alumno->tipo_documento= $request->input('tipo_documento');
        $alumno->fecha_nacimiento= $request->input('fecha_nacimiento');
        $alumno->sexo= $request->input('sexo');
        $alumno->direccion = $request->input('direccion');
        $alumno->telf_fijo= $request->input('telf_fijo');

        $alumno->colegio_procedencia_id= $request->input('colegio_procedencia_id');
        $alumno->codigo_educando= $request->input('codigo_educando');
        $alumno->codigo_recaudacion= $request->input('codigo_recaudacion');
        $alumno->padres_juntos= $request->input('padres_juntos');
        $alumno->activo= $request->input('activo');
        $alumno->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = \App\Alumno::find($id);
        $alumno->delete();
    }
}
