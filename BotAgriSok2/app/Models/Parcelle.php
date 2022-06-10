<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;

    protected $fillable = ['nature', 'surface', 'localisation', 'num_culture', 'num_agriculteur'];
    protected $primaryKey='num_parcelle';

    protected $casts = ['localisation' => 'array'];

    public function culture(){
        return $this->belongsTo(Culture::class, 'num_culture');
    }

    public function agriculteur(){
        return $this->belongsTo(Agriculteur::class, 'num_agriculteur');
    }
}
