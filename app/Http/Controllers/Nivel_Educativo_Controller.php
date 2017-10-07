<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Nivel_Educativo_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/nivel_educativo');
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
        $nivel_educativo = new \App\Nivel_Educativo();
        $nivel_educativo->codigo = $request->input('codigo');
        $nivel_educativo->descripcion = $request->input('descripcion');
        $nivel_educativo->abreviatura = $request->input('abreviatura');
        $nivel_educativo->save();
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
            return \App\Nivel_Educativo::find($id);
        } else if($id == "*"){
            return \App\Nivel_Educativo::all();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nivel_educativo = \App\Nivel_Educativo::find($id);
        $nivel_educativo->codigo = $request->input('codigo');
        $nivel_educativo->descripcion = $request->input('descripcion');
        $nivel_educativo->abreviatura = $request->input('abreviatura');
        $nivel_educativo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel_educativo = \App\Nivel_Educativo::find($id);
        $nivel_educativo->delete();
    }
}
