<?php

namespace App\Http\Controllers;

use App\Models\DataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiTableController extends Controller
{
    public function allDataTable() {
        $auth = auth()->guard('api')->user();
        $data = DataTable::where('tourguide_id', $auth->id)->orderBy('timestamp')->get();

        return response()->json($data);
    }

    public function store(Request $request) {
        $auth = auth()->guard('api')->user();

        $validator = Validator::make($request->all(), [
            'nomor_koper' => 'required|string',
            'nama_jamaah' => 'required|string',
            'nomor_hp' => 'required|string',
            'kloter' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = DataTable::create([
            'tourguide_id' => $auth->id,
            'timestamp' => now(),
            'nomor_koper' => $request->nomor_koper,
            'nama_jamaah' => $request->nama_jamaah,
            'nomor_hp' => $request->nomor_hp,
            'kloter_id' => $request->kloter,
        ]);

        return response()->json($data);
    }
}
