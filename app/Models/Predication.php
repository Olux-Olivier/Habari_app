<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predication extends Model {
    use HasFactory;

    protected $fillable = [
        'predicateur',
        'titre',
        'description',
        'categorie',
        'versets',
        'photo',
        'user_id',
    ];

    // Relation avec l'utilisateur (auteur de la prédication)
    public function user() {
        return $this->belongsTo(User::class);
    }
}

