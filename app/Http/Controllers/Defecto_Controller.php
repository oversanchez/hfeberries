<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Defecto_Controller extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_info = \App\User_Info::where('user_id', "=", $user_id)->take(1)->get();
        $opciones_id = \App\Grupo_Opcion::select('opcion_id')->where('grupo_id', "=", $user_info[0]->grupo_id)->where('vigencia', '=', true)->distinct()->get();
        $sistemas_id = \App\Opcion::whereIn('id', $opciones_id)->distinct()->pluck('sistema_id')->toArray();
        $sistemas = \App\Sistema::whereIn('id', $sistemas_id)->get();
        $sistema_id = $request->input('sistema_id');
        $opciones = \App\Opcion::whereIn('id', $opciones_id)->where('sistema_id', $sistema_id)->get();
        $opciones_sup = \App\Opcion::whereIn('id', $opciones_id)->whereNull('opcion_padre_id')->where('sistema_id', $sistema_id)->get();

        return view('intranet/mantenimientos/defecto', ['token' => $request->input('token'), 'sistemas' => $sistemas, 'sistema_id' => $sistema_id, 'opciones_sup' => $opciones_sup, 'opciones' => $opciones]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $defecto = new \App\Defecto();
        $defecto->nombre = $request->input('nombre');
        $defecto->tipo = $request->input('tipo');
        $defecto->vigencia = $request->input('vigencia');

        $defecto->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Defecto::find($id);
        } else if($id == "*"){
            return \App\Defecto::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $defecto = \App\Defecto::find($id);
        $defecto->nombre = $request->input('nombre');
        $defecto->tipo = $request->input('tipo');
        $defecto->vigencia = $request->input('vigencia');

        $defecto->save();
    }
    public function destroy($id)
    {
        $defecto = \App\Defecto::find($id);
        $defecto->delete();
    }
    public function listar()
    {
        $defectos =  \App\Defecto::all();
        foreach ($defectos as $defecto){

        }
        return $defectos;
    }
}
