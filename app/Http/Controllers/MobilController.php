<?php

namespace App\Http\Controllers;
use App\Mobil;
use Illuminate\Http\Request;
use Auth;

class MobilController extends Controller
{
    //

    public function index(){
        $data = Mobil::all();
        return response($data);
    }

    public function show($id){
        $data = Mobil::where('id',$id)->get();
        return response($data);
    }

    public function store (Request $request){
        try {
            $data = new Mobil();
            $data->nama_mobil = $request->input('nama_mobil');
            $data->merk = $request->input('merk');
            $data->bahan_bakar = $request->input('bahan_bakar');
            $data->plat_nomor = $request->input('plat_nomor');
            $data->warna = $request->input('warna');
            $data->jumlah = $request->input('jumlah');
            $data->save();

            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah data mobil berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Tambah data mobil gagal!'
            ]); 
        }
    }

    public function update(Request $request, $id){
        try {
            $data = Mobil::where('id',$id)->first();
            $data->nama_mobil = $request->input('nama_mobil');
            $data->merk = $request->input('merk');
            $data->bahan_bakar = $request->input('bahan_bakar');
            $data->plat_nomor = $request->input('plat_nomor');
            $data->warna = $request->input('warna');
            $data->jumlah = $request->input('jumlah');
            $data->save();

            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah data mobil berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Ubah data mobil gagal!'
            ]); 
        }
    }

    public function destroy($id){
        try {
            $data = Mobil::where('id',$id)->first();
            $data->delete();

            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus data mobil berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Hapus data mobil gagal!'
            ]); 
        }
    }

    /* public function mobil() {
        $data = "Data All Mobil";
        return response()->json($data, 200);
    }

    public function mobilAuth() {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }

    */
}
