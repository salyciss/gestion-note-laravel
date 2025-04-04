<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes=Note::all();
        return view("note.index",compact("notes"));           
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view("note.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note = new Note;
        $note->titre = $request->titre;
        $note->description = $request->description;
        $note->id_categorie = $request->id_categorie;
        $note->save();
        return redirect()->route("notes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $note = Note::find($id);
        return view('note.show', compact( 'note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $note = Note::find($id);
        $categories = Categorie::all();
        return view('note.edit', compact('categories', 'note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $note = Note::find($id);
        $note->titre = $request->titre;
        $note->description = $request->description;
        $note->id_categorie = $request->id_categorie;
        $note->update();
        return redirect()->route("notes.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->route("notes.index");
    }
}
