<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;
use Illuminate\Http\Request;

class SuratIzinController extends Controller
{
    public function update($id) {
        $data['title'] = 'Ubah Form Izin';
        $data['suratIzin'] = SuratIzin::where('id', $id)->get();
        // dd($data);

        return view('update-surat-izin', $data);
    }

    public function deleteSuratIzin($id) {
        SuratIzin::where('id', $id)->delete();

        toast('Data berhasil diunsend.','success');
        return redirect('surat-izin');
    }
}
