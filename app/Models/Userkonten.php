<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userkonten extends Model
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
