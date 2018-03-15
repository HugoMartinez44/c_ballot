<?php
//dd(App\Organization::join('organizer','organizer.organizerid', '=','organization.organizerid')->get());
?>
        <!doctype html>
@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 align="center">Laravel 5.5 Datatable Serverside Processing</h2>

            <table id="example" class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>OrganizationName</th>
                    <th>Organizerid</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>OrganizationName</th>
                    <th>Organizerid</th>
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
            "url":"<?= route('dataProcessing') ?>",
            "dataType":"json",
            "type":"POST",
            "data":{"_token":"<?= csrf_token() ?>"}
        },
        "columns":[
            {"data":"organizationname"},
            {"data":"organizerid"},
            {"data":"created_at"}
        ]
    } );
</script>
@endsection
