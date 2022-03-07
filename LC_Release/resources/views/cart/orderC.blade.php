@extends('layouts.default')

@section('main')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/order.css')}}"/>
</head>
<div class="completeBox">
    <h1 class="complete">COMMANDE COMPLETE</h1>
    <a class="returnH" href="{{ url('/catalogue') }}"><i class="fas fa-newspaper"></i>Catalogue</a>
</div>
@endsection