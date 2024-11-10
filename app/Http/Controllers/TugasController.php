<?php

namespace App\Http\Controllers;

use App\Models\Kloter;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index($id){
        $data = Tugas::where('kloter_id', $id)->orderBy('created_at', 'desc')->get();
        $kloter = Kloter::where('id', $id)->first();
        return view('tugas.index', ['kloter' => $kloter,'tugass' => $data]);
    }

    public function show($id){
        $data = Tugas::where('id', $id)->first();
        // return response()->json($data);
        return view('tugas.tugas1', ['tugas' => $data]);
    }
}
