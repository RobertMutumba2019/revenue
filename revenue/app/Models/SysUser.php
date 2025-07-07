<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // if using auth features

class SysUser extends Model
{
    protected $table = 'sys_users';

    protected $fillable = [
        'surname', 'othername', 'telephone', 'email', 'gender_id',
        'department_id', 'username', 'designation_id', 'password', 'user_type'
    ];

    protected $hidden = [
        'password',
    ];
public function isAdmin()
{
    return $this->user_type === 'A';
}

public function isViewer()
{
    return $this->user_type === 'V';
}

 
    public function department()
{
    return $this->belongsTo(Department::class, 'department_id');
}

public function designation()
{
    return $this->belongsTo(Designation::class, 'designation_id');
}

public function gender()
{
    return $this->belongsTo(Gender::class, 'gender_id');
}

//checking the status
public function isActive()
{
    return $this->status == 1;
}

public function isOnline()
{
    return $this->last_seen && now()->diffInMinutes($this->last_seen) <= 5;
}


}
