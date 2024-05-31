@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Modificare il fumetto: {{ $comic->title }}</h2>
    <form action="{{ route('comics.update',['comic' => $comic->id] ) }}" method="POST" class="bg-light p-5 rounded shadow-sm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del fumetto" name="title" value="{{ $comic->title }}" required>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="url" class="form-control" id="thumb" placeholder="Inserisci l'immagine del comic" name="thumb" value="{{ $comic->thumb }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci il prezzo" name="price" value="{{ $comic->price }}" required>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di Vendita</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}" required>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" id="series" placeholder="Inserisci il titolo del fumetto" name="series" value="{{ $comic->series }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" placeholder="Inserisci il titolo del fumetto" name="type" value="{{ $comic->type }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="4" placeholder="Scrivi una breve descrizione del fumetto" name="description" required>{{ $comic->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Modifica Fumetto</button>
    </form>
</div>
@endsection
