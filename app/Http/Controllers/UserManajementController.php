<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManajementController extends Controller
{
    public function index(){
        return view('userManajement.index',
        [ 'users' => User::where('role',  'tourguide')->get() ]);
    }

    public function create(){
        return view('userManajement.create');
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'location' => 'required',
            'password' => 'required|confirmed',
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('userManajement.index');
    }

    public function edit($id) {
        return view('userManajement.edit', ['user' => User::findOrFail($id)]);
    }

    public function update(Request $request, $id) {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required',
            'location' => 'required',
            'password' => 'nullable|confirmed', // Password bersifat opsional
        ]);
    
        // Ambil user yang akan diupdate
        $user = User::findOrFail($id);
    
        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->location = $request->location;
    
        // Update password jika disediakan
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        // Simpan perubahan
        $user->save();
    
        return redirect()->route('userManajement.index')->with('success', 'User berhasil diperbarui.');
    }
    
}
