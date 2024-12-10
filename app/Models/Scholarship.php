<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'student_id',
        'type',
        'organizer',
        'start_year',
        'end_year',
    ];
}
