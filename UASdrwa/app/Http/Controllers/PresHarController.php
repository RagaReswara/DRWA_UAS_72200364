<?php

namespace App\Http\Controllers;

use App\Models\presensiHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresHarController extends Controller
{
    public function list()
    {
        $ph = presensiHarian::all();
        return response() -> json([
            'success' => true,
            'message' => 'Successfully Displayed',
            'data'    => $ph
        ],200);
    }

    public function addPresensi(Request $req)
    {
        $ph = DB::table('presensi_harian')->insert([
            'tahun_akademik' => $req->tahun_akademik,
            'semester' => $req->semester,
            'tanggal' => $req->tanggal,
            'hari' => $req->hari,
            'id_guru' => $req->id_guru,
            'jam_masuk' => $req->jam_masuk,
            'jam_pulang' => $req->jam_pulang,
            'metode'     => $req->metode,
            'keterangan' => $req->keterangan
        ]);

        if($ph)
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
        $ph = presensiHarian::whereId($id)->update([
            'tahun_akademik' => $req->tahun_akademik,
            'semester' => $req->semester,
            'tanggal' => $req->tanggal,
            'hari' => $req->hari,
            'id_guru' => $req->id_guru,
            'jam_masuk' => $req->jam_masuk,
            'jam_pulang' => $req->jam_pulang,
            'metode'     => $req->metode,
            'keterangan' => $req->keterangan
        ]);

        if($ph)
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
        $ph = presensiHarian::find($id);
        $ph -> delete();

        if($ph)
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
