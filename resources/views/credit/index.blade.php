@extends('layouts.app')

@section('content')
    <h1 class="display-2 mx-4">Créditos otorgados</h1>
    <hr>
    {{$credits->total()}}
@endsection