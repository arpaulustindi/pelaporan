<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;


class LaporanController extends Controller{

    public function showAllLaporan(){
        return response()->json(["laporans"=> Laporan::all()]);
    }

    public function showOneLaporan($id){
        return response()->json(Laporan::fid($id));
    }

    public function create(Request $request){
        $input = $request->all();
        if($request->hasFile('gambar')){
            $nama = "xxxx";
            $request->file('gambar')->move(storage_path('gambar'), $nama);
        }
        $laporan = Laporan::create($request->all());

        return response()->json($laporan, 201);
    }

    public function update($id, Request $request){
        $laporan = Laporan::findOrFail($id);
        $laporan->update($request->all());

        return response()->json($laporan, 200);
    }

    public function delete($id){
        Laporan::findOrFail($id)->delete();
        return response('Berhasil Dihapus', 200);
    }
}
