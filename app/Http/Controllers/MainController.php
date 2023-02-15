<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;

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
    public function createMoviePage()
    {
        $genres = Genre::all();
        $tags = Tag::all();
        return view("createMovie", compact("genres", "tags"));
    }
}