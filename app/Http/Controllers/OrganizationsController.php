<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Http\Controllers\DashboardController;
class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $organizations = Organization::orderby('created_at', 'desc')->get();
        return view('pages.organizations.index')->with('organizations', $organizations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organizer = auth()->user('organizer');

        $this->validate($request, [
            'name' => 'required',
        ]);

        $organization = new Organization;
        $organization->name = $request->input('name');
        $organization->organizationid = rand();
        $organization->organizerid = $organizer->organizerid;
        //I fucked up those 2 lines above so let's not save that submit ;)
        $organization->save();


        return redirect('/organizations')->with('success', 'Organization created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($organizationid)
    {
        $organization = Organization::find($organizationid);
        return view('pages.organizations.show')->with('organization', $organization);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($organizationid)
    {
        $organization = Organization::find($organizationid);
        return view('pages.organizations.edit')->with('organization', $organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $organizationid)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

        $organization = Organization::find($organizationid);
        $organization->name = $request->input('name');
        $organization->save();


        return redirect('/organizations')->with('success', 'Organization updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($organizationid)
    {
        $organization = Organization::find($organizationid);
        $organization->delete();

        return redirect('/organizations')->with('success', 'Organization removed');
    }
}
