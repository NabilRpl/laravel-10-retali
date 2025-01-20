<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    protected $table = 'jamaah';
    
    protected $fillable = [
        'foto',
        'name',
        'groups_id',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'catatan_kesehatan',
    ];


    public function group()
    {
        return $this->belongsTo(Group::class, 'groups_id');
    }
}
