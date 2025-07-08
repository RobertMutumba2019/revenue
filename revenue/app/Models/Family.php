<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = ['code', 'name', 'segment_id'];

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}

