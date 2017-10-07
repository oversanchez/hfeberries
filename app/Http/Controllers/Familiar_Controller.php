<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Familiar_Controller extends Controller
{
    public function index()
    {
        return view('intranet/mantenimientos/familiar');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $familiar = new \App\Familiar();
        $familiar->nombre_completo = $request->input('nombre_completo');
        $familiar->tipo_documento = $request->input('tipo_documento');
        $familiar->numero_documento = $request->input('numero_documento');
        $familiar->sexo = $request->input('sexo');
        $familiar->fecha_nacimiento = $request->input('fecha_nacimiento');
        $familiar->direccion = $request->input('direccion');
        $familiar->email = $request->input('email');
        $familiar->telf_movil = $request->input('telf_movil');
        $familiar->telf_fijo = $request->input('telf_fijo');
        $familiar->estado_civil = $request->input('estado_civil');
        $familiar->ocupacion = $request->input('ocupacion');
        $familiar->lugar_trabajo = $request->input('lugar_trabajo');
        $familiar->activo = $request->input('activo');
        $familiar->nivel_educativo_id = $request->input('nivel_educativo_id');

        $familiar->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Familiar::find($id);
        } else if($id == "*"){
            return \App\Familiar::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $familiar = \App\Familiar::find($id);
        $familiar->nombre_completo = $request->input('nombre_completo');
        $familiar->tipo_documento = $request->input('tipo_documento');
        $familiar->numero_documento = $request->input('numero_documento');
        $familiar->sexo = $request->input('sexo');
        $familiar->fecha_nacimiento = $request->input('fecha_nacimiento');
        $familiar->direccion = $request->input('direccion');
        $familiar->email = $request->input('email');
        $familiar->telf_movil = $request->input('telf_movil');
        $familiar->telf_fijo = $request->input('telf_fijo');
        $familiar->estado_civil = $request->input('estado_civil');
        $familiar->ocupacion = $request->input('ocupacion');
        $familiar->lugar_trabajo = $request->input('lugar_trabajo');
        $familiar->activo = $request->input('activo');
        $familiar->nivel_educativo_id = $request->input('nivel_educativo_id');

        $familiar->save();
    }
    public function destroy($id)
    {
        $familiar = \App\Familiar::find($id);
        $familiar->delete();
    }
    public function listar()
    {
        $familiars =  \App\Familiar::all();
        foreach ($familiars as $familiar){

        }
        return $familiars;
    }
}
