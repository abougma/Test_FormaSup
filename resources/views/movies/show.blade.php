@extends('welcome')

@section('content')
    <div class="container">
        <h1>DETAIL DU FILM</h1>
        <form action="{{ route('movies.show', ['id' => $movie['id']]) }}" method="get">
        @csrf
            <label for="language">Choisir la langue :</label>
            <select name="language" id="language">
                <option value="en" {{ request('language') == 'en' ? 'selected' : '' }}>Anglais</option>
                <option value="fr" {{ request('language') == 'fr' ? 'selected' : '' }}>Français</option>
            </select>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
        <div class="movie-details">
            <h2>Titre : {{ $movie['title'] }}</h2>
            <p>Description : {{ $movie['overview'] }}</p>
            <p>Date de sortie : {{ $movie['release_date'] }}</p>
            <p>Note : {{ $movie['vote_average'] }}</p>
            <img class="movie-poster" src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
        </div>
    </div>
@endsection

