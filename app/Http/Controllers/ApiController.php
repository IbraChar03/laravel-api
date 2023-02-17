<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Tag;
use App\Models\Genre;

class ApiController extends Controller
{
    public function data()
    {
        $tags = Tag::all();
        $genres = Genre::all();
        $movies = Movie::with("genre", "tags")->get();
        return response()->json([
            "success" => true,
            "response" => [
                "genres" => $genres,
                "tags" => $tags,
                "movies" => $movies
            ]
        ]);
    }
}