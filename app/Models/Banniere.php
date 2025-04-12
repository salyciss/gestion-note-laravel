<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banniere extends Model
{
    // Champs autorisés en remplissage automatique
    protected $fillable = [
        'titre', 'image', 'id_note'
    ];

    // Une bannière appartient à une note
    public function note()
    {
        return $this->belongsTo(Note::class, 'id_note');
    }
}
