<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'student_id',
        'type',
        'level',
        'name',
        'year',
        'organizer',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
