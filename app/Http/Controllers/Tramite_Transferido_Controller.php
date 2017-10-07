<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tramite_Transferido_Controller extends Controller
{
    public function index()
    {
        return view('tramite_transferido');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $tramite_transferido = new \App\Tramite_Transferido();
        $tramite_transferido->tramite_id = $request->input('tramite_id');
        $tramite_transferido->emite_trabajador_id = $request->input('emite_trabajador_id');
        $tramite_transferido->emite_puesto_trabajo_id = $request->input('emite_puesto_trabajo_id');
        $tramite_transferido->emite_observacion = $request->input('emite_observacion');
        $tramite_transferido->emite_estado_tramite_id = $request->input('emite_estado_tramite_id');
        $tramite_transferido->recibe_trabajador_id = $request->input('recibe_trabajador_id');
        $tramite_transferido->recibe_puesto_trabajo_id = $request->input('recibe_puesto_trabajo_id');
        $tramite_transferido->recibe_observacion = $request->input('recibe_observacion');
        $tramite_transferido->recibe_estado_tramite_id = $request->input('recibe_estado_tramite_id');
        $tramite_transferido->vigencia = $request->input('vigencia');

        $tramite_transferido->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Tramite_Transferido::find($id);
        } else if($id == "*"){
            return \App\Tramite_Transferido::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $tramite_transferido = \App\Tramite_Transferido::find($id);
        $tramite_transferido->tramite_id = $request->input('tramite_id');
        $tramite_transferido->emite_trabajador_id = $request->input('emite_trabajador_id');
        $tramite_transferido->emite_puesto_trabajo_id = $request->input('emite_puesto_trabajo_id');
        $tramite_transferido->emite_observacion = $request->input('emite_observacion');
        $tramite_transferido->emite_estado_tramite_id = $request->input('emite_estado_tramite_id');
        $tramite_transferido->recibe_trabajador_id = $request->input('recibe_trabajador_id');
        $tramite_transferido->recibe_puesto_trabajo_id = $request->input('recibe_puesto_trabajo_id');
        $tramite_transferido->recibe_observacion = $request->input('recibe_observacion');
        $tramite_transferido->recibe_estado_tramite_id = $request->input('recibe_estado_tramite_id');
        $tramite_transferido->vigencia = $request->input('vigencia');

        $tramite_transferido->save();
    }
    public function destroy($id)
    {
        $tramite_transferido = \App\Tramite_Transferido::find($id);
        $tramite_transferido->delete();
    }
    public function listar()
    {
        $tramite_transferidos =  \App\Tramite_Transferido::all();
        foreach ($tramite_transferidos as $tramite_transferido){

        }
        return $tramite_transferidos;
    }
}
