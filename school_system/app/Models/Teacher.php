<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function specialisation()
    {
        return $this->belongsTo(Specialisation::class);
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teacher_section');
    }
}