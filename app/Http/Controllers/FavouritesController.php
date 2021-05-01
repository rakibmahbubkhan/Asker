<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;

class FavouritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Question $question)
    {
        $question->favourites()->attach(Auth::user()->id);

        return back();
    }

    public function destroy(Question $question)
    {
        $question->favourites()->detach(Auth::user()->id);

        return back();
    }
}