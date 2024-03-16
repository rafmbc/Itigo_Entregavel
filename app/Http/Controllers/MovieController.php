<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller{

    public function index(){
        $movies = Movie::all();
        return view('movies.index', ['movies' => $movies]);
    }

    public function create(){
        return view('movies.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string',
            'duration' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);

        $newMovie = Movie::create($data);

        return redirect(route('movie.index'));

    }

    public function edit(Movie $movie){
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(Movie $movie, Request $request){
        $data = $request->validate([
            'title' => 'required|string',
            'duration' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);

        $movie->update($data);

        return redirect(route('movie.index'))->with('success', 'Movie updated successfully');
    }

    public function destroy(Movie $movie){
        $movie->delete();

        return redirect(route('movie.index'))->with('success', 'Movie delete successfully');
    }

}
