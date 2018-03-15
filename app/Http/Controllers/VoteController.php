<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VoteController extends Controller
{
    public function index($query)
    {
        $fullUrl = "http://localhost:8000/vote/" . $query;
        $goodUrl = Vote::where('anonymURL', $fullUrl)->count();
        dd($goodUrl);

        if($goodUrl > 0)
        {
            $content = Vote::where('anonymURL', $fullUrl)->content;
            return view('pages.vote')->with('title', $title);
        }
    }
}
