<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $data = user::all();
        return view('/user/user',compact('data'));

    }
    public function tambahuser(){
        return view('/user/tambahuser');
    }

    public function insertuser(Request $request){
        // dd($request->all());
        User::create($request->all());
        return redirect()->route('/user/user')->with('success','Data berhasil ditambahkan');
    }

    public  function tampiluser($id){
        $data = User::find($id);
        return view('/user/tampiluser',compact('data'));

    }

    public function updateuser(Request $request, $id){
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('user/user')->with('success','Data berhasil diupdate');
    }
}
