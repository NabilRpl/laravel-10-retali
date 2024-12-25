<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTable extends Model
{
    use HasFactory;

    protected $table = 'data_table';

    protected $fillable = [
        'tourguide_id',
        'timestamp',
        'nomor_koper',
        'nama_jamaah',
        'nomor_hp',
        'kloter_id',
    ];
}
