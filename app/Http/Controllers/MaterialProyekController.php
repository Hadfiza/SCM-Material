<?php

namespace App\Http\Controllers;

use App\Models\DetailProyek;
use Illuminate\Http\Request;
use App\Models\MaterialProyek;
use App\Models\Pengiriman;
use App\Models\OrderMaterial;
use App\Models\Proyek;

class MaterialProyekController extends Controller
{
    /**
     * Menampilkan daftar material proyek.
     */
    public function index()
    {
        $materials = MaterialProyek::all(); // Ambil semua data material proyek
        return view('admin.material_proyek.index', compact('materials'));
    }
    public function edit($id)
{
    $material = MaterialProyek::findOrFail($id);
    $proyekList = Proyek::where('status', 'aktif')->get(); // Filter proyek yang aktif

    return view('admin.material_proyek.edit', compact('material', 'proyekList'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_material' => 'required',
        'stok' => 'required|integer',
        'harga_satuan' => 'required|numeric',
        'proyek_id' => 'required|exists:proyek,id,status,aktif', // Validasi id proyek yang aktif
    ]);

    $material = MaterialProyek::findOrFail($id);
    $material->update([
        'nama_material' => $request->nama_material,
        'stok' => $request->stok,
        'harga_satuan' => $request->harga_satuan,
        'proyek_id' => $request->proyek_id, // Update proyek_id
    ]);

    return redirect()->route('material_proyek.index')->with('success', 'Material proyek berhasil diperbarui!');
}




    /**
     * Proses sinkronisasi data berdasarkan pengiriman yang selesai.
     */
    public function syncFromPengiriman()
    {
        // Ambil data pengiriman yang berstatus selesai
        $pengirimanSelesai = Pengiriman::where('status_pengiriman', 'selesai')->get();

        foreach ($pengirimanSelesai as $pengiriman) {
            // Cek apakah data material_proyek sudah ada berdasarkan pengiriman_id
            $existingMaterial = MaterialProyek::where('pengiriman_id', $pengiriman->id)->first();

            if (!$existingMaterial) {
                // Ambil data order_material terkait dari pengiriman
                $orderMaterial = $pengiriman->orderMaterial; // Relasi ke tabel order_material

                if ($orderMaterial) {
                    // Tambahkan data ke material_proyek
                    $materialProyek = MaterialProyek::create([
                        'nama_material' => $orderMaterial->nama_material,
                        'stok' => $orderMaterial->jumlah_order, // Gunakan jumlah_order, bukan stok
                        'harga_satuan' => $orderMaterial->harga_satuan,
                        'pengiriman_id' => $pengiriman->id,
                        'material_id' => null, // Sesuaikan jika diperlukan
                    ]);

                    // Kurangi stok material sesuai dengan jumlah yang digunakan di DetailProyek
                    $detailProyek = DetailProyek::where('material_id', $materialProyek->id)->get();

                    foreach ($detailProyek as $detail) {
                        // Kurangi stok berdasarkan jumlah_digunakan yang tercatat di DetailProyek
                        $materialProyek->stok -= $detail->jumlah_digunakan;
                    }

                    // Simpan perubahan stok setelah pengurangan
                    $materialProyek->save();
                }
            }
        }

        return redirect()->route('material_proyek.index')->with('success', 'Data material proyek berhasil disinkronisasi!');
    }


}
