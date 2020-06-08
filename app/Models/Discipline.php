<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    //

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
