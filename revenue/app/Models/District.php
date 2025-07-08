<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_name',
        'district_code',
        'district_date_added',
        'district_added_by',
    ];

    public function addedBy()
    {
        return $this->belongsTo(SysUser::class, 'district_added_by');
    }
}
