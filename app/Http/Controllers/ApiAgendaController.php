<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAgendaController extends Controller
{
    public function index()
    {
        $data = [
            [
                'kegiatan' => 'new',
                'deskripsi' => 'ini deskripsi',
                'schedule' => 'ini schedule',
                'created_at' => '10-10-2020',
                'updated_at' => '10-10-2020'
            ],
            [
                'kegiatan' => 'new',
                'deskripsi' => 'ini deskripsi',
                'schedule' => 'ini schedule',
                'created_at' => '10-10-2020',
                'updated_at' => '10-10-2020'
            ]
        ];
        return response()->json($data);
    }
}
