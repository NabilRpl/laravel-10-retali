<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Jamaah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JamaahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jamaah = Jamaah::with('group')->get();
        // return response()->json($jamaah);
        return view('jamaah.index', [
            'jamaahs' => $jamaah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        return view('jamaah.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'groups_id' => 'required|exists:groups,id',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'gender' => 'required|string',
            'health_note' => 'nullable|string',
        ]);

        $fotoPath = $request->file('foto')->store('jamaahs', 'public');

        Jamaah::create([
            'foto' => $fotoPath,
            'name' => $request->name,
            'groups_id' => $request->groups_id,
            'no_hp' => $request->phone,
            'alamat' => $request->location,
            'jenis_kelamin' => $request->gender,
            'catatan_kesehatan' => $request->health_note
        ]);

        return redirect()->route('jamaah.index')->with('success', 'Jamaah berhasil diperbarui.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Jamaah $jamaah)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jamaah $jamaah)
    {
        $groups = Group::all();
        return view('jamaah.edit', ['jamaah' => $jamaah, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jamaah $jamaah)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'groups_id' => 'required|exists:groups,id',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'gender' => 'required|string',
            'health_note' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            // hapus file lama
            Storage::delete('public/' . $jamaah->foto);

            // store file baru
            $fotoPath = $request->file('foto')->store('jamaahs', 'public');
            $jamaah->foto = $fotoPath;
        }

        $jamaah->name = $request->name;
        $jamaah->groups_id = $request->groups_id;
        $jamaah->no_hp = $request->phone;
        $jamaah->alamat = $request->location;
        $jamaah->jenis_kelamin = $request->gender;
        $jamaah->catatan_kesehatan = $request->health_note;
        $jamaah->save();

        return redirect()->route('jamaah.index')->with('success', 'Jamaah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jamaah $jamaah)
    {
        //
    }
}
