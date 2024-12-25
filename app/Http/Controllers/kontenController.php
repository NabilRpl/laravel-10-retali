<?php

namespace App\Http\Controllers;

use App\Models\konten;
use App\Models\userkonten;
use Illuminate\Http\Request;

class kontenController extends Controller
{
    public function index()
    {
        $TugasKonten = Konten::all();
        return view('tugaskonten.index', ['TugasKontens' => $TugasKonten]);
    }

    public function create()
    {
        return view('tugaskonten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Konten::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('tugaskonten.index');
    }

    public function userkonten($id) {
        $userkonten = userkonten::with('kontentugas')->where('tourguide_id', $id)->get();

        // return response()->json($userkonten);
        return view('tugaskonten.kontendetailuser', ['userkontens' => $userkonten]);
    }

    public function detailuserkonten($id) {
        $userkonten = userkonten::with('kontentugas')->where('id', $id)->firstOrFail();
        
        // return response()->json($userkonten);
        return view('tugaskonten.detailuserkonten', ['detailkonten' => $userkonten]);
    }
}
