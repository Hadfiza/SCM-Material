<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyek = Proyek::all();
        $analisis = Proyek::select(
            'proyek.id',
            'proyek.nama_proyek',
            'proyek.anggaran_proyek',
            DB::raw('SUM(detail_proyek.biaya_penggunaan) AS total_penggunaan'),
            DB::raw('CASE WHEN proyek.anggaran_proyek - SUM(detail_proyek.biaya_penggunaan) < 0 THEN "Defisit" WHEN proyek.anggaran_proyek - SUM(detail_proyek.biaya_penggunaan) = 0 THEN "Tepat Sasaran"  ELSE "Profit" END AS analisis')
        )
            ->join('detail_proyek', 'detail_proyek.proyek_id', '=', 'proyek.id')
            ->groupBy('proyek.id', 'proyek.nama_proyek', 'proyek.anggaran_proyek')
            ->orderBy('proyek.nama_proyek')
            ->get();
        $analisis = collect($analisis);
        // dd($analisis[0]['analisis']);
        return view('admin.proyek.home', compact('proyek', 'analisis'));
    }

    /**
     * Display proyek for users.
     */
    public function indexForUser()
    {
        $proyek = Proyek::all();
        return view('user.proyek.index', compact('proyek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string',
            'status' => 'required',
            'lokasi' => 'required',
            'anggaran_proyek' => 'required'
        ]);

        Proyek::create($request->all());

        return redirect()->route('admin.proyek')->with('success', 'Proyek berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Proyek $proyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('admin.proyek.edit', compact('proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_proyek' => 'required|string',
            'status' => 'required',
            'lokasi' => 'required',
        ]);

        $proyek = Proyek::findOrFail($id);
        $proyek->update($validated);

        // Pastikan redirect ke rute yang benar
        return redirect()->route('admin.proyek')->with('success', 'Update proyek sukses');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()->route('admin.proyek')->with('success', 'Proyek berhasil dihapus');
    }
}
