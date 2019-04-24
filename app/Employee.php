<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email','phone','address','experience','photo','advanced_salary','vacation','city'
    ];

    public function advanced_salaries()
    {
        return $this->hasMany(Advanced_Salary::class);
    }


    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
