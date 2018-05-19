<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Alumno_Familiar_Controller extends Controller
{
    public function index()
    {
        return view('alumno_familiar');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $alumno_familiar = new \App\Alumno_Familiar();
        $alumno_familiar->apoderado = $request->input('apoderado');
        $alumno_familiar->vive_educando = $request->input('vive_educando');
        $alumno_familiar->familiar_id = $request->input('familiar_id');
        $alumno_familiar->parentesco_id = $request->input('parentesco_id');
        $alumno_familiar->alumno_id = $request->input('alumno_id');

        $alumno_familiar->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Alumno_Familiar::find($id);
        } else if($id == "*"){
            return \App\Alumno_Familiar::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $alumno_familiar = \App\Alumno_Familiar::find($id);
        $alumno_familiar->apoderado = $request->input('apoderado');
        $alumno_familiar->vive_educando = $request->input('vive_educando');
        $alumno_familiar->familiar_id = $request->input('familiar_id');
        $alumno_familiar->parentesco_id = $request->input('parentesco_id');
        $alumno_familiar->alumno_id = $request->input('alumno_id');

        $alumno_familiar->save();
    }
    public function destroy($id)
    {
        $alumno_familiar = \App\Alumno_Familiar::find($id);
        $alumno_familiar->delete();
    }
    public function listar()
    {
        $alumno_familiars =  \App\Alumno_Familiar::all();
        foreach ($alumno_familiars as $alumno_familiar){

        }
        return $alumno_familiars;
    }
}
