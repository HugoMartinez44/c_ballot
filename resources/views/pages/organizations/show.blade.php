@extends('layouts.app')

@section('content')
    <a href="/organizations" class="btn btn-primary">Go Back</a>
    <h1>{{$organization->name}}</h1>
    <hr>
    <a href="/organizations/{{$organization->organizationid}}/edit" class="btn btn-primary">Edit</a>

    {!! Form::open(['action' => ['OrganizationsController@destroy', $organization->organizationid], 'method' => 'POST', 'class' => 'float-right']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}
@endsection