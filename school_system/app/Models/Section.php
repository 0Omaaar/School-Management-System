<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $fillable = ['name_section', 'status', 'grade_id', 'classroom_id'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

}
