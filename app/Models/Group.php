<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'jumlah_jamaah',
        'tanggal_keberangkatan',
        'tanggal_kembali',
        'deskripsi',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
