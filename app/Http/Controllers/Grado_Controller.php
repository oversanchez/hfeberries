<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Grado_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/grado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grado = new \App\Grado();
        $grado->nivel_id = $request->input('nivel_id');
        $grado->grado_anterior_id = $request->input('grado_anterior_id');
        $grado->nombre = $request->input('nombre');
        $grado->numero= $request->input('numero');
        $grado->activo = $request->input('activo');
        $grado->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Grado::find($id);
        } else if($id == "*"){
            return \App\Grado::all();
        }
    }

    public function listar()
    {
        $grados =  \App\Grado::all();
        foreach ($grados as $grado){
            $grado->nivel;
            $grado->grado_anterior;
            if($grado->grado_anterior_id !== null)
                $grado->grado_anterior->nivel;
        }
        return $grados;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grado = \App\Grado::find($id);
        $grado->nivel_id = $request->input('nivel_id');
        $grado->grado_anterior_id = $request->input('grado_anterior_id');
        $grado->nombre = $request->input('nombre');
        $grado->numero = $request->input('numero');
        $grado->activo = $request->input('activo');
        $grado->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grado = \App\Grado::find($id);
        $grado->delete();
    }
}
