<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, "home"])->name("home");
Route::get('/movies', [MainController::class, "movies"])->name("movies");
Route::get('/createPage', [MainController::class, "createMoviePage"])->name("movie.createPage");