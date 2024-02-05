<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    // public function index(){
    //     $data = Shop::all();
    //     return view('/shop/shop',compact('data'));
    // }

    // public function tambahshop(){
    //     return view('/shop/tambahshop');
    // }

    // public function insertshop(Request $request){
    //     Shop::created($request->all());
    //     return redirect()->route('/shop/shop')->with('success','Data Berhasil Di Tambahkan');
    // }

    // public  function tampilshop($id){
    //     $data = Shop::find($id);
    //     return view('/shop/tampilshop',compact('data'));

    // }

    // public function updateshop(Request $request, $id){
    //     $data = Shop::find($id);
    //     $data->update($request->all());
    //     return redirect()->route('/shop/shop')->with('success','Data berhasil diupdate');
    // }

    public function index()
    {
        $shops = Shop::all();
        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'name' => 'required',
            'location' => 'required',
            'city' => 'required',
            'delivery' => 'required|boolean',
            'pickup' => 'required|boolean',
            'whatsapp' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'rate' => 'required|numeric',
        ]);

        Shop::create($validatedData);

        return redirect()->route('shops.index')->with('success', 'Shop created successfully');
    }

    public function edit($id)
{
    $shop = Shop::findOrFail($id);
    return view('shops.edit', compact('shop'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'image' => 'required',
        'name' => 'required',
        'location' => 'required',
        'city' => 'required',
        'delivery' => 'required|boolean',
        'pickup' => 'required|boolean',
        'whatsapp' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'rate' => 'required|numeric',
    ]);

    $shop = Shop::findOrFail($id);
    $shop->update($validatedData);

    return redirect()->route('shops.index')->with('success', 'Shop updated successfully');
}

public function destroy($id)
{
    $shop = Shop::findOrFail($id);
    $shop->delete();

    return redirect()->route('shops.index')->with('success', 'Shop deleted successfully');
}
}
