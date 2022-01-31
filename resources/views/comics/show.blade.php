@extends('layouts.main')

@section('content')
   <div class="container p-4">
       <div>
           <img src="{{$comic->thumb}}" alt="">
       </div>
       <h1>{{ $comic->title }}</h1>
       <p>{{$comic->description}}</p>
       <p>Data di uscita: {{ $comic->sale_date }}</p>
       <p>Prezzo: {{ $comic->price }} €</p>


       <a href="{{ route('comics.index') }}" type="button" class="btn btn-danger">Indietro</a> 

       <a href="{{ route('comics.edit', $comic) }}" type="button" class="btn btn-secondary">Modifica</a> 

   </div>
@endsection