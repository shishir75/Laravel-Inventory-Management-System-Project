<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advanced_Salary extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
