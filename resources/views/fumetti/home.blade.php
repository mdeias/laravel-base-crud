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

            @foreach ($listaFumetti as $fumetto)

            <tr>
            <th scope="row">{{ $fumetto->id }}</th>
                <td>{{ $fumetto->title }}</td>
                <td>{{ $fumetto->series }}</td>
                <td>{{ $fumetto->price }}</td>
                <td>
                    <a href="{{ route('fumetti.show', $fumetto) }}" type="button" class="btn btn-primary">Mostra</a> 
                </td>
            </tr>

            @endforeach
         
        </tbody>
      </table>
      {{$listaFumetti->links()}}
</div>
    
@endsection