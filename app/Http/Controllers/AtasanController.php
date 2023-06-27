<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;
use Illuminate\Http\Request;

class AtasanController extends Controller
{
    public function index() {
        $data['title'] = 'Daftar Surat Izin';
        $data['suratIzin'] = SuratIzin::orderBy('created_at', 'desc')->get();
        $data['countSuratIzin'] = SuratIzin::where('status', 0)->count();
        $data['countSuratIzinHRD'] = SuratIzin::where('status_hrd', 0)->count();
        $data['countSuratIzinAll'] = SuratIzin::count();

        return view('atasan.index', $data);
    }

    public function approved($id) {
        SuratIzin::where('id', $id)->update([
            'status' => 1
        ]);

        toast('Berhasil disimpan.','success');
        return redirect('daftar-surat-izin');
    }

    public function reject($id) {
        SuratIzin::where('id', $id)->update([
            'status' => 2
        ]);

        toast('Berhasil disimpan.','success');
        return redirect('daftar-surat-izin');
    }

    public function pending($id) {
        SuratIzin::where('id', $id)->update([
            'status' => 0
        ]);

        toast('Berhasil disimpan.','success');
        return redirect('daftar-surat-izin');
    }

    public function ubah($id) {
        $data['title'] = 'Ubah Data';
        $data['suratIzinUser'] = SuratIzin::where('id', $id)->get();
        $data['countSuratIzin'] = SuratIzin::where('status', 0)->count();

        // dd($data['suratIzinUser']);


        return view('atasan.ubah', $data);
    }
}
