<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Proyek;
use App\Models\Pemasok;
use App\Models\MaterialPemasok;
use App\Models\Kontrak;
use App\Models\MaterialProyek;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total jumlah data dari tabel pengiriman
        $totalPengiriman = Pengiriman::count();

        // Mengambil total jumlah data dari tabel proyek
        $totalProyek = Proyek::count();

        // Mengambil total jumlah data dari tabel pemasok
        $totalPemasok = Pemasok::count();

        // Mengambil total jumlah data dari tabel material_pemasok
        $totalMaterialPemasok = MaterialPemasok::count();
        $totalMaterialProyek= MaterialProyek::count();

        // Mengambil total jumlah data dari tabel kontrak
        $totalKontrak = Kontrak::count();

        // Kirim data ke view dashboard
        return view('admin.dashboard', compact(
            'totalPengiriman',
            'totalProyek',
            'totalPemasok',
            'totalMaterialPemasok',
            'totalKontrak',
            'totalMaterialProyek'
        ));
    }

    public function userDashboard()
    {
        // Mengambil total jumlah data dari tabel pengiriman
        $totalPengiriman = Pengiriman::count();

        // Mengambil total jumlah data dari tabel material_pemasok
        $totalMaterialPemasok = MaterialPemasok::count();

        // Mengambil total jumlah data dari tabel kontrak
        $totalKontrak = Kontrak::count();

        // Kirim data ke view dashboard user
        return view('user.dashboard', compact(
            'totalPengiriman',
            'totalMaterialPemasok',
            'totalKontrak'
        ));
    }
}
