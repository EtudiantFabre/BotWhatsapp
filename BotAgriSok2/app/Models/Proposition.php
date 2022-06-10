<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;

    protected $fillable = ['date_proposition', 'num_culture', 'num_agronomme'];
    protected $primaryKey = 'num_proposition';

    public function culture(){
        return $this->belongsTo(Culture::class, 'num_culture');
    }

    public function agronomme(){
        return $this->belongsTo(Agronomme::class, 'num_agronomme');
    }
}
