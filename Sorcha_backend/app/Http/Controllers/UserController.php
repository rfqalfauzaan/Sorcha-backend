<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function user()
    // {
    //     $data = user::all();
    //     return view('/user/user',compact('data'));

    // }
    // public function tambahuser(){
    //     return view('/user/tambahuser');
    // }

    // public function insertuser(Request $request){
    //     // dd($request->all());
    //     User::create($request->all());
    //     return redirect()->route('/user/user')->with('success','Data berhasil ditambahkan');
    // }

    // public  function tampiluser($id){
    //     $data = User::find($id);
    //     return view('/user/tampiluser',compact('data'));

    // }

    // public function updateuser(Request $request, $id){
    //     $data = User::find($id);
    //     $data->update($request->all());
    //     return redirect()->route('user/user')->with('success','Data berhasil diupdate');
    // }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Simpan data ke database
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'required',
    ]);

    // Update data di database
    $user = User::findOrFail($id);
    $user->update($validatedData);

    return redirect()->route('users.index')->with('success', 'User updated successfully');
}

public function destroy($id)
{
    // Hapus data dari database
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}
}
