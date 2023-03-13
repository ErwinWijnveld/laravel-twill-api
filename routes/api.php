<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PageResource;
use App\Models\Page;
use App\Models\Slugs\PageSlug;

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

    Route::get("page/{slug}", function ($slug) {
        $page = Page::find(
            PageSlug::where("slug", $slug)
                ->get()
                ->first()->page_id
        );
        return new PageResource($page);
    });

    // slugs
    Route::get("page-slugs", function () {
        return PageSlug::all()->pluck("slug");
    });
});
