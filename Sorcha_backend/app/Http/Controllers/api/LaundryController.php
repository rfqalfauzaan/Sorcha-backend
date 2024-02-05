<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request;
use App\Models\User;

class LaundryController extends Controller
{
    function readAll()
    {
        $laundries = Laundry::with('user', 'shop')->get();

        return response()->json([
            'data' => $laundries,
        ], 200);
    }

    function whereUserId($id)
    {
        $laundries = Laundry::where('user_id', '=', $id)
            ->with('shop', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($laundries) > 0) {
            return response()->json([
                'data' => $laundries,
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found',
                'data' => $laundries,
            ], 404);
        }
    }

    function claim(Request $request)
    {
        $laundry = Laundry::where([
            ['id', '=', $request->id],
            ['claim_code', '=', $request->claim_code],
        ])->first();

        if (!$laundry) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        if ($laundry->user_id != 0) {
            return response()->json([
                'message' => 'Laundry has been claimed',
            ], 400);
        }

        $laundry->user_id = $request->user_id;
        $updated = $laundry->save();

        if ($updated) {
            return response()->json([
                'data' => $updated,
            ], 201);
        } else {
            return response()->json([
                'message' => 'can not be updated'
            ], 500);
        }
    }

    public function index()
    {
        $laundries = Laundry::where('user_id', auth()->user()->id)->get();
        return response()->json($laundries, 200);
    }

    public function show($id)
    {
        $laundries = Laundry::where('user_id', '=', $id)
            ->with('shop', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($laundries) > 0) {
            return response()->json([
                'data' => $laundries,
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found',
                'data' => $laundries,
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric',
            'pickup_address' => 'nullable|string',
            'delivery_address' => 'nullable|string',
            'total' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $user = auth()->user();

        $laundryData = [
            'user_id' => $user->id,
            'shop_id' => $request->input('shop_id'),
            'weight' => $request->input('weight'),
            'pickup_address' => $request->input('pickup_address'),
            'delivery_address' => $request->input('delivery_address'),
            'total' => $request->input('total'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ];

        $laundry = Laundry::create($laundryData);

        return response()->json($laundry, 201);
    }

    public function update(Request $request, $id)
    {
        $laundry = Laundry::findOrFail($id);

        $request->validate([
            'weight' => 'required|numeric',
            'pickup_address' => 'nullable|string',
            'delivery_address' => 'nullable|string',
            'total' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $laundry->update($request->all());

        return response()->json($laundry, 200);
    }

    public function destroy($id)
    {
        $laundry = Laundry::findOrFail($id);
        $laundry->delete();

        return response()->json(['message' => 'Laundry deleted successfully'], 200);
    }

}
