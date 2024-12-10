<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    protected $fillable = [
        'student_id',
        'type',
        'name',
        'email',
        'phone',
        'birth_year',
        'special_needs',
        'job',
        'education',
        'monthly_income',
    ];
}
