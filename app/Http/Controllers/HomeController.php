<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\MaterialPemasok;
use App\Models\Kontrak;

class HomeController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function dashboardUser()
    {
        $totalPengiriman = Pengiriman::count(); // Total pengiriman
        $totalMaterialPemasok = MaterialPemasok::count(); // Misalnya: tambahkan logika untuk menghitung material pemasok
        $totalKontrak = Kontrak::count(); // Misalnya: tambahkan logika untuk menghitung kontrak

        // Kirim data ke view
        return view('user.dashboard', compact('totalPengiriman', 'totalMaterialPemasok', 'totalKontrak'));
    }
}
