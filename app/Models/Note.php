<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'titre', 'description', 'id_categorie'     
    ];
    public function categorie (){
        return $this->belongsTo(Categorie::class,"id_categorie");
    }
}
