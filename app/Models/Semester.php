<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';

    protected $fillable = [
        'name',
        'closed',
        'start_date',
        'end_date'
    ];
}
