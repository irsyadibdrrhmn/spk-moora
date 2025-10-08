<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['student_id','criteria_id','score'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
