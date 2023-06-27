<?php

namespace App\Http\Controllers;

use App\Models\DaftarDivisi;
use App\Models\DaftarPT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login() {
        $data['title'] = 'Login';

        return view('login', $data);
    }

    public function loginAction(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 2) {
                return redirect('surat-izin');
            }

            $request->session()->regenerate();

            if(Auth::user()->role_id == 3) {
                return redirect('daftar-surat-izin');
            }

            $request->session()->regenerate();

            if(Auth::user()->role_id == 4) {
                return redirect('hrd-daftar-surat-izin');
            }
        }
        Alert::error('Gagal login', 'Username atau password salah.');
        return redirect('/login');
    }

    public function register() {
        $data['title'] = 'Register';
        $data['daftarPT'] = DaftarPT::all();
        $data['daftarDivisi'] = DaftarDivisi::all();

        return view('register', $data);
    }

    public function registerAction(Request $request) {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'nama' => 'required',
            'nama_pt' => 'required',
            'divisi' => 'required',
            'jk' => 'required',
        ], [
            'username.required' => 'Kolom username wajib diisi!',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Kolom password wajib diisi!',
            'nama.required' => 'Kolom nama wajib diisi!',
            'nama_pt.required' => 'Kolom Nama PT wajib diisi!',
            'divisi.required' => 'Kolom divisi wajib diisi!',
            'jk.required' => 'Kolom jenis kelamin wajib diisi!',
        ]);
        // dd($request->all());
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->nama,
            'nama_pt' => $request->nama_pt,
            'divisi' => $request->divisi,
            'jk' => $request->jk,
        ]);

        toast('Data berhasil disimpan.','success');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Berhasil logout.','success');
        return redirect('login');
    }
}
