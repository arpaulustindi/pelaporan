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
            $nama = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(storage_path('gambar'), $nama);

            $laporan = new Laporan();
            $laporan->nama = $request->nama;
            $laporan->hp = $request->hp;
            $laporan->detail = $request->detail;
            $laporan->gambar = $nama;
            $laporan->metadata = $request->metadata;
            $laporan->save();
            return response()->json($laporan, 201);
        }
        //$laporan = Laporan::create($request->all());

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
