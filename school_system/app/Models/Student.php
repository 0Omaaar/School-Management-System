<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
}