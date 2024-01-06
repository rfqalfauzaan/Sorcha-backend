<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index(){
        $data = Laundry::all();
        return view('/laundry/laundry',compact('data'));
    }

    public function tambahshop(){
        return view('/laundry/tambahlaundry');
    }

    public function insertshop(Request $request){
        Laundry::created($request->all());
        return redirect()->route('/laundry/laundry')->with('success','Data Berhasil Di Tambahkan');
    }

    public  function tampilshop($id){
        $data = Laundry::find($id);
        return view('/laundry/tampillaundrry',compact('data'));

    }

    public function updateshop(Request $request, $id){
        $data = Laundry::find($id);
        $data->update($request->all());
        return redirect()->route('/laundry/laundry')->with('success','Data berhasil diupdate');
    }
}
