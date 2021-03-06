<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'periods'
    ];

    public function disciplines()
    {
        return $this->hasMany(Discipline::class);
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function studentRegistrations()
    {
        return $this->hasMany(StudentRegistration::class);
    }
}
