@extends('layouts.app')

@section('content')
    <a href="/campaigns" class="btn btn-primary">Go Back</a>
    <h1>{{$campaign->name}}</h1>
    <p>Will be started at : {{$campaign->startdate}}</p>
    <p>Will be ended at : {{$campaign->enddate}}</p>
    <hr>
    <a href="/campaigns/{{$campaign->campaignid}}/edit" class="btn btn-primary">Edit</a>

    {!! Form::open(['action' => ['CampaignsController@destroy', $campaign->campaignid], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}
@endsection