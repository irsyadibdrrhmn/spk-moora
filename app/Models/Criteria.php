<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'criteria';

    // Field yang boleh diisi secara mass-assignment
    protected $fillable = [
        'code',
        'name',
        'weight',
        'type',
    ];

    // Relasi ke tabel evaluations
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
