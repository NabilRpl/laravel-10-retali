<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat kelompok baru
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'jumlah_jamaah' => 'required|integer',
            'tanggal_keberangkatan' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data ke database
        Group::create($validated);

        return redirect()->route('groups.index')->with('success', 'Kelompok berhasil dibuat.');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jumlah_jamaah' => 'required|integer',
            'tanggal_keberangkatan' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_keberangkatan',
            'deskripsi' => 'nullable|string',
        ]);

        $group = Group::findOrFail($id);
        $group->update($request->all());

        return redirect()->route('groups.index')->with('success', 'Kelompok berhasil diperbarui');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Kelompok berhasil dihapus');
    }
}
