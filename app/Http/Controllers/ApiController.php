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
    public function deleteMovie(Movie $movie)
    {
        $movie->tags()->sync([]);
        $movie->delete();
        return response()->json([
            "success" => true,
            "response" => $movie
        ]);
    }
    public function createMovie(Request $request)
    {
        $data = $request->validate([
            "name" => ["string", "required"],
            "year" => ["integer", "required"],
            "cashOut" => ["integer", "required"],
            "genre" => ["required"],
            "tag" => ["required", "array"]
        ]);
        $movie = new Movie();
        $movie->name = $data["name"];
        $movie->year = $data["year"];
        $movie->cashOut = $data["cashOut"];
        $genre = Genre::find($data["genre"]);
        $movie->genre()->associate($genre);
        $movie->save();
        $tags = Tag::find([$data["tag"]]);
        $movie->tags()->attach($tags);
        return response()->json([
            "success" => true,
            "response" => $movie
        ]);
    }
    public function getMovie($id)
    {
        $movie = Movie::find($id);
        $movie["tags"] = $movie->tags;
        return response()->json([
            "success" => true,
            "response" => $movie
        ]);
    }
    public function updateMovie(Request $request, Movie $movie)
    {
        $data = $request->validate([
            "name" => ["string", "required"],
            "year" => ["integer", "required"],
            "cashOut" => ["integer", "required"],
            "genre" => ["required"],
            "tag" => ["required", "array"]
        ]);

        $movie->name = $data["name"];
        $movie->year = $data["year"];
        $movie->cashOut = $data["cashOut"];
        $genre = Genre::find($data["genre"]);
        $movie->genre()->associate($genre);
        $movie->save();
        $tags = Tag::find([$data["tag"]]);
        $movie->tags()->attach($tags);
        return response()->json([
            "success" => true,
            "response" => $movie
        ]);
    }
}