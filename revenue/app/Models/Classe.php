<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //


    protected $table = 'classes';

    protected $fillable = ['code', 'name', 'family_id'];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }
}

