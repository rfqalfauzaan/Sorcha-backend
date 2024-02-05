<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    // public function index(){
    //     $data = Laundry::all();
    //     return view('/laundry/laundry',compact('data'));
    // }

    // public function tambahshop(){
    //     return view('/laundry/tambahlaundry');
    // }

    // public function insertshop(Request $request){
    //     Laundry::created($request->all());
    //     return redirect()->route('/laundry/laundry')->with('success','Data Berhasil Di Tambahkan');
    // }

    // public  function tampilshop($id){
    //     $data = Laundry::find($id);
    //     return view('/laundry/tampillaundrry',compact('data'));

    // }

    // public function updateshop(Request $request, $id){
    //     $data = Laundry::find($id);
    //     $data->update($request->all());
    //     return redirect()->route('/laundry/laundry')->with('success','Data berhasil diupdate');
    // }

    public function index()
    {
        $laundries = Laundry::all();
        return view('laundries.index', compact('laundries'));
    }

    public function create()
    {
        return view('laundries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'shop_id' => 'required|exists:shops,id',
            'weight' => 'required|numeric',
            'pickup_address' => 'nullable',
            'delivery_address' => 'nullable',
            'total' => 'nullable|numeric',
            'description' => 'nullable',
            'status' => 'nullable',
        ]);

        Laundry::create($validatedData);

        return redirect()->route('laundries.index')->with('success', 'Laundry created successfully');
    }

    public function edit($id)
    {
        $laundry = Laundry::findOrFail($id);
        return view('laundries.edit', compact('laundry'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'shop_id' => 'required|exists:shops,id',
            'weight' => 'required|numeric',
            'pickup_address' => 'nullable',
            'delivery_address' => 'nullable',
            'total' => 'nullable|numeric',
            'description' => 'nullable',
            'status' => 'nullable',
        ]);

        $laundry = Laundry::findOrFail($id);
        $laundry->update($validatedData);

        return redirect()->route('laundries.index')->with('success', 'Laundry updated successfully');
    }

    public function destroy($id)
    {
        $laundry = Laundry::findOrFail($id);
        $laundry->delete();

        return redirect()->route('laundries.index')->with('success', 'Laundry deleted successfully');
    }
}

