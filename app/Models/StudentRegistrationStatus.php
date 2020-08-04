<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegistrationStatus extends Model
{
    protected $table = 'student_registration_statuses';

    protected $fillable = ['name'];

    public function studentRegistrations()
    {
        return $this->hasMany(StudentRegistration::class);
    }
}
