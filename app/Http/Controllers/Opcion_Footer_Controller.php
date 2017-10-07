<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Opcion_Footer_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/opcion_footer');
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
        $opcion_footer = new \App\Opcion_Footer();
        $opcion_footer->nombre = $request->input('nombre');
        $opcion_footer->url= $request->input('url');
        $opcion_footer->footer= $request->input('footer');
        $opcion_footer->publico= $request->input('publico');
        $opcion_footer->save();
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
            return \App\Opcion_Footer::find($id);
        } else if($id == "*"){
            return \App\Opcion_Footer::all();
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
        $opcion_footer = \App\Opcion_Footer::find($id);
        $opcion_footer->nombre = $request->input('nombre');
        $opcion_footer->url= $request->input('url');
        $opcion_footer->footer= $request->input('footer');
        $opcion_footer->publico= $request->input('publico');
        $opcion_footer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opcion_footer = \App\Opcion_Footer::find($id);
        $opcion_footer->delete();
    }
}
