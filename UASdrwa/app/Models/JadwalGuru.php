<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalGuru extends Model
{
    use HasFactory;
    protected $table = 'jadwal_guru';
    
    protected $fillable = [
        'tahun_akademik', 'semester', 'id_guru', 'hari', 'id_kelas', 'id_mapel', 'jam_mulai', 'jam_selesai'
    ];
}
