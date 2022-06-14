<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JadwalGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalGuruController extends Controller
{
    public function list()
    {
        $jg = JadwalGuru::all();
        return response() -> json([
            'success' => true,
            'message' => 'Successfully Displayed',
            'data'    => $jg
        ],200);
    }

    public function addJadwalGuru(Request $req)
    {
        $jg = DB::table('jadwal_guru')->insert([
            'tahun_akademik' => $req->tahun_akademik,
            'semester' => $req->semester,
            'id_guru' => $req->id_guru,
            'hari' => $req->hari,
            'id_kelas' => $req->id_kelas,
            'id_mapel' => $req->id_mapel,
            'jam_mulai' => $req->jam_mulai,
            'jam_selesai' => $req->jam_selesai
        ]);

        if($jg)
        {
            return response()->json([
                'success' => true,
                'message' => 'Save Success',
            ],200);
        }
        else
        {
            return response() -> json([
                'success' => false,
                'message' => 'Save Failed',
            ],401);
        }
    }

    public function update($id,Request $req)
    {
        $jg = JadwalGuru::whereId($id)->update([
            'tahun_akademik' => $req->tahun_akademik,
            'semester' => $req->semester,
            'id_guru' => $req->id_guru,
            'hari' => $req->hari,
            'id_kelas' => $req->id_kelas,
            'id_mapel' => $req->id_mapel,
            'jam_mulai' => $req->jam_mulai,
            'jam_selesai' => $req->jam_selesai
        ]);

        if($jg)
        {
            return response()->json([
                'success' => true,
                'message' => 'Save Success',
            ],200);
        }
        else
        {
            return response() -> json([
                'success' => false,
                'message' => 'Save Failed',
            ],401);
        }
    }

    public function delete($id)
    {
        $jg = JadwalGuru::find($id);
        $jg -> delete();

        if($jg)
        {
            return response() -> json([
                'success' => true,
                'message' => 'Delete Success',
            ],200);
        }
        else
        {
            return response() -> json([
                'success' => false,
                'message' => 'Delete Failed',
            ],401); 
        }
    }

}
