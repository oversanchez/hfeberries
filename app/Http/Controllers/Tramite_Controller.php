<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tramite_Controller extends Controller
{
    public function index()
    {
        return view('tramite');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $tramite = new \App\Tramite();
        $tramite->folios = $request->input('folios');
        $tramite->prioridad = $request->input('prioridad');
        $tramite->numero_documento = $request->input('numero_documento');
        $tramite->nombre_completo = $request->input('nombre_completo');
        $tramite->celular = $request->input('celular');
        $tramite->asunto = $request->input('asunto');
        $tramite->referencia = $request->input('referencia');
        $tramite->tipo_tramite_id = $request->input('tipo_tramite_id');

        $tramite->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Tramite::find($id);
        } else if($id == "*"){
            return \App\Tramite::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $tramite = \App\Tramite::find($id);
        $tramite->folios = $request->input('folios');
        $tramite->prioridad = $request->input('prioridad');
        $tramite->numero_documento = $request->input('numero_documento');
        $tramite->nombre_completo = $request->input('nombre_completo');
        $tramite->celular = $request->input('celular');
        $tramite->asunto = $request->input('asunto');
        $tramite->referencia = $request->input('referencia');
        $tramite->tipo_tramite_id = $request->input('tipo_tramite_id');

        $tramite->save();
    }
    public function destroy($id)
    {
        $tramite = \App\Tramite::find($id);
        $tramite->delete();
    }
    public function listar()
    {
        $tramites =  \App\Tramite::all();
        foreach ($tramites as $tramite){

        }
        return $tramites;
    }
}
