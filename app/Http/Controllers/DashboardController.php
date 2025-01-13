<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Konten;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalPetugas = User::where('role', '!=', 'admin')->count();
        $totalKonten = Konten::count();
        $totalKelompok = Group::count();

        return view('dashboard', compact('totalPetugas', 'totalKonten', 'totalKelompok'));
    }
}
