<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kloter extends Model
{
    use HasFactory;

    protected $table = 'kloter';

    protected $fillable = ['nama', 'tanggal', 'tourguide_id'];
}
