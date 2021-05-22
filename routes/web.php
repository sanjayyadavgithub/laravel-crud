<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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
    return view('welcome');
});


Route::get("/articles",[ArticleController::class,'show']);

Route::get("/articles/add",[ArticleController::class,'addArticle']);

Route::post("/articles/add",[ArticleController::class,'saveArticle']);

Route::get('/articles/edit/{id}',[ArticleController::class,'editArticle']);

Route::post('/articles/edit/{id}',[ArticleController::class,'updateArticle']);

Route::get('/articles/delete/{id}',[ArticleController::class,'deleteArticle']);

