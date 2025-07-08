<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $fillable = ['code', 'name'];

    public function families()
    {
        return $this->hasMany(Family::class);
    }
}

