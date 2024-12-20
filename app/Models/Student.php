<?php

namespace App\Models;

use App\Models\Log;
use App\Models\User;
use App\Models\Document;
use App\Models\Interview;
use App\Models\DetailStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'phone', 'parent_name', 'parent_email', 'parent_phone', 'school_origin', 'gender', 'status'];

    public function logs()
    {
        return $this->hasMany(Log::class, 'student_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(parent::class);
    }

    public function detailStudent()
    {
        return $this->hasOne(DetailStudent::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class, 'student_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
