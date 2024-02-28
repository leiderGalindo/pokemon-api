@extends('layouts.app')

@section('title', 'Detalle '. $Pokemon['name'])

@section('content')
    <div class="container row m-0" >
        {{-- pokemons --}}
        <div class="col-sm-12 text-center">
            <h1>{{$Pokemon['name']}}</h1>
        </div>
        <div class="col-lg-12 p-0 pb-5 d-flex justify-content-center">
            <img src="{{$Pokemon['img']}}" alt="{{$Pokemon['name']}}">
        </div>
    </div>
@endsection