<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Persona_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('intranet/mantenimientos/persona');
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
        $persona = new \App\Persona();

        $persona->nombres = $request->input('nombres');
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->numero_documento= $request->input('numero_documento');
        $persona->tipo_documento= $request->input('tipo_documento');
        $persona->fecha_nacimiento= $request->input('fecha_nacimiento');
        $persona->sexo= $request->input('sexo');
        $persona->direccion= $request->input('direccion');
        $persona->email= $request->input('email');
        $persona->telf_movil= $request->input('telf_movil');
        $persona->telf_fijo= $request->input('telf_fijo');

        $persona->save();

        return $persona;
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
            $persona = \App\Persona::find($id);
            $persona->usuario;
            return $persona;
        }else if($id == "*"){
            return \App\Persona::all();
        }
    }


    public function buscar_numero_documento()
    {
        $numero_documento = Input::get('numero_documento');
        if (is_numeric($numero_documento)) {
            $persona = \App\Persona::where('numero_documento',$numero_documento)->get();
            return $persona;
        }
    }

    public function listar_no_alumnos()
    {
        return \App\Persona::where('alumno',false)->get();
    }

    public function listar_no_trabajadores()
    {
        return \App\Persona::where('trabajador',false)->get();
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
        $persona = \App\Persona::find($id);
        $persona->nombres = $request->input('nombres');
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->numero_documento= $request->input('numero_documento');
        $persona->tipo_documento= $request->input('tipo_documento');
        $persona->fecha_nacimiento= $request->input('fecha_nacimiento');
        $persona->sexo= $request->input('sexo');
        $persona->direccion= $request->input('direccion');
        $persona->email= $request->input('email');
        $persona->telf_movil= $request->input('telf_movil');
        $persona->telf_fijo= $request->input('telf_fijo');

        $persona->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = \App\Persona::find($id);
        $persona->delete();
    }
}
