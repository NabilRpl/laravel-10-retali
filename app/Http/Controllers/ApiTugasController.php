<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiTugasController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input yang diterima dari Flutter
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'tugas_type' => 'required|integer',
            'kloter' => 'required|integer',
            'tasks' => 'required|string',
            'title' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'tugas_type.required' => 'Tipe Tugas harus dipilih',
            'kloter.required' => 'Kloter harus dipilih',
            'tasks.required' => 'Tasks harus diisi',
            'title.required' => 'Title harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        // Ambil pengguna yang sedang login
        $auth = auth()->guard('api')->user();

        // Buat tugas baru dengan data yang diterima
        Tugas::create([
            'nama' => $request->nama,
            'tugas_type' => $request->tugas_type,
            'kloter_id' => $request->kloter,
            'tasks' => (explode(', ', $request->tasks)), // Ubah menjadi JSON array
            'tourguide_id' => $auth->id,
            'title' => (explode(', ', $request->title)),
        ]);

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }
    
}
