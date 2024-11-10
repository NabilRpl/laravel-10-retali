<?php

namespace App\Http\Controllers;

use App\Models\Kloter;
use Illuminate\Http\Request;

class ApiKloterController extends Controller
{
    public function index()
    {

        $auth = auth()->guard('api')->user();

        $data = Kloter::where('tourguide_id', $auth->id)->get();

        return response()->json($data);
    }
}
