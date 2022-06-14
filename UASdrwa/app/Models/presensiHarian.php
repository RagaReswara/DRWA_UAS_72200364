<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensiHarian extends Model
{
    use HasFactory;
    protected $table = 'presensi_harian';
    
    protected $fillable = [
        'tahun_akademik', 'semester', 'tanggal', 'hari', 'id_guru', 'jam_masuk', 'jam_pulang', 'metode','keterangan'
    ];
}
