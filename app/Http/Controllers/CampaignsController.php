<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaigns;
use App\Organization;

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

        $organizations = Organization::where('organizerid',$organizer_id) -> get()->pluck('name', 'organizationid');

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
            'name' => 'required',
            'startdate' => 'required',
            'enddate' => 'required' //Those are rules here
        ]);

        //Create campaign
        $campaign = new Campaigns;
        $campaign->name = $request->input('name');
        $campaign->startdate = $request->input('startdate');
        $campaign->enddate = $request->input('enddate');

        //refers organizer id to his campaign
        $campaign->organizationid = rand();

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
        $campaign = Campaigns::find($campaignid);
        return view('pages.campaigns.show')->with('campaign', $campaign);
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
            'name' => 'required',
            'startdate' => 'required',
            'enddate' => 'required' //Those are rules here
        ]);

        $campaign = Campaigns::find($campaignid);
        $campaign->name = $request->input('name');
        $campaign->startdate = $request->input('startdate');
        $campaign->enddate = $request->input('enddate');
        $campaign->organizationid = rand();
        $campaign->emailid = rand();
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
