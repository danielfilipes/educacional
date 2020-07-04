<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'disciplines';
    protected $fillable= [
        'name',
        'code',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
