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
        
        $hasvoted = Vote::where('anonymURL', $fullUrl)->value('voted');
        dd($hasvoted);

        if($goodUrl > 0 && $hasvoted == 0)
        {
            $vote_content = Vote::where('anonymURL', $fullUrl)->content;
            return view('pages.vote.vote_success')->with('content', $vote_content);
        }
        else
        {
            return view('pages.vote.vote_error');
        }
    }
}
