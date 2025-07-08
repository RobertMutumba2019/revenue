<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $table = 'dictionaries';
    protected $primaryKey = 'd_id';
    protected $fillable = ['d_name', 'd_description', 'd_code', 'd_category', 'd_added_by', 'd_date_added'];

    public function category()
    {
        return $this->belongsTo(DictionaryCategory::class, 'd_category');
    }
}