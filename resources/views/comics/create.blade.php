@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>inserisci fumetto</h1>

        @if ($errors->any())
      
            <div class="alert alert-danger" role="alert">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li> {{$error}} </li>
                 @endforeach
             </ul>
            </div>
    
        @endif
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            @method('POST')
            
            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>

              @error('title')
              <p>{{$message}}</p>                 
              @enderror

              <input type="text" class="form-control @error('title')
              is-invalid  
              @enderror" id="title" name="title" placeholder="Titolo" >
              
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                @error('description')
                    <p>{{$message}}</p>                 
                @enderror
                <textarea  class="form-control 
                @error('description')
                is-invalid  
                @enderror" id="description" name="description" placeholder="Descrizione" >
                </textarea>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Link della copertina</label>
                @error('thumb')
                     <p>{{$message}}</p>                 
                @enderror
                <input type="text" class="form-control
                @error('thumb')
                is-invalid  
                @enderror"
                id="thumb" name="thumb" placeholder="Link" >
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                @error('price')
                    <p>{{$message}}</p>                 
                @enderror
                <input type="number" class="form-control
                @error('price')
                is-invalid  
                @enderror" 
                id="price" name="price" placeholder="Prezzo" >
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                @error('series')
                    <p>{{$message}}</p>                 
                @enderror
                <input type="text" class="form-control
                @error('series')
                is-invalid  
                @enderror"
               id="series" name="series" placeholder="Serie" >
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di uscita</label>
  
                <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Data" >
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                @error('type')
                    <p>{{$message}}</p>                 
                @enderror
                <input type="text" class="form-control
                @error('type')
                is-invalid  
                @enderror"
               id="type" name="type" placeholder="Tipo" >
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