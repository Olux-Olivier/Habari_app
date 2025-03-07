<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'predication_id',
        'type_reaction',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function predication() {
        return $this->belongsTo(Predication::class);
    }
}
