<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // if using auth features

class SysUser extends Model
{
    protected $table = 'sys_users';

    protected $fillable = [
        'surname', 'othername', 'telephone', 'email', 'gender_id',
        'department_id', 'username', 'designation_id', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function gender()
{
    return $this->belongsTo(Gender::class, 'user_gender');
}

public function department()
{
    return $this->belongsTo(Department::class, 'user_department_id');
}

public function designation()
{
    return $this->belongsTo(Designation::class, 'user_designation_id');
}

}
