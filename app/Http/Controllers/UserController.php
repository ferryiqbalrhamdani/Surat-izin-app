<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

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
}
