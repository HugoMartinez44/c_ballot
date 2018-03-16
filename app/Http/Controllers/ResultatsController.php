<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultatsController extends Controller
{
    function index($campaignid){
        $data = [
        $nbtotal=\App\Vote::select ('campaignid',$campaignid)->count(),
        $nbyes=\App\Vote::select ('campaignid',$campaignid)->where('choice',1)->count(),
        $nbno=\App\Vote::select ('campaignid',$campaignid)->where('choice',2)->count(),
        $nbnovote=$nbtotal-$nbyes-$nbno,
        $nbvote=$nbtotal-$nbnovote,
        $nomcamp=\App\Campaigns::select('campaignname')->where('campaignid',$campaignid)->first()->campaignname,
        $campaigna=$campaignid,
        ];
        return view('pages.campaigns.résultats') -> with ('data',$data);
    }
    //
}
