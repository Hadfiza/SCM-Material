<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $table = 'problem';

    protected $fillable = [
        'nomor_order',
        'nama_material',
        'jumlah_order',
        'stok',
        'nama_proyek',
        'jumlah_digunakan',
        'keterangan',
    ];
}
