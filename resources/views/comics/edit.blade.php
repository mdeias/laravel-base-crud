@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Modifica: {{$comic->title}}</h1>

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>

              <input type="text" class="form-control" id="title" name="title" value= {{ $comic->title }} placeholder="Titolo" >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
  
                <textarea  class="form-control" id="description" name="description" placeholder="Descrizione" >
                    {{ $comic->description }} 
                </textarea>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Link della copertina</label>
  
                <input type="text" class="form-control" id="thumb" name="thumb" value= {{ $comic->thumb }} placeholder="Link" >
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
  
                <input type="number" class="form-control" id="price" name="price" value= {{ $comic->price }} placeholder="Prezzo" >
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
  
                <input type="text" class="form-control" id="series" name="series" value= {{ $comic->series }} placeholder="Serie" >
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di uscita</label>
  
                <input type="date" class="form-control" id="sale_date" name="sale_date" value= {{ $comic->sale_date }} placeholder="Data" >
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
  
                <input type="text" class="form-control" id="type" name="type" value= {{ $comic->type }} placeholder="Tipo" >
            </div>

            <button class="btn btn-primary" type="submit"> 
                Invia
            </button>

            <button class="btn btn-danger" type="reset">
                Resetta
            </button>

        </form>
        
    </div>
@endsection