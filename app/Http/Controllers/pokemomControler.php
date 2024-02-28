<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pokemomControler extends Controller
{
    protected $BaseUrlApi = 'https://pokeapi.co/api/v2';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataView = [];

        $pokemons = $this->GetDataPokemons(FALSE, TRUE);
        $DataView['Pokemons'] = $pokemons;

        return view('welcome', $DataView);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Name = FALSE)
    {
        if(!$Name) redirect('/');

        $DataView = [];

        $URL = $this->BaseUrlApi."/pokemon/{$Name}";
        $pokemon = $this->GetDataPokemons($URL);
        $img = $pokemon['sprites']['other']['home']['front_default'] ?? $pokemon['sprites']['front_default'] ?? '';

        $Pokemon = [
            'id' => $pokemon['id'],
            'name' => $pokemon['name'],
            'img' => $img,
        ];
        $DataView['Pokemon'] = $Pokemon;

        return view('detail-pokemon', $DataView);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $Name = $request->search ?? '';

        $DataView = [];

        $URL = $this->BaseUrlApi . "/pokemon/{$Name}";
        $pokemon = $this->GetDataPokemons($URL);

        if(!$pokemon) return redirect('/');
        
        $img = $pokemon['sprites']['other']['home']['front_default'] ?? $pokemon['sprites']['front_default'] ?? '';
        $Pokemon = [
            'id' => $pokemon['id'],
            'name' => $pokemon['name'],
            'img' => $img,
        ];
        $DataView['Pokemons'] = [$Pokemon];

        return view('welcome', $DataView);
    }

    public function GetDataPokemons($URL = FALSE, $Detail = FALSE) 
    {
        if($URL){
            $UrlEndPoint = $URL;
        }else{
            $UrlEndPoint = $this->BaseUrlApi. '/pokemon?offset=0&limit=20';
        }
        
        $ResponseApi = Http::get($UrlEndPoint);
        $ResponseApi = $ResponseApi->json();
        $DataResponse = ($ResponseApi['results'] ?? $ResponseApi ?? []);

        if($Detail){
            foreach ($DataResponse as &$Pokemon) {
                $URL = $Pokemon['url'] ?? false;
                if($URL){
                    $Result = $this->GetDataPokemons($URL);
                    $Pokemon = $Result ?? $Pokemon;
                }

                $img = $Pokemon['sprites']['other']['home']['front_default'] ?? $Pokemon['sprites']['front_default'];
                $Pokemon = [
                    'id' => $Pokemon['id'],
                    'name' => $Pokemon['name'],
                    'img' => $img,
                ];
            }
        }
        
        return $DataResponse;
    }
}
