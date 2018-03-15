<?php

namespace App\Http\Controllers;

use App\Campaigns;
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
            'organizer_co' => $organizer_co=auth()->user('organizer'),
            'organizer_name' =>$organizer_co -> organizername,
            'your_organizations' =>Organization::select ('organization.organizationname','organization.organizationid')-> join('organizer','organizer.organizerid', '=','organization.organizerid')->where('organizer.organizerid',$organizer_co -> organizerid)->get(),
            'your_campaigns' => Campaigns::select ('campaign.campaignname')-> join('organization','organization.organizationid', '=','campaign.organizationid')->join('organizer','organizer.organizerid','=','organization.organizerid')->where('organizer.organizerid',$organizer_co -> organizerid)->get(),


        ];
        return view('pages.dashboard') -> with ('data',$data);
    }

    public function success()
    {
        return view('pages.mailSuccess');
    }


}
