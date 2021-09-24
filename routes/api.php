<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| Please make BLOG & COMMENT CRUD ROUTES
*/

//Display all the blogs
Route::get('/blogs', [BlogController::class, 'index']);

//Display single blog with comment(s) using the slug
Route::get('/blog/{blog:slug}', [BlogController::class, 'show']);


//Store new comment
Route::post('/comments', [CommentController::class, 'store']);

//Update Comment
Route::put('/update-comment/{id}',[CommentController::class, 'update']);

//Delete Comment
Route::delete('/delete-comment/{id}',[CommentController::class, 'delete']);
