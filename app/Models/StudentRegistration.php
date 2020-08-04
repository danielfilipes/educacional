<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    protected $table = 'student_registrations';

    protected $fillable= [
        'registration_number',
        'user_id',
        'course_id',
        'student_registration_status_id',
        'registration_date',
        'conclusion_date',
        'note'
    ];

    public function studentRegistrationStatus()
    {
        return $this->belongsTo(StudentRegistrationStatus::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
