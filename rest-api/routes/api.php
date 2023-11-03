<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// //method get
// Route::get('/animals', function () {
//     return "Menampilkan seluruh  data animals";
// });
// //method post
// Route::post('/animals', function () {
//     return "Menambahkan data hewan";
// });
// //method put
// Route::put('/animals/{id}', function ($id) {
//     return "Mengupdate data hewan id $id";
// });
// //method delete
// Route::delete('/animals/{id}', function ($id) {
//     return "Menghapus data hewan id $id";
// });

//method get
Route::get('/animals', [AnimalController::class, 'index']);
//method post
Route::post('/animals', [AnimalController::class, 'store']);
//method put
Route::put('/animals/{id}', [AnimalController::class, 'update']);
//method delete
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

//method get
Route::get('/students/{id}',[StudentController::class, 'show']);
//method get
Route::get('/students',[StudentController::class, 'index']);
//method post
Route::post('/students',[StudentController::class, 'store']);
//method put
Route::put('/students/{id}', [StudentController::class, 'update']);
//method delete
Route::delete('/students/{id}', [StudentController::class, 'destroy']);