<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = ['nom_culture', 'rendement', 'densite_semestre', 'frequence_arrosage'];
    protected $primaryKey = 'num_culture';

    protected $casts = ['frequence_arrosage' => 'array'];

    public function propositions(){
        return $this->hasMany(Proposition::class, 'num_culture');
    }

    public function parcelles(){
        return $this->hasMany(Parcelle::class, 'num_culture');
    }
}
