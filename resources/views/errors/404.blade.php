@extends('layouts.app')

<head>
    <title>{{ config('app.name') }} - 404 Not Found</title>
</head>

@section('content')
    <center>
        <h1 style="margin:0; font-size:150px; line-height:150px; font-weight:bold;">404</h1>
        <h2 style="margin-top:20px;font-size: 30px;">Not Found
        </h2>
        <p>The resource requested could not be found on this server!</p>
    </center>
@endsection
