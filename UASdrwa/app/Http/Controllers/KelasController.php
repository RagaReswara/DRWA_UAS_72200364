<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function list()
    {
        $kelas = Kelas::all();
        return response() -> json([
            'success' => true,
            'message' => 'Successfully Displayed',
            'data'    => $kelas
        ],200);
    }

    public function addKelas(Request $req)
    {
        $kelas = DB::table('kelas')->insert([
            'kelas' => $req->kelas,
            'jurusan' => $req->jurusan,
            'sub' => $req->sub
        ]);

        if($kelas)
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

    public function update(Request $req)
    {
        $kelas = DB::table('kelas')->where('id_kelas',$req->input('id_kelas'))->update([
            'kelas' => $req->input('kelas'),
            'jurusan' => $req->input('jurusan'),
            'sub' => $req->input('sub')
        ]);

        if($kelas)
        {
            return response()->json([
                'success' => true,
                'message' => 'Update Success',
            ],200);
        }
        else
        {
            return response() -> json([
                'success' => false,
                'message' => 'Update Failed',
            ],401);
        }
    }

    public function delete(Request $req)
    {
        //$kelas = Kelas::find($id);
        DB::table('kelas')->where('id_kelas', $req->input('id_kelas'))->delete();
        
        return response()->json([
            "Result" => [
                "ResultCode" =>0,
                "ResultMessage"=>"Data Deleted"
            ]
        ], 200);
    }
}
