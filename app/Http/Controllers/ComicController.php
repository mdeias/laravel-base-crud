<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comicList = Comic::orderBy('id', 'desc')->paginate(4);
        return view('comics.home', compact('comicList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title'=>'required|max:50|min:2',
                'description'=>'required|min:10',
                'thumb'=>'required|max:250',
                'price'=>'required|numeric|min:1|max:99',
                'series'=>'required|max:60|min:2',
                'type'=>'required|max:20|min:2',
            ],
            [
                'title.required'=>'Il titolo è un campo obbligatorio',
                'title.max'=>'Titolo troppo lungo',
                'title.min'=>'Titolo troppo corto',

                'description.required'=>'La descrizione è un campo obbligatorio',
                'description.max'=>'Descrizione troppo lunga',
                'description.min'=>'Descrizione troppo corta',

                'thumb.max'=>'Url troppo lungo',

                'price.required'=>'Il prezzo è un campo obbligatorio',
                'price.max'=>'Il prezzo è troppo alto',
                'price.min'=>'Il prezzo è troppo basso',

                'series.required'=>'La serie è obbligatoria',
                'series.max'=>'Serie troppo lunga',
                'series.min'=>'Serie troppo lungo',

                
                'type.max'=>'Tipo troppo lungo',
                'type.min'=>'Tipo troppo lungo',

            ]

        );

        $data = $request->all();

        $new_comic = new Comic();

        $new_comic->fill($data);

        $new_comic->slug = Str::of($new_comic->title)->slug('-');

        $new_comic->save();


        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        
        
        $comic->update($data);

        // dd($fumetto);

        // $comics = $comic;

       //return redirect()->route('fumetti.show', ['fumetti' => $fumetto->id]);
       return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        
        $comic->delete();
        return redirect()->route('comics.index')->with('deleted', "$comic->title è stato eliminato correttamente." );
    }

    
}
