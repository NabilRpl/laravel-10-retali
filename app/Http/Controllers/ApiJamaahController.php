<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use Illuminate\Http\Request;

class ApiJamaahController extends Controller
{
    public function index() {
        $jamaah = Jamaah::with('group')->get();

        return response()->json($jamaah);
    }
}
