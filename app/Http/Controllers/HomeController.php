<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        /*$movies = Movie::all()->sortByDesc(function($movie) {
            return $movie->ratings->avg('rating');
        })->take(100);*/

        $movies = Movie::with('category')
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderBy('ratings_avg_rating')
            ->limit(100)
            ->get();

        return view('home', compact('movies'));
    }
}
