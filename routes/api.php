<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\UsercontactController;
use App\HTTP\Controllers\MessageController;
use App\HTTP\Controllers\ConversationviewController;
use App\HTTP\Controllers\KeranjangController;
use App\HTTP\Controllers\RoomController;
use App\HTTP\Controllers\ParticipantController;
use App\HTTP\Controllers\ParticipantsviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Error;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building   your API!
|
*/

Route::post('/login', [AuthController::class, 'store']);
// Route::resource('/usercontact', UsercontactController::class);
// Route::resource('/message', MessageController::class);
// Route::resource('/user', UserController::class);
// Route::resource('/conversation', ConversationController::class);
// Route::group(['api' => 'auth', 'middleware' => 'auth:sanctum'], function() {
//   Route::post('logout', [AuthController::class, 'logout']);
//   Route::resource('/product', ProductController::class);
//   Route::resource('/pesanan', PesananController::class);
//   Route::resource('/keranjang', KeranjangController::class);
//   Route::resource('/pegawai', PegawaiController::class);
//   Route::resource('/categorie', CategorieController::class);
// });

Route::resource('/user', UserController::class);
Route::resource('/message', MessageController::class);
Route::get('/message/roomid={id}', [MessageController::class,'showbyroom']);
Route::get('/message', [MessageController::class,'index']);
Route::get('/myroom/userid={id}/roomid={rid}', [ParticipantsviewController::class,'myroomDetail']);
Route::get('/myroom/userid={id}/', [ParticipantsviewController::class,'myroom']);
Route::resource('/room', RoomController::class);
Route::resource('/contact', UsercontactController::class);
Route::resource('/participant', ParticipantController::class);
Route::get('/conversation/roomid={id}',[ ConversationviewController::class,'roomDetail']);
