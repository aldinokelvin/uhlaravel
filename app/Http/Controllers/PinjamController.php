<?php

namespace App\Http\Controllers;
use App\Pinjam;
use Illuminate\Http\Request;
use Auth;

class PinjamController extends Controller
{
    //

    public function index(){
        $data = Pinjam::all();
        return response($data);
    }

    public function show($id){
        $data = Pinjam::where('id',$id)->get();
        return response($data);
    }

    public function store (Request $request){
        try {
            $data = new Pinjam();
            $data->id_mobil = $request->input('id_mobil');
            $data->nama_peminjam = $request->input('nama_peminjam');
            $data->total = $request->input('total');
            $data->save();

            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah peminjaman berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Tambah peminjaman gagal!'
            ]); 
        }
    }

    public function update(Request $request, $id){
        try {
            $data = Mobil::where('id',$id)->first();
            $data->id_mobil = $request->input('id_mobil');
            $data->nama_peminjam = $request->input('nama_peminjam');
            $data->total = $request->input('total');
            $data->save();

            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah peminjaman berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Ubah peminjaman gagal!'
            ]); 
        }
    }

    public function destroy($id){
        try {
            $data = Pinjam::where('id',$id)->first();
            $data->delete();

            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus peminjaman berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Hapus peminjaman gagal!'
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
