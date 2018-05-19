<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Colegio_Procedencia_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/colegio_procedencia');
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
        $colegio_procedencia = new \App\Colegio_Procedencia();
        $colegio_procedencia->nombre = $request->input('nombre');
        $colegio_procedencia->save();
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
            return \App\Colegio_Procedencia::find($id);
        } else if($id == "*"){
            return \App\Colegio_Procedencia::all();
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
        $colegio_procedencia = \App\Colegio_Procedencia::find($id);
        $colegio_procedencia->nombre = $request->input('nombre');
        $colegio_procedencia->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colegio_procedencia = \App\Colegio_Procedencia::find($id);
        $colegio_procedencia->delete();
    }
}
