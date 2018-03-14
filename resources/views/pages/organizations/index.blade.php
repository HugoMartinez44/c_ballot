@extends('layouts.app')

@section('content')
    <h1>Organizations</h1>
    @if(count($organizations) > 0)
        @foreach($organizations as $organization)
            <div class="well">
                <h3><a href="/organizations/{{$organization->organizationid}}">{{$organization->name}}</a></h3>
            </div>
        @endforeach
    @else
        <p>No organizations found</p>
    @endif
@endsection