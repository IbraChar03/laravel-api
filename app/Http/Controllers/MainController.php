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
    public function createMovie(Request $request)
    {
        $data = $request->validate([
            "name" => ["string", "required"],
            "year" => ["integer", "required"],
            "cashOut" => ["integer", "required"],
            "genre" => ["required"],
            "tag" => ["required"]
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
        return redirect()->route("movies");
    }
    public function deleteMovie(Movie $movie)
    {
        $movie->tags()->sync([]);
        $movie->delete();
        return redirect()->route("movies");
    }
    public function editMovie(Movie $movie)
    {
        $tags = Tag::all();
        $genres = Genre::all();
        return view("editMovie", compact("movie", "tags", "genres"));

    }
    public function updateMovie(Request $request, Movie $movie)
    {
        $data = $request->validate([
            "name" => ["string", "required"],
            "year" => ["integer", "required"],
            "cashOut" => ["integer", "required"],
            "genre" => ["required"],
            "tag" => ["required"]
        ]);

        $movie->name = $data["name"];
        $movie->year = $data["year"];
        $movie->cashOut = $data["cashOut"];
        $genre = Genre::find($data["genre"]);
        $movie->genre()->associate($genre);
        $movie->save();
        $tags = Tag::find([$data["tag"]]);
        $movie->tags()->sync($tags);
        return redirect()->route("movies");
    }
}