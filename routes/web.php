<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, "home"])->name("home");
Route::get('/movies', [MainController::class, "movies"])->name("movies");
Route::get('/createPage', [MainController::class, "createMoviePage"])->name("movie.createPage");
Route::post('/createMovie', [MainController::class, "createMovie"])->name("movie.create");
Route::get('/delete/{movie}', [MainController::class, "deleteMovie"])->name("movie.delete");
Route::get('/edit/{movie}', [MainController::class, "editMovie"])->name("movie.edit");
Route::post('/update/{movie}', [MainController::class, "updateMovie"])->name("movie.update");