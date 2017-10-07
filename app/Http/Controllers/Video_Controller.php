<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Video_Controller extends Controller
{
    public function index()
    {
        return view('intranet/website/video');
    }
    public function create()
    {
        //
    }
    public function ver_videos()
    {
        $opciones = \App\Opcion_Menu::where('publico',true)->orderBy('orden','asc')->get();
        $videos = \App\Video::where('publico',true)->orderBy('fecha', 'desc')->get();
        $opciones_footer = \App\Opcion_Footer::where('publico',true)->orderBy('id', 'desc')->get();
        $institucion = \App\Institucion::take(1)->get()[0];

        return view('website/videos',['opciones'=>$opciones,'institucion'=>$institucion,"videos"=>$videos,"opciones_footer"=>$opciones_footer]);
    }
    public function store(Request $request)
    {
        $video = new \App\Video();
        $video->nombre = $request->input('nombre');
        $video->fecha = $request->input('fecha');
        $video->frame = $request->input('frame');
        $video->publico = $request->input('publico');

        $video->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Video::find($id);
        } else if($id == "*"){
            return \App\Video::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $video = \App\Video::find($id);
        $video->nombre = $request->input('nombre');
        $video->fecha = $request->input('fecha');
        $video->frame = $request->input('frame');
        $video->publico = $request->input('publico');

        $video->save();
    }
    public function destroy($id)
    {
        $video = \App\Video::find($id);
        $video->delete();
    }
    public function listar()
    {
        $videos =  \App\Video::all();
        foreach ($videos as $video){

        }
        return $videos;
    }
}
