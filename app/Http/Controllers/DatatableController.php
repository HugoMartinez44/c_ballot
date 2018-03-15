<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class DatatableController extends Controller
{
    //

    public function getOrganizations(Request $request){
        //print_r($request->all());
        $columns = array(
            0 => 'organizationname',
            1 => 'organizerid',
            2 => 'created_at',
        );

        $totalData = Organization::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = Organization::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Organization::count();
        }else{
            $search = $request->input('search.value');
            $posts = Organization::where('organizationname', 'like', "%{$search}%")
                ->orWhere('organizerid','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Organization::where('organizationname', 'like', "%{$search}%")
                ->orWhere('organizerid','like',"%{$search}%")
                ->count();
        }


        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['organizationname'] = $r->organizationname;
                $nestedData['organizerid'] = $r->organizerid;
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
