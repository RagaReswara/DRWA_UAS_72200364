<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function list()
    {
        $mapel = Mapel::all();
        return response() -> json([
            'success' => true,
            'message' => 'Successfully Displayed',
            'data'    => $mapel
        ],200);
    }

    public function addMapel(Request $req)
    {
        $mapel = DB::table('mapel')->insert([
            'nama_mapel' => $req->nama_mapel,
            'deskripsi' => $req->deskripsi
        ]);

        if($mapel)
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
        $mapel = Mapel::whereId($id)->update([
            'nama_mapel' => $req->nama_mapel,
            'deskripsi' => $req->deskripsi
        ]);

        if($mapel)
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
        $mapel = Mapel::find($id);
        $mapel -> delete();

        if($mapel)
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
