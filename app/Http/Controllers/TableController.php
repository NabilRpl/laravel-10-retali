<?php

namespace App\Http\Controllers;

use App\Models\DataTable;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index($id)
    {
        $data = DataTable::where('tourguide_id', $id)->get();
        return view('table.index', ['data' => $data]);
    }
}
