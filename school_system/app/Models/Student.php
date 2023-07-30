<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use  SoftDeletes;

    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function Nationality()
    {
        return $this->belongsTo(Nationalitiev2::class, 'nationalitie_id');
    }
    public function myparent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }
    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');

    }
    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }

}