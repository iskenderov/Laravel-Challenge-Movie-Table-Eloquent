<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        /******** OPTIMIZED ******/
        $movies = Movie::with('category')
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderByDesc('ratings_avg_rating')
            ->get()
            ->take(100);


        /******** ORIGINAL ******/
        /*        $movies = Movie::all()->sortByDesc(function ($movie) {
                    return $movie->ratings->avg('rating');
                })->take(100);*/


        return view('home', compact('movies'));
    }
}
