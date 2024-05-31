@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">I fumetti da mostrare</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($comics as $comic)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $comic->title }}</h5>
                        <p class="card-text text-justify">{{ Str::limit($comic->description, 100) }}</p>
                        <div class="mt-auto">
                            <p class="card-text"><strong>Series:</strong> {{ $comic->series }}</p>
                            <p class="card-text"><strong>Sale Date:</strong> {{ $comic->sale_date }}</p>
                            <p class="card-text"><strong>Type:</strong> {{ $comic->type }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection