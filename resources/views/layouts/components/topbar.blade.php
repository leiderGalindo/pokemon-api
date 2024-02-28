<div class="container-fluid row m-0">
    <div class="col-lg-3 col-xs-6 p-0">
        <a href="/">
            <img src="/img/logo.png" class="logo" alt="pokemon">
        </a>
    </div>

    <div class="col-lg-9 col-xs-6 p-0 d-flex align-items-center">
        {!! 
            Form::open(
                [
                    'url' => '/pokemons/search',
                    'method' => 'POST',
                    'id' => 'search-form',
                    'class'=>'m-0 w-100 h-100'
                ]
            ) 
        !!}
            {{Form::token()}}
            <div class="col-lg-9 col-xs-12 p-0 h-100 d-flex align-items-center">
                {{Form::text('search', '', ['class' => 'InputSearch', 'placeholder'=> 'Buscar'])}}
                <i class="fa-solid fa-magnifying-glass iconSearch" onclick="searchForPokemon('search-form')"></i>
            </div>
        {!! Form::close() !!}
    </div>
</div>