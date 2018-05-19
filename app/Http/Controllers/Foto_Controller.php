<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Image;
use File;
use App\Library\imageLib;


class Foto_Controller extends Controller
{
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album_id = $request->input('album_id');
        $transparencia = $request->input('transparencia') == "true" ? true:false; //Decide si lo conviertes en JPG

        $path = public_path() . '/royal/img/galeria/'.$album_id."/";
        $files = $request->file('file');
        foreach ($files as $file) {
            $fileName = str_replace("ñ","n",str_replace(" ","_",mb_strtolower($file->getClientOriginalName(),'UTF-8')));
            $fileExtension = strtolower($file->getClientOriginalExtension());

            $archivo = time().$fileName;

            $foto = new \App\Foto();
            $foto->nombre = $fileName;
            $foto->archivo = "/royal/img/galeria/".$album_id."/".$archivo;
            $foto->extension =$fileExtension;

            $foto->album_id = $album_id;
            $foto->save();

            $file->move($path,$archivo);

            if($fileExtension == "png" && $transparencia){
                $old_f = public_path().$foto->archivo;
                $new_f = str_replace(".png", ".jpg",$foto->archivo);
                $this->png2jpg($old_f,public_path().$new_f,100);
                if(File::exists($old_f))
                    File::delete($old_f);
                $foto->archivo = $new_f;
                $foto->extension = "jpg";
                $foto->nombre = str_replace(".png", ".jpg",$foto->nombre);
                $foto->save();
            }

            list($ancho, $alto) = getimagesize(public_path().$foto->archivo);
            //Redimensionar la imagen de ser pesada
            if($ancho > $alto){
                if($ancho > 1024){
                    $img  = new imageLib(public_path().$foto->archivo);
                    $img-> resizeImage(1024, 0,'landscape');
                    $img->saveImage(public_path().$foto->archivo);
                }
            }else{
                if($alto > 768){
                    $img  = new imageLib(public_path().$foto->archivo);
                    $img-> resizeImage(0, 768,'portrait');
                    $img->saveImage(public_path().$foto->archivo);
                }
            }

            $album = \App\Album::find($album_id);
            $album->nro_fotos += 1;
            $album->save();
        }
    }
    function png2jpg($originalFile, $outputFile, $quality) {
        $image = imagecreatefrompng($originalFile);
        imagejpeg($image, $outputFile, $quality);
        imagedestroy($image);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    function show($id)
    {

    }

    public function listar()
    {
        return \App\Foto::where('album_id',Input::get('album_id'))->orderBy('id','desc')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    function edit($id)
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

    function update(Request $request, $id)
    {
        $foto = \App\Foto::find($id);
        $foto->nombre = $request->input('nombre');
        $foto->favorito = $request->input('favorito');
        $foto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    function destroy($id)
    {
        $foto = \App\Foto::find($id);
        $archivo = public_path().$foto->archivo;
        $album = \App\Album::find($foto->album_id);
        if(File::exists($archivo))
            File::delete($archivo);

        $foto->delete();
        $album->nro_fotos += -1;
        $album->save();
    }
}

