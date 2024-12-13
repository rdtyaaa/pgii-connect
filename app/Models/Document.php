<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'student_id',
        'type',
        'path',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
