@extends('layouts.main')

@section('content')
   <div class="container p-4">
       <div>
           <img src="{{$fumetto->thumb}}" alt="">
       </div>
       <h1>{{ $fumetto->title }}</h1>
       <p>{{$fumetto->description}}</p>
       <p>Data di uscita: {{ $fumetto->sale_date }}</p>
       <p>Prezzo: {{ $fumetto->price }} €</p>


       <a href="{{ route('fumetti.index') }}" type="button" class="btn btn-danger">Indietro</a> 

       <a href="{{ route('fumetti.edit', $fumetto) }}" type="button" class="btn btn-secondary">Modifica</a> 

   </div>
@endsection