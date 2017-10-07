<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Estado_Tramite_Controller extends Controller
{
    public function index()
    {
        return view('intranet/mantenimientos/estado_tramite');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $estado_tramite = new \App\Estado_Tramite();
        $estado_tramite->nombre = $request->input('nombre');
        $estado_tramite->color = $request->input('color');
        $estado_tramite->icono = $request->input('icono');

        $estado_tramite->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Estado_Tramite::find($id);
        } else if($id == "*"){
            return \App\Estado_Tramite::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $estado_tramite = \App\Estado_Tramite::find($id);
        $estado_tramite->nombre = $request->input('nombre');
        $estado_tramite->color = $request->input('color');
        $estado_tramite->icono = $request->input('icono');

        $estado_tramite->save();
    }
    public function destroy($id)
    {
        $estado_tramite = \App\Estado_Tramite::find($id);
        $estado_tramite->delete();
    }
    public function listar()
    {
        $estado_tramites =  \App\Estado_Tramite::all();
        foreach ($estado_tramites as $estado_tramite){

        }
        return $estado_tramites;
    }
}
