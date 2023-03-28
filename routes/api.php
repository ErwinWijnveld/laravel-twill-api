<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Twill\PageController;
use App\Http\Controllers\Twill\BlogController;

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

Route::group(["prefix" => "v1"], function () {
    // pages
    Route::get("page/{slug}", PageController::class . "@apiIndex");
    Route::get("blog/{slug}", BlogController::class . "@apiIndex");

    // slugs
    Route::get("page-slugs", PageController::class . "@slugs");
    Route::get("blog-slugs", BlogController::class . "@slugs");
});
