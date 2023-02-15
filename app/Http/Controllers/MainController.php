<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;

class MainController extends Controller
{
    public function home()
    {
        $genres = Genre::all();
        return view("home", compact("genres"));
    }
    public function movies()
    {
        $movies = Movie::all();
        return view("movies", compact("movies"));
    }
}