@extends('layouts.app')

@section('content')

    <?php
            //dd($data['your_organizations'][1]['name']);
    ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Your organizations</h2>
                        <?php
                        for($i=0; $i<count($data['your_organizations']); $i++){
                            echo "<h2>".$data['your_organizations'][$i]['name']."</h2>";}
                         ?>
                        <a href="/organizations/create" class="btn btn-primary">Create Organization</a>
                    <h2>Your campaigns</h2>
                        <a href="/campaigns/create" class="btn btn-primary">Create Campaign</a>

                    <p class="float-right">Salut ! (nom organisateur) : {{ $data['organizer_name']}}</p>

                            <p class="float-right"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection