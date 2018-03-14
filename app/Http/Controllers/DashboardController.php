<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Organizer;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         //here we get an array with the organizerid and more..
        $data = [
            'organizer_id' => $organizer_co=auth()->user('organizer'),
            'organizer_name' =>$organizer_co -> name,
            'your_organizations' => Organization::where('organizerid',$organizer_co->organizerid) -> get(),

        ];
        return view('pages.dashboard') -> with ('data',$data);
    }


}
