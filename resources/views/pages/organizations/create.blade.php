@extends('layouts.app')

@section('content')
    <h1>Create organization</h1>
    {!! Form::open(['action' => 'OrganizationsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    <!--This is going to the store function of CampainsController -->

    {!! Form::close() !!}
@endsection