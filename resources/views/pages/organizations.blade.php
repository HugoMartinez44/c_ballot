@extends('layouts.app')
@section('content')
    <h1>Organizations</h1>
    @if(count($organizations) > 0)
        <ul class="list-group">
        @foreach($organizations as $organization)
            <li class="list-group-item">{{$organization->name}}</li>
        @endforeach
        </ul>
    @endif
@endsection