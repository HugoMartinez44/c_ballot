@extends('layouts.app')

@section('content')
    <h1>Edit organization</h1>
    {!! Form::open(['action' => ['OrganizationsController@update', $organization->organizationid], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>

    {{Form::hidden('_method', 'PUT')}}
    <!--We can't really do a post request by updating a campaign, so we do a put,
     but hidden by post. see the request type with route:list  -->
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection