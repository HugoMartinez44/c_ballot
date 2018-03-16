<?php
        //dd($nbtotal=\App\Vote::select ('campaignid',$data[6])->count());
?>
@extends('layouts.app')

@section('content')
<h2>Votre Campagne : {{$data[5]}}</h2>
<h2>Nombre de participants : {{$data[0]}}</h2>
<h2>Nombre de participants qui ont votés : {{$data[4]}}</h2>
<h2>Nombre de participants qui n ont pas votés : {{$data[3]}}</h2>
<h2>Nombre de votes 'oui' : {{$data[1]}}</h2>
<h2>Nombre de votes 'non' : {{$data[2]}}</h2>
@endsection