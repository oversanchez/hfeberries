<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Control_Reunion_Controller extends Controller
{
    public function index()
    {
        return view('intranet/procesos/control_reunion');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $control_reunion = new \App\Control_Reunion();
        $control_reunion->ref_alumno = $request->input('ref_alumno');
        $control_reunion->ref_seccion = $request->input('ref_seccion');
        $control_reunion->sexo = $request->input('sexo');
        $control_reunion->nombre_completo = $request->input('nombre_completo');
        $control_reunion->numero_documento = $request->input('numero_documento');

        $control_reunion->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Control_Reunion::find($id);
        } else if($id == "*"){
            return \App\Control_Reunion::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $control_reunion = \App\Control_Reunion::find($id);
        $control_reunion->marcacion =  DB::raw('now()');

        $control_reunion->save();
    }
    public function destroy($id)
    {
        $control_reunion = \App\Control_Reunion::find($id);
        $control_reunion->delete();
    }
    public function listar()
    {
        $control_reunions =  \App\Control_Reunion::all();
        return $control_reunions;
    }
}
