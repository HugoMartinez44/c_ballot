<?php

namespace App\Http\Controllers;

use App\Campaigns;
use Illuminate\Http\Request;
use App\Organization;

class DatatableController extends Controller
{
    //

    public function getOrganizations(Request $request){
        //print_r($request->all());
        $columns = array(
            0 => 'organizationname',
            1 => 'organizername',
            2 => 'created_at',
        );

        $totalData = Organization::select('organizename')->join('organizer','organizer.organizerid', '=','organization.organizerid')->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = Organization::select('organizationname','organizername','organization.created_at')->join('organizer','organizer.organizerid', '=','organization.organizerid')->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Organization::select('organizationname','organizername','organization.created_at')->join('organizer','organizer.organizerid', '=','organization.organizerid')->count();
        }else{
            $search = $request->input('search.value');
            $posts = Organization::select('organizationname','organizername','organization.created_at')->join('organizer','organizer.organizerid', '=','organization.organizerid')->where('organizationname', 'like', "%{$search}%")
                ->orWhere('organizername','like',"%{$search}%")
                ->orWhere('organization.created_at','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Organization::select('organizationname','organizername','organization.created_at')->join('organizer','organizer.organizerid', '=','organization.organizerid')->where('organizationname', 'like', "%{$search}%")
                ->orWhere('organizername','like',"%{$search}%")
                ->count();
        }


        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['organizationname'] = $r->organizationname;
                $nestedData['organizername'] = $r->organizername;
                $nestedData['created_at'] = date('d-m-Y H:i:s',strtotime($r->created_at));
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"			=> intval($request->input('draw')),
            "recordsTotal"	=> intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"			=> $data
        );

        echo json_encode($json_data);
    }

    public function getCampaigns(Request $request){
        //print_r($request->all());
        $columns = array(
            0 => 'campaignname',
            1 => 'organizationname',
            2 => 'created_at',
        );

        $totalData = Campaigns::select('campaignname','organizationname','campaign.created_at')->join('organization','organization.organizationid', '=','campaign.organizationid')->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = Campaigns::select('campaignname','organizationname','campaign.created_at')->join('organization','organization.organizationid', '=','campaign.organizationid')->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Campaigns::select('campaignname','organizationname','campaign.created_at')->join('organization','organization.organizationid', '=','campaign.organizationid')->count();
        }else{
            $search = $request->input('search.value');
            $posts = Campaigns::select('campaignname','organizationname','campaign.created_at')->join('organization','organization.organizationid', '=','campaign.organizationid')->where('organizationname', 'like', "%{$search}%")
                ->orWhere('organizername','like',"%{$search}%")
                ->orWhere('organization.created_at','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Campaigns::select('campaignname','organizationname','campaign.created_at')->join('organization','organization.organizationid', '=','campaign.organizationid')->where('organizationname', 'like', "%{$search}%")
                ->orWhere('organizername','like',"%{$search}%")
                ->count();
        }


        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['campaignname'] = $r->campaignname;
                $nestedData['organizationname'] = $r->organizationname;
                $nestedData['created_at'] = date('d-m-Y H:i:s',strtotime($r->created_at));
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"			=> intval($request->input('draw')),
            "recordsTotal"	=> intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"			=> $data
        );

        echo json_encode($json_data);
    }
}
