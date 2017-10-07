<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tipo_Documento_Controller extends Controller
{
    public function index()
    {
        return view('intranet/mantenimientos/tipo_documento');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $tipo_documento = new \App\Tipo_Documento();
        $tipo_documento->codigo = $request->input('codigo');
        $tipo_documento->descripcion = $request->input('descripcion');
        $tipo_documento->abreviatura = $request->input('abreviatura');
        $tipo_documento->activo = $request->input('activo');

        $tipo_documento->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Tipo_Documento::find($id);
        } else if($id == "*"){
            return \App\Tipo_Documento::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $tipo_documento = \App\Tipo_Documento::find($id);
        $tipo_documento->codigo = $request->input('codigo');
        $tipo_documento->descripcion = $request->input('descripcion');
        $tipo_documento->abreviatura = $request->input('abreviatura');
        $tipo_documento->activo = $request->input('activo');

        $tipo_documento->save();
    }
    public function destroy($id)
    {
        $tipo_documento = \App\Tipo_Documento::find($id);
        $tipo_documento->delete();
    }
    public function listar()
    {
        $tipo_documentos =  \App\Tipo_Documento::all();
        foreach ($tipo_documentos as $tipo_documento){

        }
        return $tipo_documentos;
    }
}
