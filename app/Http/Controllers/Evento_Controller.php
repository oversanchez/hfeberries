<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Evento_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/evento');
    }

    public function ver_evento($id)
    {
        $opciones = \App\Opcion_Menu::where('publico',true)->orderBy('orden','asc')->get();
        $noticias = \App\Noticia::take(6)->where('publico',true)->where('id','<>',$id)->orderBy('fecha', 'desc')->get();
        $evento = \App\Evento::find($id);
        $opciones_footer = \App\Opcion_Footer::where('publico',true)->orderBy('id', 'desc')->get();
        $institucion = \App\Institucion::take(1)->get()[0];

        return view('website/eventos',['evento'=>$evento,'opciones'=>$opciones,'noticias'=>$noticias,'institucion'=>$institucion,"opciones_footer"=>$opciones_footer]);
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
        $evento = new \App\Evento();
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->lugar = $request->input('lugar');
        $evento->hora = $request->input('hora');
        $evento->contenido = $request->input('contenido');
        $evento->publico= $request->input('publico');
        $evento->save();
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
            return \App\Evento::find($id);
        } else if($id == "*"){
            return \App\Evento::all();
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
        $evento = \App\Evento::find($id);
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->lugar = $request->input('lugar');
        $evento->hora = $request->input('hora');
        $evento->contenido = $request->input('contenido');
        $evento->publico= $request->input('publico');
        $evento->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = \App\Evento::find($id);
        $evento->delete();
    }
}
