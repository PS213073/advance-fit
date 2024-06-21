<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
    ];


    public function frontuser()
    {
        return $this->belongsTo(Frontuser::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
