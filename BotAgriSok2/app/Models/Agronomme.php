<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agronomme extends Personne
{
    use HasFactory;

    protected $fillable=['nom', 'prenom', 'tel', 'niveau_etude', 'num_personne'];
    protected $primaryKey = 'num_agronomme';

    public function personne(){
        return $this->belongsTo(Personne::class, 'num_personne');
    }

    public function propositions(){
        return $this->hasMany(Proposition::class, 'num_agronomme');
    }
}
