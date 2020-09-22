<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisciplineClass extends Model
{
    protected $table = 'discipline_classes';
    protected $fillable= [
        'discipline_id',
        'user_id',
        'semester_id',
        'vacancies',
        'closed'
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
