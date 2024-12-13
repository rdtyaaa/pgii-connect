<?php

namespace App\Models;

use App\Models\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(Parent::class);
    }

    public function detailStudent()
    {
        return $this->hasOne(DetailStudent::class);
    }
}
