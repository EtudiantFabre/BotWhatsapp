<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Personne
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'tel', 'num_personne'];
    protected $primaryKey = 'num_agriculteur';

    public function personne(){
        return $this->belongsTo(Personne::class, 'num_personne');
    }

    public function parcelles(){
        return $this->hasMany(Parcelle::class, 'num_agriculteur');
    }
}
