<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // Table name (if not the default 'departments')
    protected $table = 'departments';

    // Primary key column (default is 'id', but your legacy uses 'dept_id')
    protected $primaryKey = 'dept_id';

    // Disable timestamps if your table does NOT have Laravel's created_at/updated_at columns
    public $timestamps = false;

    // Mass assignable attributes (allow these columns to be filled)
    protected $fillable = [
        'dept_name',
        'dept_office_id',
        'dept_status',
        'dept_added_by',
        'dept_date_added',
    ];

    // Optionally, you can cast columns to appropriate data types
    protected $casts = [
        'dept_status' => 'boolean',
        'dept_date_added' => 'datetime',
    ];
}
