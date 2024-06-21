<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public function muscleGroups() // Definieert de muscleGroups methode
    {
        // Geeft de relatie aan tussen Exercise en MuscleGroup (veel-op-veel)
        return $this->belongsToMany(MuscleGroup::class);
    }
    
    protected $fillable = [
        'name', // Voeg de name kolom toe aan de fillable array
        'image', // Voeg de image kolom toe aan de fillable array
        'video_tutorial', // Voeg de video_tutorial kolom toe aan de fillable array
              
    ];
}
