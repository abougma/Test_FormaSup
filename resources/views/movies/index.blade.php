@extends('welcome')

@section('content')
    <div class="container">
        <h1 class="mb-4">LISTE DES FILMS</h1>
        <form>
            @csrf
        </form>
        <div class="row">
            @foreach ($movies['results'] as $movie)
                <div class="col-3 mb-4">
                    <div class="movie">
                        <a href="{{ route('movies.show', ['id' => $movie['id']]) }}">
                            <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="img-fluid">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
