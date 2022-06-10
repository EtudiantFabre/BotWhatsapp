<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'tel'];
    protected $primaryKey = 'num_personne';

    public function agriculteurs(){
        return $this->hasOne(Agriculteur::class, 'num_personne');
    }

    public function admins(){
        return $this->hasOne(Admin::class, 'num_personne');
    }

    public function agronommes(){
        return $this->hasOne(Agronomme::class, 'num_personne');
    }
}
