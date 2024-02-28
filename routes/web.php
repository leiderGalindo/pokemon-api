<?php

use App\Http\Controllers\pokemomControler;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [pokemomControler::class, 'index']);
Route::get('/pokemons', [pokemomControler::class, 'index']);

Route::post('/pokemons/search', [pokemomControler::class, 'search']);
Route::get('/pokemons/detail/{name}', [pokemomControler::class, 'show']);