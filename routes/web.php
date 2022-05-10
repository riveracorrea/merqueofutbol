<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::post('/UploadFile', [FileController::class, 'UploadFile']);
Route::get('/Play',[PlayController::class, 'play']);
Route::controller(QueryController::class)->group(function () {
    Route::get('/Query1', 'query1');
    Route::get('/Query2', 'query2');
    Route::get('/Query3', 'query3');
     
});


 