<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionaryCategory extends Model
{
    use HasFactory;

    protected $table = 'dictionary_categories';
    protected $fillable = ['dc_name', 'dc_added_by', 'dc_date_added'];

    public function dictionaries()
    {
        return $this->hasMany(Dictionary::class, 'd_category');
    }
}