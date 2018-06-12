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

Route::get('/login', function () {
    return view('login');
});

Route::post('/authenticate',[
    'uses' => 'ApiAuthController@authenticate', 'as' => 'authenticate'
]);

Route::post('/logout',[
    'uses' => 'ApiAuthController@logout', 'as' => 'logout'
])->middleware('jwt.auth');

Route::get('/inicio', function (Request $request) {
    $user_id=Auth::user()->id;
    $user_info=\App\User_Info::where('user_id',"=",$user_id)->take(1)->get();
    $opciones_id = \App\Grupo_Opcion::select('opcion_id')->where('grupo_id',"=",$user_info[0]->grupo_id)->where('vigencia','=',true)->distinct()->get();
    $sistemas_id = \App\Opcion::whereIn('id',$opciones_id)->distinct()->pluck('sistema_id')->toArray();
    $sistemas = \App\Sistema::whereIn('id',$sistemas_id)->get();
    $sistema_id = $request->input('sistema_id');
    $opciones = \App\Opcion::whereIn('id',$opciones_id)->where('sistema_id',$sistema_id)->get();
    $opciones_sup = \App\Opcion::whereIn('id',$opciones_id)->whereNull('opcion_padre_id')->where('sistema_id',$sistema_id)->get();

    return view('inicio',['token'=>$request->input('token'),'sistemas'=>$sistemas,'sistema_id'=>$sistema_id,'opciones_sup'=>$opciones_sup,'opciones'=>$opciones]);
})->middleware('jwt.auth');

Route::get('/planilla', function (Request $request) {
    return view('planilla',['token'=>$request->input('token')]);
})->middleware('jwt.auth');

Route::get('/galeria', ['uses' => 'Album_Controller@ver_galeria', 'as' => 'album.ver_galeria']);

Route::get('/mensaje_texto', ['uses' => 'Sms_Controller@enviar', 'as' => 'sms.enviar']);

Route::get('intranet/mantenimientos/defecto', function (Request $request) {
    $user_id=Auth::user()->id;
    $user_info=\App\User_Info::where('user_id',"=",$user_id)->take(1)->get();
    $opciones_id = \App\Grupo_Opcion::select('opcion_id')->where('grupo_id',"=",$user_info[0]->grupo_id)->where('vigencia','=',true)->distinct()->get();
    $sistemas_id = \App\Opcion::whereIn('id',$opciones_id)->distinct()->pluck('sistema_id')->toArray();
    $sistemas = \App\Sistema::whereIn('id',$sistemas_id)->get();
    $sistema_id = $request->input('sistema_id');
    $opciones = \App\Opcion::whereIn('id',$opciones_id)->where('sistema_id',$sistema_id)->get();
    $opciones_sup = \App\Opcion::whereIn('id',$opciones_id)->whereNull('opcion_padre_id')->where('sistema_id',$sistema_id)->get();

    return view('intranet/mantenimientos/defecto',['token'=>$request->input('token'),'sistemas'=>$sistemas,'sistema_id'=>$sistema_id,'opciones_sup'=>$opciones_sup,'opciones'=>$opciones]);
})->middleware('jwt.auth');







