<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Apoderado_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/apoderado');
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
        $apoderado = new \App\Apoderado();

        $apoderado->nombres = $request->input('nombres');
        $apoderado->apellido_paterno = $request->input('apellido_paterno');
        $apoderado->apellido_materno = $request->input('apellido_materno');
        $apoderado->numero_documento= $request->input('numero_documento');
        $apoderado->tipo_documento= $request->input('tipo_documento');
        $apoderado->fecha_nacimiento= $request->input('fecha_nacimiento');
        $apoderado->sexo= $request->input('sexo');
        $apoderado->direccion= $request->input('direccion');
        $apoderado->email= $request->input('email');
        $apoderado->telf_movil= $request->input('telf_movil');
        $apoderado->telf_fijo= $request->input('telf_fijo');

        $apoderado->apoderado = $request->input('apoderado');
        $apoderado->vive_educando = $request->input('vive_educando');
        $apoderado->estado_civil= $request->input('estado_civil');
        $apoderado->ocupacion= $request->input('ocupacion');
        $apoderado->lugar_trabajo= $request->input('lugar_trabajo');

        $apoderado->activo= $request->input('activo');

        $apoderado->alumno_id= $request->input('alumno_id');
        $apoderado->nivel_educativo_id= $request->input('nivel_educativo_id');
        $apoderado->parentesco_id= $request->input('parentesco_id');

        $apoderado->save();
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
            $apoderado = \App\Apoderado::find($id);
            $apoderado->parentesco;
            $apoderado->alumno;
            $apoderado->nivel_educativo;
            return $apoderado;
        }
    }

    public function listar()
    {
        $alumno_id = Input::get('alumno_id');
        $apoderados =  \App\Apoderado::where('alumno_id',$alumno_id)->get();
        foreach ($apoderados as $apoderado){
            $apoderado->nivel_educativo;
            $apoderado->parentesco;
            $apoderado->alumno;
        }
        return $apoderados;
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
        $apoderado = \App\Apoderado::find($id);

        $apoderado->nombres = $request->input('nombres');
        $apoderado->apellido_paterno = $request->input('apellido_paterno');
        $apoderado->apellido_materno = $request->input('apellido_materno');
        $apoderado->numero_documento= $request->input('numero_documento');
        $apoderado->tipo_documento= $request->input('tipo_documento');
        $apoderado->fecha_nacimiento= $request->input('fecha_nacimiento');
        $apoderado->sexo= $request->input('sexo');
        $apoderado->direccion= $request->input('direccion');
        $apoderado->email= $request->input('email');
        $apoderado->telf_movil= $request->input('telf_movil');
        $apoderado->telf_fijo= $request->input('telf_fijo');

        $apoderado->apoderado = $request->input('apoderado');
        $apoderado->vive_educando = $request->input('vive_educando');
        $apoderado->estado_civil= $request->input('estado_civil');
        $apoderado->ocupacion= $request->input('ocupacion');
        $apoderado->lugar_trabajo= $request->input('lugar_trabajo');

        $apoderado->activo= $request->input('activo');

        $apoderado->alumno_id= $request->input('alumno_id');
        $apoderado->nivel_educativo_id= $request->input('nivel_educativo_id');
        $apoderado->parentesco_id= $request->input('parentesco_id');

        $apoderado->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apoderado = \App\Apoderado::find($id);
        $apoderado->delete();
    }
}
