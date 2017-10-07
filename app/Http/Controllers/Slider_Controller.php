<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Slider_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/website/slider');
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
        $slider = new \App\Slider();
        $slider->orden= $request->input('orden');
        $slider->nombre = $request->input('nombre');
        $slider->url_foto = $request->input('url_foto');
        $slider->url_vinculo = $request->input('url_vinculo');
        $slider->nombre_vinculo = $request->input('nombre_vinculo');
        $slider->publico= $request->input('publico');
        $slider->save();
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
            return \App\Slider::find($id);
        } else if($id == "*"){
            return \App\Slider::all();
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
        $slider = \App\Slider::find($id);
        $slider->orden= $request->input('orden');
        $slider->nombre = $request->input('nombre');
        $slider->url_foto = $request->input('url_foto');
        $slider->url_vinculo = $request->input('url_vinculo');
        $slider->nombre_vinculo = $request->input('nombre_vinculo');
        $slider->publico= $request->input('publico');
        $slider->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = \App\Slider::find($id);
        $slider->delete();
    }
}
