<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function list()
    {
        $guru = Guru::all();
        return response() -> json([
            'success' => true,
            'message' => 'Successfully Displayed',
            'data'    => $guru
        ],200);
    }

    public function addGuru(Request $req)
    {
        $guru = DB::table('guru')->insert([
            'rfid' => $req->rfid,
            'nip' => $req->nip,
            'nama_guru' => $req->nama_guru,
            'alamat' => $req->alamat,
            'status_guru' => $req->status_guru
        ]);

        if($guru)
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
        $guru = Guru::whereId($id)->update([
            'rfid' => $req->rfid,
            'nip' => $req->nip,
            'nama_guru' => $req->nama_guru,
            'alamat' => $req->alamat,
            'status_guru' => $req->status_guru
        ]);

        if($guru)
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
        $guru = Guru::find($id);
        $guru -> delete();

        if($guru)
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
