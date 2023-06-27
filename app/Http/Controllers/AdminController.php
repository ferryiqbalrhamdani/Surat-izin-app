<?php

namespace App\Http\Controllers;

use App\Models\DaftarDivisi;
use App\Models\DaftarPT;
use App\Models\SuratIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function daftarPT() {
        $data['title'] = 'Daftar PT';
        $data['daftarPT'] = DaftarPT::all();

        return view('daftar-pt', $data);
    }

    public function daftarPTAction(Request $request) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Kolom nama pt wajib diisi!'
        ]);

        DaftarPT::create($request->all());

        toast('Berhasil disimpan.','success');
        return redirect('daftar-pt');
    }

    public function daftarDivisi() {
        $data['title'] = 'Daftar Divisi';
        $data['daftarDivisi'] = DaftarDivisi::all();

        return view('daftar-divisi', $data);
    }

    public function daftarDivisiAction(Request $request) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Kolom nama divisi wajib diisi!'
        ]);

        DaftarDivisi::create($request->all());

        toast('Berhasil disimpan.','success');
        return redirect('daftar-divisi');
    }

    public function suratIzin() {
        $data['title'] = 'Surat Izin';
        $data['suratIzin'] = SuratIzin::orderBy('created_at', 'desc')->get();

        return view('surat-izin', $data);
    }

    public function formIzin() {
        $data['title'] = 'Form Izin';
        

        return view('form-izin', $data);
    }

    public function formIzinAction(Request $request) {
        // dd($request->check);
        if($request->check == 'p') {
            $rule = 'required';
        } else {
            $rule = '';
        }
        $request->validate([
            'nama_user' => 'required',
            'nama_pt' => 'required',
            'username_user' => 'required',
            'divisi_user' => 'required',
            'tanggal_izin' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => $rule,
            'keterangan_izin' => 'required',
        ], [
            'tanggal_izin.required' => 'Tanggal izin wajib diisi!',
            'jam_mulai.required' => 'Jam masuk wajib diisi!',
            'jam_akhir.required' => 'Jam keluar wajib diisi!',
            'keterangan_izin.required' => 'Keterangan izin wajib diisi!',
        ]);
        // dd($request->all());
        if($request->check == 'p') {
            $jamKeluar = $request->jam_akhir;
        } else {
            $jamKeluar = null;
        }

        if(Auth::user()->role_id == 2) {
            SuratIzin::create([
                'nama_user' => $request->nama_user,
                'nama_pt' => $request->nama_pt,
                'username_user' => $request->username_user,
                'divisi_user' => $request->divisi_user,
                'tanggal_izin' => $request->tanggal_izin,
                'jam_mulai' => $request->jam_mulai,
                'jam_akhir' => $jamKeluar,
                'keterangan_izin' => $request->keterangan_izin,
                'role_id' => Auth::user()->role_id
            ]);
        } elseif(Auth::user()->role_id == 3) {
            SuratIzin::create([
                'nama_user' => $request->nama_user,
                'nama_pt' => $request->nama_pt,
                'username_user' => $request->username_user,
                'divisi_user' => $request->divisi_user,
                'tanggal_izin' => $request->tanggal_izin,
                'jam_mulai' => $request->jam_mulai,
                'jam_akhir' => $jamKeluar,
                'keterangan_izin' => $request->keterangan_izin,
                'status' => 1,
                'role_id' => Auth::user()->role_id
            ]);
        }

        // dd($jamKeluar);
        

        toast('Berhasil disimpan.','success');
        return redirect('surat-izin');
    }

    public function destroyPT($id) {
        // dd($id);
        DaftarPT::where('id', $id)->delete();

        toast('Data berhasil dihapus.','success');
        return redirect('daftar-pt');
    }

    public function updatePT($id) {
        $data['title'] = 'Ubah PT';
        $data['pt'] = DaftarPT::where('id', $id)->get();
        

        return view('ubah-pt', $data);
    }

    public function updatePTAction(Request $request, $id) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Kolom Nama PT wajib diisi!'
        ]);
        DaftarPT::where('id', $id)->update([
            'name' => $request->name
        ]);

        toast('Data berhasil dihapus.','success');
        return redirect('daftar-pt');
    }


    public function updateDivisiAction(Request $request, $id) {
       DaftarDivisi::where('id', $id)->update(['name' => $request->name]);

       toast('Data berhasil diubah.','success');
        return redirect('daftar-divisi');
    }
    public function destroyDivisi($id) {
        // dd($id);
        DaftarDivisi::where('id', $id)->delete();

        toast('Data berhasil dihapus.','success');
        return redirect('daftar-divisi');
    }

    public function updateDivisi($id) {
        $data['title'] = 'Ubah PT';
        $data['pt'] = DaftarDivisi::where('id', $id)->get();
        

        return view('ubah-divisi', $data);
    }

    
}
