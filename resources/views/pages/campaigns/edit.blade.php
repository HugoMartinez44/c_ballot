@extends('layouts.app')

@section('content')
    <h1>Edit campaign</h1>
    {!! Form::open(['action' => ['CampaignsController@update', $campaign->campaignid], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>

    <div class="form-group">
        {{Form::label('date', 'Start-Date')}}
        {{Form::date('startdate', '', ['class' => 'form-control'], \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label('date', 'End-Date')}}
        {{Form::date('enddate', '', ['class' => 'form-control'], \Carbon\Carbon::now())}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    <!--We can't really do a post request by updating a campaign, so we do a put,
     but hidden by post. see the request type with route:list  -->
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection