<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;

class UnitController extends Controller
{
    // Tampilkan form tambah unit
    public function create()
    {
        return view('pages.admin.units.create');
    }

    // Proses simpan unit baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255',
        ]);

        Fakultas::create([
            'nama_unit' => $request->nama_unit,
        ]);

        return redirect()->route('units.create')
            ->with('success', 'Unit berhasil ditambahkan.');
    }
}
