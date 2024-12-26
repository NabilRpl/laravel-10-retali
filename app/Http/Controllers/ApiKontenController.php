<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiKontenController extends Controller
{
    public function allKonten() {
        $konten = \App\Models\Konten::all();
        return response()->json($konten);
    }

    public function detailKonten($id) {
        $konten = \App\Models\Konten::find($id);

        return response()->json($konten);
    }

    public function storeUserKonten(Request $request)
    {
        log::info('storeUserKonten');
        $auth = auth()->guard('api')->user();

        $validator = Validator::make($request->all(), [
            'tugaskonten_id' => 'required|integer',
            'foto' => 'required|array', // Foto harus berupa array
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480', // Setiap item di foto harus gambar
            'video' => 'nullable|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:50240',
        ]);

        if ($validator->fails()) {
            // Log::info('Validation failed', ['errors' => $validator->errors()]);
            return response()->json(['error' => $validator->errors()], 422);
        }

        $konten = \App\Models\Konten::find($request->tugaskonten_id);

        if (!$konten) {
            // Log::info('Konten not found', ['tugaskonten_id' => $request->tugaskonten_id]);
            return response()->json(['error' => 'Konten not found'], 404);
        }

        $fotoPaths = []; // Array untuk menyimpan nama file foto

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                // Simpan file ke direktori storage/app/public/images
                $fotoPath = $foto->store('public/images');
                $fotoPaths[] = str_replace('public/', '', $fotoPath); // Simpan path relatif
            }
        }
    
        if ($request->hasFile('video')) {
            // Simpan file video ke direktori storage/app/public/videos
            $videoPath = $request->file('video')->store('public/videos');
            $videoPath = str_replace('public/', '', $videoPath); // Simpan path relatif
        }

        // Simpan data ke database
        $userkonten = \App\Models\Userkonten::create([
            'tourguide_id' => $auth->id, // Sesuaikan dengan ID user
            'tugaskonten_id' => $request->tugaskonten_id,
            'foto' => json_encode($fotoPaths), // Simpan sebagai JSON
            'video' => $videoPath ?? null,
        ]);

        return response()->json(['success' => true, 'data' => $userkonten]);
    }
}
