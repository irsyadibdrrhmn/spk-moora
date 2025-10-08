<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nis','name','class'];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
