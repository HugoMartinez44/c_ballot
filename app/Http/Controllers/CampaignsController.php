<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaigns;
use App\Organization;
use App\Emails;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $campaigns = Campaigns::orderby('created_at', 'desc')->get();
        return view('pages.campaigns.index')->with('campaigns', $campaigns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizer_id= auth()->user('organizer')->organizerid;
        //$organizations = Organization::pluck('name', 'organizationid');

        $organizations = Organization::where('organizerid',$organizer_id) -> get()->pluck('organizationname', 'organizationid');

        return view('pages.campaigns.create')->with('organizations', $organizations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //it takes a request object because we edit from form.
    {

        $this->validate($request, [
            'campaignname' => 'required',
            'startdate' => 'required',
            'enddate' => 'required' //rules here
        ]);

        //Create campaign
        $campaign = new Campaigns;
        $campaign->campaignname = $request->input('campaignname');
        $campaign->startdate = $request->input('startdate');
        $campaign->enddate = $request->input('enddate');
        $campaign->organizationid = $request->input('organizationid');
        $campaign->hasBegun = false;
        $campaign->hasEnded = false;

        //refers organizerid to his campaign
        $organizer_id= auth()->user('organizer')->organizerid;

        //I fucked up this line.
        $campaign->emailid = rand();

        //Save the new created campain
        $campaign->save();


        return redirect('/campaigns')->with('success', 'Campaign created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($campaignid)
    {
        $emails = Emails::all()->pluck('adresse_mail');
        $campaign = Campaigns::find($campaignid);
        return view('pages.campaigns.show')->with('campaign', $campaign)->with('emails', $emails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($campaignid)
    {
        $campaign = Campaigns::find($campaignid);
        return view('pages.campaigns.edit')->with('campaign', $campaign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $campaignid) //même logique
    {
        $this->validate($request, [
            'campaignname' => 'required',
            'startdate' => 'required',
            'enddate' => 'required' //Those are rules here
        ]);

        $campaign = Campaigns::find($campaignid);
        $campaign->campaignname = $request->input('campaignname');
        $campaign->startdate = $request->input('startdate');
        $campaign->enddate = $request->input('enddate');
        $campaign->save();


        return redirect('/campaigns')->with('success', 'Campaign updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($campaignid)
    {
        $campaign = Campaigns::find($campaignid);
        $campaign->delete();

        return redirect('/campaigns')->with('success', 'Campaigns removed');
    }

    //CRUD fonctionnality for my dear client here ;)
}
