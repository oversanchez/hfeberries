<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
//use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Input;
use Tymon\JWTAuth\Providers\JWT\NamshiAdapter;


class Anio_Lectivo_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/anio_lectivo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anio_lectivo = new \App\Anio_Lectivo();
        $anio_lectivo->anio = $request->input('anio');
        $anio_lectivo->activo = $request->input('activo');
        $anio_lectivo->nombre = $request->input('nombre');
        $anio_lectivo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Anio_Lectivo::find($id);
        } else if($id == "*"){
            return \App\Anio_Lectivo::all();
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
        $anio_lectivo = \App\Anio_Lectivo::find($id);
        $anio_lectivo->anio = $request->input('anio');
        $anio_lectivo->nombre = $request->input('nombre');
        $anio_lectivo->activo = $request->input('activo');
        $anio_lectivo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anio_lectivo = \App\Anio_Lectivoanio_lectivo::find($id);
        $anio_lectivo->delete();
    }
}
