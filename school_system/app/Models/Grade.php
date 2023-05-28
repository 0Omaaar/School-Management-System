<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'Grades';
    protected $fillable = ['Name', 'Notes'];

    public function Classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}