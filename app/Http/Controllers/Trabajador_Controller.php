<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Trabajador_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/trabajador');
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
        $trabajador = new \App\Trabajador();

        $trabajador->nombres = $request->input('nombres');
        $trabajador->apellido_paterno = $request->input('apellido_paterno');
        $trabajador->apellido_materno = $request->input('apellido_materno');
        $trabajador->numero_documento= $request->input('numero_documento');
        $trabajador->tipo_documento= $request->input('tipo_documento');
        $trabajador->fecha_nacimiento= $request->input('fecha_nacimiento');
        $trabajador->sexo= $request->input('sexo');
        $trabajador->direccion= $request->input('direccion');
        $trabajador->email= $request->input('email');
        $trabajador->telf_movil= $request->input('telf_movil');
        $trabajador->telf_fijo= $request->input('telf_fijo');

        $trabajador->nivel_educativo_id= $request->input('nivel_educativo_id');
        $trabajador->especialidad_id= $request->input('especialidad_id');
        $trabajador->categoria_trabajador_id= $request->input('categoria_trabajador_id');
        $trabajador->activo= $request->input('activo');
        $trabajador->save();
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
            $trabajador = \App\Trabajador::find($id);
            $trabajador->nivel_educativo;
            $trabajador->categoria_trabajador;
            $trabajador->especialidad;
            $trabajador->user_info;
            if($trabajador->user_info != null)
                $trabajador->user_info->user;
            return $trabajador;
        }
    }

    public function listar()
    {
        $trabajadores =  \App\Trabajador::orderBy('apellido_paterno', 'ASC')->orderBy('apellido_materno', 'ASC')->orderBy('nombres', 'ASC')->get();
        foreach ($trabajadores as $trabajador){
            $trabajador->nivel_educativo;
            $trabajador->categoria_trabajador;
            $trabajador->especialidad;
        }
        return $trabajadores;
    }

    public function listar_usuarios()
    {
        $trabajadores =  \App\Trabajador::orderBy('apellido_paterno', 'ASC')->orderBy('apellido_materno', 'ASC')->orderBy('nombres', 'ASC')->get();
        foreach ($trabajadores as $trabajador){
            $trabajador->user_info;
            if($trabajador->user_info != null)
                $trabajador->user_info->user;
        }
        return $trabajadores;
    }

    public function buscar_numero_documento()
    {
        $numero_documento = Input::get('numero_documento');
        if (is_numeric($numero_documento)) {
            return \App\Trabajador::where('numero_documento',$numero_documento)->get();
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
        $trabajador = \App\Trabajador::find($id);

        $trabajador->nombres = $request->input('nombres');
        $trabajador->apellido_paterno = $request->input('apellido_paterno');
        $trabajador->apellido_materno = $request->input('apellido_materno');
        $trabajador->numero_documento= $request->input('numero_documento');
        $trabajador->tipo_documento= $request->input('tipo_documento');
        $trabajador->fecha_nacimiento= $request->input('fecha_nacimiento');
        $trabajador->sexo= $request->input('sexo');
        $trabajador->direccion= $request->input('direccion');
        $trabajador->email= $request->input('email');
        $trabajador->telf_movil= $request->input('telf_movil');
        $trabajador->telf_fijo= $request->input('telf_fijo');

        $trabajador->nivel_educativo_id= $request->input('nivel_educativo_id');
        $trabajador->especialidad_id= $request->input('especialidad_id');
        $trabajador->categoria_trabajador_id= $request->input('categoria_trabajador_id');
        $trabajador->activo= $request->input('activo');
        $trabajador->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador = \App\Trabajador::find($id);
        $trabajador->delete();
    }
}

