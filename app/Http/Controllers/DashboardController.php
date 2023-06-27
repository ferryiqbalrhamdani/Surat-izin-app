<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data['title'] = 'Dashboard';
        $data['countUser'] = User::where('role_id', '!=', 1)->count();
        $data['countSuratIzin'] = SuratIzin::count();

        return view('dashboard', $data);
    }
}
