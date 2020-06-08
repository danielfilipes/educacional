<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    public function disciplines()
    {
        return $this->hasMany(Discipline::class);
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
}
