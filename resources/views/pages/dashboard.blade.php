@extends('layouts.app')

@section('content')

    <?php
           //dd($data['your_organizations'][0]);
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
                        @foreach($data['your_organizations'] as $item)
                            <p><a href="/organizations/{{$item->organizationid}}">{{$item->organizationname}}</a></p>
                        @endforeach
                        <a href="/organizations/create" class="btn btn-primary">Create Organization</a>
                    <h2>Your campaigns</h2>
                        @foreach($data['your_campaigns'] as $item)
                    <p><a href="/campaigns/{{$item->campaignid}}">{{$item->campaignname}}</a>
                    
                    <a href="/resultats/{{$item->campaignid}}" class="btn btn-primary">Voir résultats</a>
                    
                    </p>
                            @endforeach
                        <a href="/campaigns/create" class="btn btn-primary">Create Campaign</a>

                    <p class="float-right">Salut ! (nom organisateur) : {{ $data['organizer_name']}}</p>

                            <p class="float-right"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection