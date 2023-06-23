<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function cetakPDF() {
        $user = User::where('id', Auth::user()->id)->get();
        $atasan = User::where('role_id', 3)->get();
        $suratIzin = SuratIzin::where('username_user', Auth::user()->username)->orderBy('tanggal_izin', 'asc')->get();
        $thisMonth = Carbon::now()->format('m/Y');
        // $thisMonth = '05/2023';

        $data = [
            'user' => $user,
            'atasan' => $atasan,
            'suratIzin' => $suratIzin,
            'thisMonth' => $thisMonth,
        ];

        // dd($data);

        $pdf = Pdf::loadView('pdf.surat-izin-pdf', $data);
        foreach ($user as $u ) {
            return $pdf->stream("Surat Izin - ".$u->name." - ".$thisMonth.".pdf" );
        }
    }
}
