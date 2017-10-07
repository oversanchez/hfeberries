<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class Album_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/album');
    }

    public function ver_galeria()
    {
        $opciones = \App\Opcion_Menu::where('publico',true)->orderBy('orden','asc')->get();
        $albums = \App\Album::where('publico',true)->orderBy('fecha', 'desc')->get();
        $opciones_footer = \App\Opcion_Footer::where('publico',true)->orderBy('id', 'desc')->get();
        $institucion = \App\Institucion::take(1)->get()[0];

        return view('website/galeria',['opciones'=>$opciones,'institucion'=>$institucion,"albums"=>$albums,"opciones_footer"=>$opciones_footer]);
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
        $album = new \App\Album();
        $album->nombre = $request->input('nombre');
        $album->fecha = $request->input('fecha');
        $album->publico = $request->input('publico');
        $album->save();

        $path = public_path().'/royal/img/galeria/' . $album->id;
        File::makeDirectory($path, $mode = 0777, true, true);
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
            return \App\Album::find($id);
        } else if($id == "*"){
            return \App\Album::all();
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
        $album = \App\Album::find($id);
        $album->nombre = $request->input('nombre');
        $album->fecha = $request->input('fecha');
        $album->publico = $request->input('publico');
        $album->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = \App\Album::find($id);
        $album_id = $album->id;
        $album->delete();

        $path = public_path().'/royal/img/galeria/' . $album->id;
        File::deleteDirectory($path);
    }
}
