<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data['title'] = 'Daftar User';
        $data['users']  = User::all();
        $data['countUsers'] = User::all()->count();

        
        return view('users.daftar-user', $data);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        
        toast('Data berhasil dihapus.','success');
        return redirect('users');
    }

    public function profile() {
        $data['title'] = 'Profile';
        $data['user'] = User::where('id', Auth::user()->id)->get();

        return view('users.profile', $data);        
    }

    public function ubahPassword() {
        $data['title'] = 'Ubah Password';

        return view('users.ubah-password', $data);
    }

    public function ubahPasswordAction(Request $request) {
        // dd($request->all());
        $request->validate([
            'passwordNow' => 'required',
            'passwordNew' => 'required',
            'passwordConfirm' => 'same:passwordNew',
        ], [
            'passwordNow.required' => 'Password sekarang wajib diisi',
            'passwordNew.required' => 'Password baru wajib diisi',
            'passwordConfirm.same' => 'Password tidak sama!',
        ]);

        if(!Hash::check($request->passwordNow, Auth::user()->password)) {
            toast('Password sekarang tidak sama dengan database!','error');
            return back();
        }

        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->passwordNow)
        ]);

        toast('Password berhasil diubah.', 'success');
        return redirect('profile');
    }
}
