@extends('layouts.app')

@section('content')

    <h1>Create campaign</h1>
    {!! Form::open(['action' => 'CampaignsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('campaignname', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>

    <div class="form-group">
        {{Form::label('date', 'Start-Date')}}
        {{Form::date('startdate', '', ['class' => 'form-control'], \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label('date', 'End-Date')}}
        {{Form::date('enddate', '', ['class' => 'form-control'], \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label('organization', 'Organization')}}
        {!! Form::select('organizationid', $organizations, '', ['class' => 'form-control']) !!}
    </div>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    <!--This is going to the store function of CampainsController -->


    {!! Form::close() !!}
@endsection