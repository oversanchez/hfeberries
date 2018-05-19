<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Turno_Controller extends Controller
{
    public function index()
    {
        return view('intranet/mantenimientos/turno');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $turno = new \App\Turno();
        $turno->nombre = $request->input('nombre');
        $turno->abreviatura = $request->input('abreviatura');
        $turno->activo = $request->input('activo');

        $turno->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Turno::find($id);
        } else if($id == "*"){
            return \App\Turno::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $turno = \App\Turno::find($id);
        $turno->nombre = $request->input('nombre');
        $turno->abreviatura = $request->input('abreviatura');
        $turno->activo = $request->input('activo');

        $turno->save();
    }
    public function destroy($id)
    {
        $turno = \App\Turno::find($id);
        $turno->delete();
    }
    public function listar()
    {
        $turnos =  \App\Turno::all();
        foreach ($turnos as $turno){

        }
        return $turnos;
    }
}
