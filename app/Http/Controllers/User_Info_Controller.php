<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_Info_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/usuario');
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
        $usuario = new \App\User();

        $usuario->name =$request->input('alias');
        $usuario->email = $request->input('alias');
        $usuario->password = bcrypt($request->input('clave1').'');

        $usuario->save();

        if($usuario->id != null){
            //Datos de User Info
            $tipo = $request->input('tipo');
            $persona_id = $request->input('persona_id');

            $user_info = new \App\User_Info();
            $user_info->user_id = $usuario->id;
            $user_info->clave= bcrypt($request->input('clave1').'');
            $user_info->tipo = $tipo;
            $user_info->persona_id= $persona_id;
            $user_info->cambia_clave= $request->input('cambia_clave');
            $user_info->activo = $request->input('activo');

            $user_info->save();

            switch($tipo){
                case "TR":
                    $trabajador =  \App\Trabajador::find($persona_id);
                    $trabajador->user_info_id = $user_info->id;
                    $usuario->name = $trabajador->nombres." ".$trabajador->apellido_paterno;
                    $usuario->save();
                    $trabajador->save();
                    break;
                case "AL":
                    $alumno =  \App\Alumno::find($persona_id);
                    $alumno->user_info_id = $user_info->id;
                    $alumno->save();
                    break;
            }
        }


    }

    public function update(Request $request, $id)
    {
        $user_info = \App\User_Info::find($id);
        $user = \App\User::find($user_info->user_id);

        $user->email = $request->input('alias');
        $user_info->cambia_clave = $request->input('cambia_clave');
        $user_info->activo = $request->input('activo');
        $user_info->save();

        $user->save();
        $user_info->save();
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
            $user_info = \App\User_Info::find($id);
            $user_info->user;
            return $user_info;
        } else if($id == "*"){
            return \App\User_Info::all();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_info = \App\User_Info::find($id);
        $user = \App\User::find($user_info->user_id);
        switch($user_info->tipo){
            case "TR":
                $trabajador = \App\Trabajador::find($user_info->persona_id);
                $trabajador->user_info_id = null;
                $trabajador->save();
                break;
            case "AL":
                $alumno = \App\Alumno::find($user_info->persona_id);
                $alumno->user_info_id = null;
                $alumno->save();
                break;
        }
        $user_info->delete();
        $user->delete();
    }
}
