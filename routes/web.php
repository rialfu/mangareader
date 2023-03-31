<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
    dd(RandomString(10));
    return view('welcome');
});

Route::get('/edit-manga/{id}', [AdminController::class, 'editManga'])->name('edit-manga');
Route::put('/edit-manga/{id}', [AdminController::class, 'putEditManga'])->name('edit-manga');
Route::get('/create-manga', [AdminController::class, 'createManga'])->name('create-manga');
Route::post('/create-manga', [AdminController::class, 'postCreateManga']);
Route::get('/manga', [AdminController::class, 'indexManga']);
Route::get('/manga/{id}/{title}', [AdminController::class, 'indexChapter'])->name('chapter');
Route::get('/manga/{id}/{title}/add', [AdminController::class, 'addChapter'])->name('add-chapter');
Route::post('/manga/{id}/{title}/add', [AdminController::class, 'postAddChapter']);
// Route::get('')
