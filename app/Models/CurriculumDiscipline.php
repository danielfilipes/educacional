<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumDiscipline extends Model
{
    protected $table = 'curriculum_disciplines';
    protected $fillable= [
        'curriculum_id',
        'discipline_id',
        'period',
        'workload'
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
