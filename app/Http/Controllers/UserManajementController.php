<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManajementController extends Controller
{
    public function index(){
        $users = User::with('group')->get();
        return view('userManajement.index',
        [ 'users' => User::where('role',  'tourguide')->get() ]);
    }

    public function create(){
        $groups = Group::all();
        return view('userManajement.create', compact('groups'));
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'location' => 'required',
            'password' => 'required|confirmed',
            'group_id' => 'nullable|exists:groups,id',
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'password' => Hash::make($request->password),
            'group_id' => $request->group_id
        ]);

        return redirect()->route('userManajement.index');
    }

    public function edit($id) {
        $groups = Group::all();
        $user = User::findOrFail($id);
        return view('userManajement.edit', compact('user', 'groups') ,['user' => User::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('userManajement.index')->with('success', 'User berhasil dihapus.');
    }

    public function update(Request $request, $id) {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required',
            'location' => 'required',
            'password' => 'nullable|confirmed',
            'group_id' => 'nullable|exists:groups,id', // Tambahkan validasi group_id
        ]);

        // Ambil user yang akan diupdate
        $user = User::findOrFail($id);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->group_id = $request->group_id; // Perbarui group_id

        // Update password jika disediakan
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('userManajement.index')->with('success', 'User berhasil diperbarui.');
    }


}
