<?php

namespace App\Http\Controllers;

use App\Models\Kloter;
use Illuminate\Http\Request;

class KloterController extends Controller
{
    public function index($id){
        $data = Kloter::where('tourguide_id', $id)->get();
        return view('kloter.index', ['tourguide_id' => $id ,'kloters' => $data]);
    }

    public function create($id){
        return view('kloter.create', ['tourguide_id' => $id]);
    }

    public function store(Request $request, $id){

        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
        ]);

        $kloter = Kloter::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'tourguide_id' => $id,
        ]);

        return redirect()->route('kloter.index', ['id' => $id]);
    }
}
