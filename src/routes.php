<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config("hanakivan.laravellogviewer.routeprefix"))->group(function () {
    Route::get('logviewer', [\hanakivan\LaravelLogViewer\LaravelLogViewerController::class, "logviewer"])->name("hanakivan.logviewer.list");
});
