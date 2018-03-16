@extends('layouts.app')

@section('content')
    <br>
    <a href="/campaigns">Go Back</a>
    <h1>{{$campaign->campaignname}}</h1>
    <p>Will be started at : {{$campaign->startdate}}</p>
    <p>Will be ended at : {{$campaign->enddate}}</p>
    <div class="col-md-12">

    <form action="{{ route('sendmail') }}" method="post">
    <div class="form-group">
        {{Form::label('Email')}}
        {{Form::textarea('email_body', 'email body', ['class' => 'form-control'])}}
    </div> <!-- placeholder : always in second params -->

    <!-- adresses for the campaign -->
    <div class="form-group">
        {{Form::label('Adresses')}}
        {{ Form::text('adresses', $emails, ['class' => 'form-control'])}}
    </div>

    <!-- anonym urls generated -->
    <div class="form-group">
        {{Form::label('Anonym Urls Generated')}}
        {{ Form::text('anonym_url', $anonym_url, ['class' => 'form-control'])}}
    </div>

    <button type="submit" class="btn btn-success">Send emails</button>
    {{ csrf_field() }}
    </form>
    </div>
    <hr>
    <a href="/campaigns/{{$campaign->campaignid}}/edit" class="btn btn-primary">Edit</a>

    {!! Form::open(['action' => ['CampaignsController@destroy', $campaign->campaignid], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}
@endsection
