<?php

namespace App\Http\Controllers;

use App\Models\Banniere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BanniereController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'id_note' => 'required|exists:notes,id',
        ]);

        // Stocker l’image
        $data['image'] = $request->file('image')->store('bannieres', 'public');

        Banniere::create($data);

        return redirect()->route('notes.show', $data['id_note'])->with('success', 'Bannière ajoutée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banniere = Banniere::findOrFail($id);
        return view('bannieres.edit', compact('banniere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banniere = Banniere::findOrFail($id);

        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Remplacement de l’image si une nouvelle est envoyée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            Storage::disk('public')->delete($banniere->image);

            // Stocker la nouvelle
            $data['image'] = $request->file('image')->store('bannieres', 'public');
        }

        $banniere->update($data);

        return redirect()->route('notes.show', $banniere->id_note)->with('success', 'Bannière mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banniere = Banniere::findOrFail($id);

        // Supprimer l’image du stockage
        Storage::disk('public')->delete($banniere->image);

        $noteId = $banniere->id_note;

        $banniere->delete();

        return redirect()->route('notes.show', $noteId)->with('success', 'Bannière supprimée.');
    }
}
