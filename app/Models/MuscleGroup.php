<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
    use HasFactory;

    public function exercises() // Deze functie definieert een relatie tussen MuscleGroup en Exercise modellen.
    {
        return $this->belongsToMany(Exercise::class);// Dit geeft aan dat een MuscleGroup een many-to-many relatie heeft met Exercise.
    }
// Dit beschermt tegen mass assignment door aan te geven welke velden massaal toegewezen mogen worden
    protected $fillable = [
        // Het 'name' veld mag massaal toegewezen worden
        'name',
    ];
}
