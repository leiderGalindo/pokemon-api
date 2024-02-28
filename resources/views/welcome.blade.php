@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container row m-0 mt-5" >
        {{-- pokemons --}}
        <div class="col-lg-12 ContainerListPokemons">
            @foreach ($Pokemons as $Pokemon)
                @include('components.preview-list', ['Pokemon' => $Pokemon])
            @endforeach
        </div>
    </div>
@endsection