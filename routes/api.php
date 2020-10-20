<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ArticleController;
use  App\Http\Controllers\CommentController;


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

Route::get('articles',[ArticleController::class, 'index'] );
Route::get('articles/{article}', [ArticleController::class, 'show' ] );
Route::post('articles', [ArticleController::class, 'store' ] );
Route::put('articles/{article}', [ArticleController::class, 'update' ] );
Route::delete('articles/{article}', [ArticleController::class, 'delete' ]);

Route::get('articles/comments/{article}', [ArticleController::class, 'comments' ] );

Route::post('comments', [CommentController::class, 'store' ] );
Route::put('comments/{comment}', [CommentController::class, 'update' ] );
Route::delete('comments/{comment}', [CommentController::class, 'delete' ]);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
