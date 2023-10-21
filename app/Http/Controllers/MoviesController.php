<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MoviesController extends Controller
{
    private $TmdbApiKey;

    public function __construct()
    {
    // Recuperation de la cle a partir de la configuration
        $this->TmdbApiKey = config("services.tmdb.apiKey");
    }

    // Fonction permettant de retourner la liste des derniers films
    public function index(Request $request)
    {

        // Recuperation de la requete de recherche
        $query = $request->input('query');

        // Effectuer la recherche en utilisant l'API TMDb
        if ($query) {
            $response = Http::get("https://api.themoviedb.org/3/search/movie", [
                "api_key" => $this->TmdbApiKey,
                "query" => $query,
            ]);
        } else {
            $response = Http::get("https://api.themoviedb.org/3/discover/movie", [
                "api_key" => $this->TmdbApiKey,
                "page" => 1,
            ]);
        }

        $movies = $response->json();
        return view("movies.index", ['movies' => $movies]);
    }


    // Fonction permettant de retourner les details sur un film specifique
    public function show(Request $request, $id)
    {

        $langue = $request->input('language', 'en');
        $response = Http::get("https://api.themoviedb.org/3/movie/{$id}", [
            'api_key' => $this->TmdbApiKey,
            "language" => $langue,
        ]);

        $movie = $response->json();

        return view('movies.show', ['movie' => $movie]);
    }
}
