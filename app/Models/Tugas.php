<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas_ceklis';

    protected $fillable = [
        'nama',
        'tugas_type',
        'tasks',
        'title',
        'kloter_id',
    ];

    protected $casts = [
        'tasks' => 'array',
        'title' => 'array',
    ];


}

