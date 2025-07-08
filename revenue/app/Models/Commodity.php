<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = ['code', 'name', 'is_service', 'class_id', 'added_by'];

    public function goodsClass()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
