@extends('layouts.app')

@section('content')
   <div class="container mt-5">
       <div class="card border-0 rounded-lg overflow-hidden shadow-lg">
           <div class="row g-0">
               <div class="col-md-4">
                   <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->title }}">
               </div>
               <div class="col-md-8">
                   <div class="card-body">
                       <h5 class="card-title text-primary fw-bold">{{ $comic->title }}</h5>
                       <p class="card-text text-muted">{{$comic->description}}</p>
                       <div class="d-flex flex-column">
                           <p class="card-text mb-1"><strong class="text-secondary">Series:</strong> {{ $comic->series }}</p>
                           <p class="card-text mb-1"><strong class="text-secondary">Sale Date:</strong> {{ $comic->sale_date }}</p>
                           <p class="card-text mb-1"><strong class="text-secondary">Type:</strong> {{ $comic->type }}</p>
                       </div>
                       <div class="mt-4">
                           <a href="{{ route('comics.index') }}" class="btn btn-outline-primary">Back to Comics List</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection