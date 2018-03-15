@extends('layouts.app')

@section('content')
    <h1>Campains</h1>
    @if(count($campaigns) > 0)
        @foreach($campaigns as $campaign)
            <div class="well">
                <h3><a href="/campaigns/{{$campaign->campaignid}}">{{$campaign->campaignname}}</a></h3>
            </div>
        @endforeach
    @else
        <p>No campaigns found</p>
    @endif
@endsection