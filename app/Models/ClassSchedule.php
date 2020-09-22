<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $table = 'class_schedules';

    protected $fillable= [
        'discipline_class_id',
        'begin_time',
        'end_time'
    ];

    public function disciplineClass()
    {
        return $this->belongsTo(DisciplineClass::class);
    }
}
