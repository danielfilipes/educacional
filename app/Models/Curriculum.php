<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums';
    protected $fillable= [
        'name',
        'active',
        'registered_at',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function disciplines()
    {
        return $this->hasMany(CurriculumDiscipline::class);
    }
}
