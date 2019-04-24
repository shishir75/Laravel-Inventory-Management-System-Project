<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates = [
        'date'
    ];

    protected $fillable = [
      'attendance',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
