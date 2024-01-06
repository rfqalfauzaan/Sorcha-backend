<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(){
        $data = Shop::all();
        return view('/shop/shop',compact('data'));
    }

    public function tambahshop(){
        return view('/shop/tambahshop');
    }

    public function insertshop(Request $request){
        Shop::created($request->all());
        return redirect()->route('/shop/shop')->with('success','Data Berhasil Di Tambahkan');
    }

    public  function tampilshop($id){
        $data = Shop::find($id);
        return view('/shop/tampilshop',compact('data'));

    }

    public function updateshop(Request $request, $id){
        $data = Shop::find($id);
        $data->update($request->all());
        return redirect()->route('/shop/shop')->with('success','Data berhasil diupdate');
    }
}
