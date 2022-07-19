<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackArsipController;
use App\Http\Controllers\FeedbackBukuController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\WaitingListController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// service buku
Route::get('/buku/list', [BukuController::class, 'index']);
Route::post('/buku/cari', [BukuController::class, 'cari']);
Route::post('/buku/totalcari', [BukuController::class, 'totalcari']);
Route::post('/buku/search', [BukuController::class, 'search']);
Route::post('/buku/totalsearch', [BukuController::class, 'totalsearch']);
Route::get('/buku/detail/{id}', [BukuController::class, 'detail']);
Route::get('/buku/author/{author}', [BukuController::class, 'author']);
Route::get('/buku/tahun/{tahun}', [BukuController::class, 'tahun']);
Route::get('/buku/publisher/{publisher}', [BukuController::class, 'publisher']);
Route::get('/buku/koleksi/{koleksi}', [BukuController::class, 'koleksi']);
Route::get('/buku/topik/{topik}', [BukuController::class, 'topik']);


// service arsip
Route::get('/arsip/list', [ArsipController::class, 'index']);
Route::post('/arsip/cari', [ArsipController::class, 'cari']);
Route::post('/arsip/totalcari', [ArsipController::class, 'totalcari']);
Route::post('/arsip/search', [ArsipController::class, 'search']);
Route::post('/arsip/totalsearch', [ArsipController::class, 'totalsearch']);
Route::get('/arsip/detail/{id}', [ArsipController::class, 'detail']);
Route::get('/arsip/tahun/{tahun}', [ArsipController::class, 'tahun']);

//service user
Route::get("/user/login", [UserController::class, 'login']);
Route::post("/user/dologin", [UserController::class, 'dologin']);
Route::post("/user/email", [UserController::class, 'email']);
Route::post("/user/store", [UserController::class, 'store']);
Route::get("/user/redirect", [UserController::class, 'redirect']);
Route::get("/user/callback", [UserController::class, 'callback']);
Route::post("/user/{id}/update", [UserController::class, 'update']);

//service feedbackBuku
Route::get('/feedbackbuku/list/{id}', [FeedbackBukuController::class, 'index']);
Route::post('/feedbackbuku/submit/{id}', [FeedbackBukuController::class, 'store']);
Route::get('/feedbackbuku/{id}/edit', [FeedbackBukuController::class, 'edit']);
Route::put('/feedbackbuku/{id}/update', [FeedbackBukuController::class, 'update']);
Route::delete('/feedbackbuku/{id}/delete', [FeedbackBukuController::class, 'delete']);

//service feedbackArsip
Route::get('/feedbackarsip/list/{id}', [FeedbackArsipController::class, 'index']);
Route::post('/feedbackarsip/submit/{id}', [FeedbackArsipController::class, 'store']);
Route::get('/feedbackarsip/{id}/edit', [FeedbackArsipController::class, 'edit']);
Route::put('/feedbackarsip/{id}/update', [FeedbackArsipController::class, 'update']);
Route::delete('/feedbackarsip/{id}/delete', [FeedbackArsipController::class, 'delete']);

//service mitra
Route::get('/mitra', [PerpustakaanController::class, 'index']);

//service waiting list for phyton
Route::resource('/waiting', WaitingListController::class);
