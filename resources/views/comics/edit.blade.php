@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <h2 class="mb-4 text-center">Modificare il fumetto: {{ $comic->title }}</h2>
    <form action="{{ route('comics.update',['comic' => $comic->id] ) }}" method="POST" class="bg-light p-5 rounded shadow-sm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del fumetto" name="title" value="{{old('title', $comic->title)}}">
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="url" class="form-control" id="thumb" placeholder="Inserisci l'immagine del comic" name="thumb" value="{{old('title', $comic->thumb)}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci il prezzo" name="price" value="{{old('title', $comic->price)}}">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di Vendita</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{old('title', $comic->sale_date)}}">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" id="series" placeholder="Inserisci il titolo del fumetto" name="series" value="{{old('title', $comic->series)}}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" placeholder="Inserisci il titolo del fumetto" name="type" value="{{old('title', $comic->type)}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="4" placeholder="Scrivi una breve descrizione del fumetto" name="description">{{ $comic->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Modifica Fumetto</button>
    </form>
</div>
@endsection
