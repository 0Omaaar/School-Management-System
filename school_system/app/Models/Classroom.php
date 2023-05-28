<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'Classrooms';
    protected $fillable = ['Name_Class', 'Grade_id'];

    public function Grade(){
        return $this->belongsTo(Grade::class);
    }
}
