@extends('layouts.main')

@section('content')

<div class="container">
    <h1>Fumetti</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Serie</th>
            <th scope="col">Prezzo</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($comicList as $comic)

            <tr>
            <th scope="row">{{ $comic->id }}</th>
                <td>{{ $comic->title }}</td>
                <td>{{ $comic->series }}</td>
                <td>{{ $comic->price }}</td>
                <td>
                    <a href="{{ route('comics.show', $comic) }}" type="button" class="btn btn-primary">Mostra</a> 
                </td>
                <td>
                   <form action="{{ route('comics.destroy', $comic) }}"
                   onsubmit="return confirm('sei sicuro di voler eliminare {{$comic->title}} ?')"
                   method="POST">
                   @csrf
                   @method('DELETE')

                    <button type="submit" class="btn btn-danger"> Cancella </button>
                  
                  </form>
                </td>
            </tr>

            @endforeach
         
        </tbody>
      </table>
      {{$comicList->links()}}
</div>
    
@endsection