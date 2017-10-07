<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Puesto_Trabajo_Controller extends Controller
{
    public function index()
    {
        return view('intranet/mantenimientos/puesto_trabajo');
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $puesto_trabajo = new \App\Puesto_Trabajo();
        $puesto_trabajo->nombre = $request->input('nombre');
        $puesto_trabajo->trabajador_id = $request->input('trabajador_id');
        $puesto_trabajo->registro = $request->input('registro');

        $puesto_trabajo->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Puesto_Trabajo::find($id);
        } else if($id == "*"){
            return \App\Puesto_Trabajo::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $puesto_trabajo = \App\Puesto_Trabajo::find($id);
        $puesto_trabajo->nombre = $request->input('nombre');
        $puesto_trabajo->trabajador_id = $request->input('trabajador_id');
        $puesto_trabajo->registro = $request->input('registro');

        $puesto_trabajo->save();
    }
    public function destroy($id)
    {
        $puesto_trabajo = \App\Puesto_Trabajo::find($id);
        $puesto_trabajo->delete();
    }
    public function listar()
    {
        $puesto_trabajos =  \App\Puesto_Trabajo::all();
        foreach ($puesto_trabajos as $puesto_trabajo){
            $puesto_trabajo->trabajador;
        }
        return $puesto_trabajos;
    }
}
