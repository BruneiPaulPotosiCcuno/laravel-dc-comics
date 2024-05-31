@extends('layouts.app')

@section('content')
   <div class="container mt-5">
       <div class="card h-100 shadow-lg border-0 bg-white rounded overflow-hidden">
           <img src="{{ $comic->thumb }}" class="card-img-top rounded-top mx-auto d-block" style="max-width: 400px;" alt="{{ $comic->title }}">
           <div class="card-body d-flex flex-column p-4">
               <h5 class="card-title text-center font-weight-bold text-primary">{{ $comic->title }}</h5>
               <p class="card-text text-justify text-muted mb-4">{{$comic->description}}</p>
               <div class="mt-auto">
                   <p class="card-text mb-1"><strong class="text-secondary">Series:</strong> {{ $comic->series }}</p>
                   <p class="card-text mb-1"><strong class="text-secondary">Sale Date:</strong> {{ $comic->sale_date }}</p>
                   <p class="card-text mb-1"><strong class="text-secondary">Type:</strong> {{ $comic->type }}</p>
               </div>
               <div class="text-center mt-4">
                   <a href="{{ route('comics.index') }}" class="btn btn-outline-primary">Back to Comics List</a>
               </div>
           </div>
       </div>
   </div>
@endsection
