<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailStudent extends Model
{
    protected $fillable = [
        'student_id',
        'nickname',
        'birth_place',
        'birth_date',
        'religion',
        'nationality',
        'school_origin',
        'nisn',
        'nis',
        'ijazah_number',
        'skhun_number',
        'exam_number',
        'nik',
        'siblings_count',
        'child_position',
        'language',
        'special_needs',
        'address',
        'transport',
        'living_with',
        'home_phone',
        'kps_number',
        'height',
        'weight',
        'blood_type',
        'distance_to_school',
        'travel_time',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
