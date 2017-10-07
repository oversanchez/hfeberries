<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

Route::get('/intranet/login', function () {
    return view('intranet/login');
});

Route::post('/intranet/authenticate',[
    'uses' => 'ApiAuthController@authenticate', 'as' => 'intranet.authenticate'
]);

Route::post('/intranet/logout',[
    'uses' => 'ApiAuthController@logout', 'as' => 'intranet.logout'
])->middleware('jwt.auth');

Route::get('/intranet/inicio', function (Request $request) {
    return view('intranet/inicio',['token'=>$request->input('token')]);
})->middleware('jwt.auth');

Route::resource('/','\App\Http\Controllers\Website_Controller');

Route::get('/noticias/{id}/ver', ['uses' => 'Noticia_Controller@ver_noticia', 'as' => 'noticia.ver_noticia']);

Route::get('/eventos/{id}/ver', ['uses' => 'Evento_Controller@ver_evento', 'as' => 'evento.ver_evento']);

Route::get('/paginas/{id}/ver', ['uses' => 'Pagina_Web_Controller@ver_pagina', 'as' => 'pagina_web.ver_pagina']);

Route::get('/galeria', ['uses' => 'Album_Controller@ver_galeria', 'as' => 'album.ver_galeria']);

Route::get('/videos', ['uses' => 'Video_Controller@ver_videos', 'as' => 'album.ver_videos']);

Route::get('/ficha_matricula', ['uses' => 'Ficha_Matricula_Controller@ver_ficha_matricula', 'as' => 'ficha_matricula.ver_ficha_matricula']);

Route::get('/mensaje_texto', ['uses' => 'Sms_Controller@enviar', 'as' => 'sms.enviar']);

Route::group(['prefix'=>'intranet/mantenimientos','middleware' => 'jwt.auth'], function () {

    Route::resource('anio_lectivo','\App\Http\Controllers\Anio_Lectivo_Controller');

    Route::get('periodo/listar', ['uses' => 'Periodo_Controller@listar', 'as' => 'periodo.listar']);

    Route::resource('periodo','\App\Http\Controllers\Periodo_Controller');

    Route::resource('nivel','\App\Http\Controllers\Nivel_Controller');

    Route::get('grado/listar', ['uses' => 'Grado_Controller@listar', 'as' => 'grado.listar']);

    Route::resource('grado','\App\Http\Controllers\Grado_Controller');

    Route::resource('especialidad','\App\Http\Controllers\Especialidad_Controller');

    Route::resource('categoria_trabajador','\App\Http\Controllers\Categoria_Trabajador_Controller');

    Route::resource('parentesco','\App\Http\Controllers\Parentesco_Controller');

    Route::resource('nivel_educativo','\App\Http\Controllers\Nivel_Educativo_Controller');

    Route::resource('colegio_procedencia','\App\Http\Controllers\Colegio_Procedencia_Controller');

    Route::get('trabajador/listar', ['uses' => 'Trabajador_Controller@listar', 'as' => 'trabajador.listar']);

    Route::get('trabajador/listar_usuarios', ['uses' => 'Trabajador_Controller@listar_usuarios', 'as' => 'trabajador.listar_usuarios']);

    Route::get('trabajador/buscar_numero_documento', ['uses' => 'Trabajador_Controller@buscar_numero_documento', 'as' => 'trabajador.buscar_numero_documento']);

    Route::resource('trabajador','\App\Http\Controllers\Trabajador_Controller');

    Route::get('apoderado/listar', ['uses' => 'Apoderado_Controller@listar', 'as' => 'apoderado.listar']);

    Route::resource('apoderado','\App\Http\Controllers\Apoderado_Controller');

    Route::get('alumno/listar', ['uses' => 'Alumno_Controller@listar', 'as' => 'alumno.listar']);

    Route::get('alumno/buscar_numero_documento', ['uses' => 'Alumno_Controller@buscar_numero_documento', 'as' => 'alumno.buscar_numero_documento']);

    Route::resource('alumno','\App\Http\Controllers\Alumno_Controller');

    Route::resource('turno','\App\Http\Controllers\Turno_Controller');

    Route::get('seccion/listar', ['uses' => 'Seccion_Controller@listar', 'as' => 'seccion.listar']);

    Route::resource('seccion','\App\Http\Controllers\Seccion_Controller');

    Route::get('familiar/listar', ['uses' => 'Familiar_Controller@listar', 'as' => 'familiar.listar']);

    Route::resource('familiar','\App\Http\Controllers\Familiar_Controller');

    Route::resource('user_info','\App\Http\Controllers\User_Info_Controller');

    Route::get('ficha_matricula/listar', ['uses' => 'Ficha_Matricula_Controller@listar', 'as' => 'ficha_matricula.listar']);

    Route::get('ficha_matricula/buscar', ['uses' => 'Ficha_Matricula_Controller@buscar', 'as' => 'ficha_matricula.buscar']);

    Route::get('ficha_matricula/imprimir', ['uses' => 'Ficha_Matricula_Controller@imprimir', 'as' => 'ficha_matricula.imprimir']);

    Route::get('ficha_matricula/habilitar_edicion', ['uses' => 'Ficha_Matricula_Controller@habilitar_edicion', 'as' => 'ficha_matricula.habilitar_edicion']);

    Route::resource('ficha_matricula','\App\Http\Controllers\Ficha_Matricula_Controller');

    Route::resource('tipo_documento','\App\Http\Controllers\Tipo_Documento_Controller');

    Route::get('puesto_trabajo/listar', ['uses' => 'Puesto_Trabajo_Controller@listar', 'as' => 'puesto_trabajo.listar']);

    Route::resource('puesto_trabajo','\App\Http\Controllers\Puesto_Trabajo_Controller');

    Route::resource('estado_tramite','\App\Http\Controllers\Estado_Tramite_Controller');

});

Route::group(['prefix'=>'intranet/procesos'], function () {

    Route::get('control_reunion/listar', ['uses' => 'Control_Reunion_Controller@listar', 'as' => 'control_reunion.listar']);

    Route::resource('control_reunion','\App\Http\Controllers\Control_Reunion_Controller');

});

Route::group(['prefix'=>'intranet/website'], function () {

    Route::resource('enlace_rapido','\App\Http\Controllers\Enlace_Rapido_Controller');

    Route::resource('noticia','\App\Http\Controllers\Noticia_Controller');

    Route::resource('evento','\App\Http\Controllers\Evento_Controller');

    Route::resource('video','\App\Http\Controllers\Video_Controller');

    Route::resource('comunicado','\App\Http\Controllers\Comunicado_Controller');

    Route::resource('slider','\App\Http\Controllers\Slider_Controller');

    Route::get('opcion_menu/listar', ['uses' => 'Opcion_Menu_Controller@listar', 'as' => 'opcion_menu.listar']);

    Route::resource('opcion_menu','\App\Http\Controllers\Opcion_Menu_Controller');

    Route::resource('pagina_web','\App\Http\Controllers\Pagina_Web_Controller');

    Route::get('foto/listar', ['uses' => 'Foto_Controller@listar', 'as' => 'foto.listar']);

    Route::resource('foto','\App\Http\Controllers\Foto_Controller');

    Route::resource('album','\App\Http\Controllers\Album_Controller');

    Route::resource('testimonio','\App\Http\Controllers\Testimonio_Controller');

    Route::resource('opcion_footer','\App\Http\Controllers\Opcion_Footer_Controller');

    Route::resource('institucion','\App\Http\Controllers\Institucion_Controller');

    Route::resource('emergente','\App\Http\Controllers\Emergente_Controller');

    //Route::get('periodo/listar', ['uses' => 'Periodo_Controller@listar', 'as' => 'periodo.listar']);
});

//Route::resource('file', 'FileController');







