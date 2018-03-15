<?php
    //dd(App\Campaigns::select('campaignname','organizationname','campaign.created_at')->join('organization','organization.organizationid', '=','campaign.organizationid')->get());
?>

@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 align="center">Toutes les Campagnes</h2>

            <table id="example" class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>CampagneName</th>
                    <th>OrganizationName</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>CampagneName</th>
                    <th>OrganizationName</th>
                    <th>Created at</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"<?= route('dataProcessingCamp') ?>",
                "dataType":"json",
                "type":"POST",
                "data":{"_token":"<?= csrf_token() ?>"}
            },
            "columns":[
                {"data":"campaignname"},
                {"data":"organizationname"},
                {"data":"created_at"}
            ]
        } );
    </script>
@endsection
