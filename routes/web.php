<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;

use app\Mail\ConctactanosMailable;
USE illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware grou Now create something great!
|
*/
// Route::view('/prueba', function () {
//     return new passWordForget("Alex");

// });

// Route::get ('/test', function () {
//     // $response = Mail::to('erick.alexis.venegas@gmail.com')->send(new Resetpassword("Alex"));
//     // dump($response);
//     return (new Notification("Alex"))->render();
    
// });

Route::view('reset', 'users.reset')->name('reset');


Route::get('email', [UserController::class, 'email'])->name('email');
Route::post('enlace', [UserController::class, 'enlace'])->name('enlace');
Route::get('clave/{token}', [UserController::class, 'clave'])->name('clave');
Route::post('cambiar', [UserController::class, 'cambiar'])->name('cambiar');




Route::view('/login','users.login')->name('login');
Route::view('/register','users.register')->name('register');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/do-login',[UserController::class,'login'])->name('do-login');
Route::post('/do-register',[UserController::class,'register'])->name('do-register');

Route::middleware('auth')->get('/',[PictureController::class,'home'])->name('home');
Route::middleware('auth')->post('/save-picture',[PictureController::class,'saveAjax'])->name('save-picture');
Route::middleware('auth')->get('/picture/{picture}',[PictureController::class,'getPicture'])->name('get-picture');
Route::middleware('auth')->delete('/remove-picture',[PictureController::class,'removePicture'])->name('remove-picture');


Route::get('contactanos', function () {
    $correo = new ConctactanosMailable;
    Mail::to('erick.alexis.venegas@gmail.com')->send($correo);

    return "mensaje enviado";
});