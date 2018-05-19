<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tipo_Tramite_Controller extends Controller
{
    public function index()
    {
        return view('tipo_tramite');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $tipo_tramite = new \App\Tipo_Tramite();
        $tipo_tramite->nombre = $request->input('nombre');
        $tipo_tramite->activo = $request->input('activo');

        $tipo_tramite->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Tipo_Tramite::find($id);
        } else if($id == "*"){
            return \App\Tipo_Tramite::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $tipo_tramite = \App\Tipo_Tramite::find($id);
        $tipo_tramite->nombre = $request->input('nombre');
        $tipo_tramite->activo = $request->input('activo');

        $tipo_tramite->save();
    }
    public function destroy($id)
    {
        $tipo_tramite = \App\Tipo_Tramite::find($id);
        $tipo_tramite->delete();
    }
    public function listar()
    {
        $tipo_tramites =  \App\Tipo_Tramite::all();
        foreach ($tipo_tramites as $tipo_tramite){

        }
        return $tipo_tramites;
    }
}
