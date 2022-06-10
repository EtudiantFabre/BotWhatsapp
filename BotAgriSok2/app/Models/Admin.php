<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Personne
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'tel', 'num_personne'];
    protected $primaryKey = 'num_admin';

    public function personne(){
        return $this->belongsTo(Personne::class, 'num_personne');
    }
}
