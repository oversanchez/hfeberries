<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Ficha_Matricula_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet/mantenimientos/ficha_matricula');
    }

    public function ver_ficha_matricula()
    {
        $opciones = \App\Opcion_Menu::where('publico',true)->orderBy('orden','asc')->get();
        $opciones_footer = \App\Opcion_Footer::where('publico',true)->orderBy('id', 'desc')->get();

        $institucion = \App\Institucion::take(1)->get()[0];

        return view('website/ficha_matricula',['opciones_footer'=>$opciones_footer,'institucion'=>$institucion,'opciones'=>$opciones]);
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

    public function store(Request $request)
    {
        $ficha_matricula = new \App\Ficha_Matricula();
        $ficha_matricula->pem = $request->input('pem');
        $ficha_matricula->tipo_matricula = $request->input('tipo_matricula');
        $ficha_matricula->seccion_id = $request->input('seccion_id');
        $ficha_matricula->alumno_nombres = $request->input('alumno_nombres');
        $ficha_matricula->alumno_apellido_paterno = $request->input('alumno_apellido_paterno');
        $ficha_matricula->alumno_apellido_materno = $request->input('alumno_apellido_materno');        
        $ficha_matricula->alumno_numero_documento = $request->input('alumno_numero_documento');
        $ficha_matricula->alumno_tipo_documento_id = $request->input('alumno_tipo_documento_id');

        /*
        $ficha_matricula->alumno_fecha_nacimiento = $request->input('alumno_fecha_nacimiento');
        $ficha_matricula->alumno_sexo = $request->input('alumno_sexo');
        $ficha_matricula->alumno_direccion = $request->input('alumno_direccion');
        $ficha_matricula->alumno_telf_fijo = $request->input('alumno_telf_fijo');
        $ficha_matricula->alumno_padres_juntos = $request->input('alumno_padres_juntos');
        $ficha_matricula->alumno_colegio_procedencia_id = $request->input('alumno_colegio_procedencia_id');
        $ficha_matricula->padre_nombres = $request->input('padre_nombres');
        $ficha_matricula->padre_numero_documento = $request->input('padre_numero_documento');
        $ficha_matricula->padre_tipo_documento = $request->input('padre_tipo_documento');
        $ficha_matricula->padre_fecha_nacimiento = $request->input('padre_fecha_nacimiento');
        $ficha_matricula->padre_sexo = $request->input('padre_sexo');
        $ficha_matricula->padre_direccion = $request->input('padre_direccion');
        $ficha_matricula->padre_email = $request->input('padre_email');
        $ficha_matricula->padre_telf_movil = $request->input('padre_telf_movil');
        $ficha_matricula->padre_telf_fijo = $request->input('padre_telf_fijo');
        $ficha_matricula->padre_apoderado = $request->input('padre_apoderado');
        $ficha_matricula->padre_vive_educando = $request->input('padre_vive_educando');
        $ficha_matricula->padre_estado_civil = $request->input('padre_estado_civil');
        $ficha_matricula->padre_ocupacion = $request->input('padre_ocupacion');
        $ficha_matricula->padre_lugar_trabajo = $request->input('padre_lugar_trabajo');
        $ficha_matricula->padre_parentesco_id = $request->input('padre_parentesco_id');
        $ficha_matricula->padre_nivel_educativo_id = $request->input('padre_nivel_educativo_id');
        $ficha_matricula->madre_nombres = $request->input('madre_nombres');
        $ficha_matricula->madre_numero_documento = $request->input('madre_numero_documento');
        $ficha_matricula->madre_tipo_documento = $request->input('madre_tipo_documento');
        $ficha_matricula->madre_fecha_nacimiento = $request->input('madre_fecha_nacimiento');
        $ficha_matricula->madre_sexo = $request->input('madre_sexo');
        $ficha_matricula->madre_direccion = $request->input('madre_direccion');
        $ficha_matricula->madre_email = $request->input('madre_email');
        $ficha_matricula->madre_telf_movil = $request->input('madre_telf_movil');
        $ficha_matricula->madre_telf_fijo = $request->input('madre_telf_fijo');
        $ficha_matricula->madre_apoderado = $request->input('madre_apoderado');
        $ficha_matricula->madre_vive_educando = $request->input('madre_vive_educando');
        $ficha_matricula->madre_estado_civil = $request->input('madre_estado_civil');
        $ficha_matricula->madre_ocupacion = $request->input('madre_ocupacion');
        $ficha_matricula->madre_lugar_trabajo = $request->input('madre_lugar_trabajo');
        $ficha_matricula->madre_parentesco_id = $request->input('madre_parentesco_id');
        $ficha_matricula->madre_nivel_educativo_id = $request->input('madre_nivel_educativo_id');
        $ficha_matricula->apoderado_nombres = $request->input('apoderado_nombres');
        $ficha_matricula->apoderado_apellido_paterno = $request->input('apoderado_apellido_paterno');
        $ficha_matricula->apoderado_apellido_materno = $request->input('apoderado_apellido_materno');
        $ficha_matricula->apoderado_numero_documento = $request->input('apoderado_numero_documento');
        $ficha_matricula->apoderado_tipo_documento = $request->input('apoderado_tipo_documento');
        $ficha_matricula->apoderado_fecha_nacimiento = $request->input('apoderado_fecha_nacimiento');
        $ficha_matricula->apoderado_sexo = $request->input('apoderado_sexo');
        $ficha_matricula->apoderado_direccion = $request->input('apoderado_direccion');
        $ficha_matricula->apoderado_email = $request->input('apoderado_email');
        $ficha_matricula->apoderado_telf_movil = $request->input('apoderado_telf_movil');
        $ficha_matricula->apoderado_telf_fijo = $request->input('apoderado_telf_fijo');
        $ficha_matricula->apoderado_apoderado = $request->input('apoderado_apoderado');
        $ficha_matricula->apoderado_vive_educando = $request->input('apoderado_vive_educando');
        $ficha_matricula->apoderado_estado_civil = $request->input('apoderado_estado_civil');
        $ficha_matricula->apoderado_ocupacion = $request->input('apoderado_ocupacion');
        $ficha_matricula->apoderado_lugar_trabajo = $request->input('apoderado_lugar_trabajo');
        $ficha_matricula->apoderado_parentesco_id = $request->input('apoderado_parentesco_id');
        $ficha_matricula->apoderado_nivel_educativo_id = $request->input('apoderado_nivel_educativo_id');
         */
        $ficha_matricula->save();
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Ficha_Matricula::find($id);
        } else if($id == "*"){
            return \App\Ficha_Matricula::all();
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $ficha_matricula = \App\Ficha_Matricula::find($id);


        if($ficha_matricula->pem == $request->input('pem') && $ficha_matricula->alumno_numero_documento == $request->input('alumno_numero_documento')){

            $ficha_matricula->alumno_nombres = $request->input('alumno_nombres');
            $ficha_matricula->alumno_apellido_paterno = $request->input('alumno_apellido_paterno');
            $ficha_matricula->alumno_apellido_materno = $request->input('alumno_apellido_materno');
            //$ficha_matricula->alumno_numero_documento = $request->input('alumno_numero_documento');
            $ficha_matricula->alumno_tipo_documento_id = $request->input('alumno_tipo_documento_id');
            $ficha_matricula->alumno_fecha_nacimiento = $request->input('alumno_fecha_nacimiento');
            $ficha_matricula->alumno_sexo = $request->input('alumno_sexo');
            $ficha_matricula->alumno_direccion = $request->input('alumno_direccion');
            $ficha_matricula->alumno_telf_fijo = $request->input('alumno_telf_fijo');
            $ficha_matricula->alumno_padres_juntos = $request->input('alumno_padres_juntos');
            $ficha_matricula->alumno_colegio_procedencia = $request->input('alumno_colegio_procedencia');
            $ficha_matricula->alumno_apoderado = $request->input('alumno_apoderado');

            $ficha_matricula->padre_apellido_paterno = $request->input('padre_apellido_paterno');
            $ficha_matricula->padre_apellido_materno = $request->input('padre_apellido_materno');
            $ficha_matricula->padre_nombres = $request->input('padre_nombres');
            $ficha_matricula->padre_numero_documento = $request->input('padre_numero_documento');
            $ficha_matricula->padre_tipo_documento_id = $request->input('padre_tipo_documento_id');
            $ficha_matricula->padre_fecha_nacimiento = $request->input('padre_fecha_nacimiento');
            $ficha_matricula->padre_sexo = $request->input('padre_sexo');
            $ficha_matricula->padre_direccion = $request->input('padre_direccion');
            $ficha_matricula->padre_email = $request->input('padre_email');
            $ficha_matricula->padre_telf_movil = $request->input('padre_telf_movil');
            $ficha_matricula->padre_vive_educando = $request->input('padre_vive_educando');
            $ficha_matricula->padre_estado_civil = $request->input('padre_estado_civil');
            $ficha_matricula->padre_ocupacion = $request->input('padre_ocupacion');
            $ficha_matricula->padre_cargo = $request->input('padre_cargo');
            $ficha_matricula->padre_lugar_trabajo = $request->input('padre_lugar_trabajo');
            $ficha_matricula->padre_nivel_educativo_id = $request->input('padre_nivel_educativo_id');

            $ficha_matricula->madre_apellido_paterno = $request->input('madre_apellido_paterno');
            $ficha_matricula->madre_apellido_materno = $request->input('madre_apellido_materno');
            $ficha_matricula->madre_nombres = $request->input('madre_nombres');
            $ficha_matricula->madre_numero_documento = $request->input('madre_numero_documento');
            $ficha_matricula->madre_tipo_documento_id = $request->input('madre_tipo_documento_id');
            $ficha_matricula->madre_fecha_nacimiento = $request->input('madre_fecha_nacimiento');
            $ficha_matricula->madre_sexo = $request->input('madre_sexo');
            $ficha_matricula->madre_direccion = $request->input('madre_direccion');
            $ficha_matricula->madre_email = $request->input('madre_email');
            $ficha_matricula->madre_telf_movil = $request->input('madre_telf_movil');
            $ficha_matricula->madre_vive_educando = $request->input('madre_vive_educando');
            $ficha_matricula->madre_estado_civil = $request->input('madre_estado_civil');
            $ficha_matricula->madre_ocupacion = $request->input('madre_ocupacion');
            $ficha_matricula->madre_cargo = $request->input('madre_cargo');
            $ficha_matricula->madre_lugar_trabajo = $request->input('madre_lugar_trabajo');
            $ficha_matricula->madre_nivel_educativo_id = $request->input('madre_nivel_educativo_id');

            $ficha_matricula->apoderado_nombres = $request->input('apoderado_nombres');
            $ficha_matricula->apoderado_apellido_paterno = $request->input('apoderado_apellido_paterno');
            $ficha_matricula->apoderado_apellido_materno = $request->input('apoderado_apellido_materno');
            $ficha_matricula->apoderado_numero_documento = $request->input('apoderado_numero_documento');
            $ficha_matricula->apoderado_tipo_documento_id = $request->input('apoderado_tipo_documento_id');
            $ficha_matricula->apoderado_fecha_nacimiento = $request->input('apoderado_fecha_nacimiento');
            $ficha_matricula->apoderado_sexo = $request->input('apoderado_sexo');
            $ficha_matricula->apoderado_direccion = $request->input('apoderado_direccion');
            $ficha_matricula->apoderado_email = $request->input('apoderado_email');
            $ficha_matricula->apoderado_telf_movil = $request->input('apoderado_telf_movil');
            $ficha_matricula->apoderado_vive_educando = $request->input('apoderado_vive_educando');
            $ficha_matricula->apoderado_estado_civil = $request->input('apoderado_estado_civil');
            $ficha_matricula->apoderado_ocupacion = $request->input('apoderado_ocupacion');
            $ficha_matricula->apoderado_cargo = $request->input('apoderado_cargo');
            $ficha_matricula->apoderado_lugar_trabajo = $request->input('apoderado_lugar_trabajo');
            $ficha_matricula->apoderado_parentesco_id = $request->input('apoderado_parentesco_id');
            $ficha_matricula->apoderado_nivel_educativo_id = $request->input('apoderado_nivel_educativo_id');
            $ficha_matricula->save();
        }

    }

    public function imprimir(){
        $ficha_matricula = \App\Ficha_Matricula::find(Input::get('id'));
        if($ficha_matricula->pem == Input::get('pem') && $ficha_matricula->alumno_numero_documento == Input::get('alumno_numero_documento')){
            $ficha_matricula->imprimir=true;
            $ficha_matricula->save();
        }
    }

    public function habilitar_edicion(){
        $ficha_matricula = \App\Ficha_Matricula::find(Input::get('id'));
        if($ficha_matricula->pem == Input::get('pem') && $ficha_matricula->alumno_numero_documento == Input::get('alumno_numero_documento')){
            $ficha_matricula->imprimir=false;
            $ficha_matricula->save();
        }
    }
    public function destroy($id)
    {
        $ficha_matricula = \App\Ficha_Matricula::find($id);
        $ficha_matricula->delete();
    }
    public function listar()
    {
        $ficha_matriculas =  \App\Ficha_Matricula::where('seccion_id',Input::get('seccion_id'))->orderBy('id','desc')->get();
        foreach ($ficha_matriculas as $ficha_matricula){
            $ficha_matricula->seccion;
        }
        return $ficha_matriculas;
    }

    public function buscar()
    {
        $ficha_matriculas =  \App\Ficha_Matricula::where('pem',Input::get('pem'))->where('alumno_numero_documento',Input::get('alumno_numero_documento'))->get();
        foreach ($ficha_matriculas as $ficha_matricula){
            $ficha_matricula->alumno_tipo_documento;
            $ficha_matricula->padre_tipo_documento;
            $ficha_matricula->madre_tipo_documento;
            $ficha_matricula->apoderado_tipo_documento;

            $ficha_matricula->padre_nivel_educativo;
            $ficha_matricula->madre_nivel_educativo;
            $ficha_matricula->apoderado_nivel_educativo;

            $ficha_matricula->apoderado_parentesco;
            $ficha_matricula->seccion;
        }
        return $ficha_matriculas;
    }

}

