<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testimonio_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/testimonio');
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
        $testimonio = new \App\Testimonio();
        $testimonio->nombres = $request->input('nombres');
        $testimonio->url_foto= $request->input('url_foto');
        $testimonio->descripcion = $request->input('descripcion');
        $testimonio->ocupacion = $request->input('ocupacion');
        $testimonio->empresa= $request->input('empresa');
        $testimonio->publico= $request->input('publico');
        $testimonio->save();
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
            return \App\Testimonio::find($id);
        } else if($id == "*"){
            return \App\Testimonio::all();
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
        $testimonio = \App\Testimonio::find($id);
        $testimonio->nombres = $request->input('nombres');
        $testimonio->url_foto= $request->input('url_foto');
        $testimonio->descripcion = $request->input('descripcion');
        $testimonio->ocupacion = $request->input('ocupacion');
        $testimonio->empresa= $request->input('empresa');
        $testimonio->publico= $request->input('publico');
        $testimonio->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonio = \App\Testimonio::find($id);
        $testimonio->delete();
    }
}
