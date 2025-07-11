<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Fakultas;

class SubUnitController extends Controller
{
    // Tampilkan form tambah sub-unit
    public function create()
    {
        $units = Fakultas::all(); // ambil list unit
        return view('pages.admin.sub_units.create', compact('units'));
    }

    // Proses simpan sub-unit baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_sub_unit' => 'required|string|max:255',
            'unit_id'       => 'required|exists:units,id',
        ]);

        Prodi::create([
            'nama_sub_unit' => $request->nama_sub_unit,
            'unit_id'       => $request->unit_id,
        ]);

        return redirect()->route('sub-units.create')
            ->with('success', 'Sub-Unit berhasil ditambahkan.');
    }
}
