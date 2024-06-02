<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        $data = [
            'comics' => $comics
        ];

        return view('comics.index', $data);
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


        $formData = $request->all();

        $this->validation($formData);

        $newComic = new Comic();
        $newComic->title = $formData['title'];
        $newComic->thumb = $formData['thumb'];
        $newComic->price = $formData['price'];
        $newComic->series = $formData['series'];
        $newComic->sale_date = $formData['sale_date'];
        $newComic->type = $formData['type'];
        $newComic->description = $formData['description'];
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
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

        $data = [
            'comic' => $comic
        ];

        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];
        return view('comics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $request->validate(
            [
                'title' => 'required|max:100',
                'thumb' => 'required|max:400',
                'price' => 'required|numeric|min:0',
                'series' => 'required|min:5|max:80',
                'sale_date' => 'required|date',
                'type' => 'required|min:1|max:100',
                'description' => 'nullable|min:10',
            ],
            [
                'title.required' => 'Il campo titolo è obbligatorio.',
                'title.max' => 'Il campo titolo non può superare i 100 caratteri.',

                'thumb.required' => 'Il campo per image è obbligatorio.',
                'thumb.max' => 'Il campo anteprima non può superare i 400 caratteri.',

                'price.required' => 'Il campo prezzo è obbligatorio.',
                'price.numeric' => 'Il campo prezzo deve essere un numero.',
                'price.min' => 'Il campo prezzo deve essere almeno 0.',

                'series.required' => 'Il campo serie è obbligatorio.',
                'series.min' => 'Il campo serie deve avere almeno 5 caratteri.',
                'series.max' => 'Il campo serie non può superare gli 80 caratteri.',

                'sale_date.required' => 'Il campo data di vendita è obbligatorio.',
                'sale_date.date' => 'Il campo data di vendita deve essere una data valida.',

                'type.required' => 'Il campo tipo è obbligatorio.',
                'type.min' => 'Il campo tipo deve avere almeno 1 carattere.',
                'type.max' => 'Il campo tipo non può superare i 100 caratteri.',

                'description.min' => 'Il campo descrizione deve avere almeno 10 caratteri.',
            ],
        );


        $formData = $request->all();
        $this->validation($formData);
        $comic = Comic::findOrFail($id);
        $comic->update($formData);
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function validation($data) {
        $validator = Validator::make(
            $data, 
            [
                'title' => 'required|max:100',
                'thumb' => 'required|max:400',
                'price' => 'required|numeric|min:0',
                'series' => 'required|min:5|max:80',
                'sale_date' => 'required|date',
                'type' => 'required|min:1|max:100',
                'description' => 'nullable|min:10',
            ],
            [
                'title.required' => 'Il campo titolo è obbligatorio.',
                'title.max' => 'Il campo titolo non può superare i 100 caratteri.',

                'thumb.required' => 'Il campo per image è obbligatorio.',
                'thumb.max' => 'Il campo anteprima non può superare i 400 caratteri.',

                'price.required' => 'Il campo prezzo è obbligatorio.',
                'price.numeric' => 'Il campo prezzo deve essere un numero.',
                'price.min' => 'Il campo prezzo deve essere almeno 0.',

                'series.required' => 'Il campo serie è obbligatorio.',
                'series.min' => 'Il campo serie deve avere almeno 5 caratteri.',
                'series.max' => 'Il campo serie non può superare gli 80 caratteri.',

                'sale_date.required' => 'Il campo data di vendita è obbligatorio.',
                'sale_date.date' => 'Il campo data di vendita deve essere una data valida.',

                'type.required' => 'Il campo tipo è obbligatorio.',
                'type.min' => 'Il campo tipo deve avere almeno 1 carattere.',
                'type.max' => 'Il campo tipo non può superare i 100 caratteri.',

                'description.min' => 'Il campo descrizione deve avere almeno 10 caratteri.',
            ],
            
        )->validate();
    }
}
