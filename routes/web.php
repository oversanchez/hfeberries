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
    $sistemas =  \App\Sistema::all();
    return view('inicio',['token'=>$request->input('token'),'sistemas'=>$sistemas]);
})->middleware('jwt.auth');

Route::get('/planilla', function (Request $request) {
    return view('planilla',['token'=>$request->input('token')]);
})->middleware('jwt.auth');

Route::get('/galeria', ['uses' => 'Album_Controller@ver_galeria', 'as' => 'album.ver_galeria']);

Route::get('/mensaje_texto', ['uses' => 'Sms_Controller@enviar', 'as' => 'sms.enviar']);

Route::group(['prefix'=>'intranet/mantenimientos','middleware' => 'jwt.auth'], function () {

    

});







