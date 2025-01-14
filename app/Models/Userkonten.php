<?php

namespace App\Models;

use App\Models\Konten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Userkonten extends Model
{
    use HasFactory;

    protected $table = 'userkonten';

    protected $fillable = [
        'tugaskonten_id',
        'tourguide_id',
        'foto',
        'video'
    ];

    public function kontentugas() {
        return $this->belongsTo(Konten::class, 'tugaskonten_id');
    }
}
