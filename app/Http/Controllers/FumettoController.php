<?php

namespace App\Http\Controllers;

use App\Fumetto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FumettoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listaFumetti = Fumetto::paginate(4);
        return view('fumetti.home', compact('listaFumetti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fumetti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_fumetto = new Fumetto();

        $new_fumetto->fill($data);

        $new_fumetto->slug = Str::of($new_fumetto->title)->slug('-');

        $new_fumetto->save();


        return redirect()->route('fumetti.show', $new_fumetto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fumetto = Fumetto::find($id);

        return view('fumetti.show', compact('fumetto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fumetto = Fumetto::find($id);

        return view('fumetti.edit', compact('fumetto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fumetto $fumetto)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        $fumetto->update($data);

       return redirect()->route('fumetti.show', $fumetto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
