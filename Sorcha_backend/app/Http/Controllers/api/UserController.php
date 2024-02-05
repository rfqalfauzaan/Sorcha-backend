<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function readAll()
    {
        $users = User::all();

        return response()->json([
            'data' => $users,
        ], 200);
    }

    function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'data' => $user,
        ], 201);
    }

    function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'token' => $token,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'namalaundry' => 'required|string|max:255',
            'berapakilo' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $user = User::create($request->all());

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }


    public function updateAdditionalDetails(Request $request, $userId)
{
    $user = User::findOrFail($userId);

    $request->validate([
        'namalaundry' => 'required|string',
        'berapakilo' => 'required|numeric',
        'deskripsi' => 'nullable|string',
    ]);

    $additionalDetails = $request->only(['namalaundry', 'berapakilo', 'deskripsi']);
    $user->update($additionalDetails);

    return ResponseFormatter::success($user, 'Additional details updated successfully');
}

    public function loginUser(Request $request)
    {
        $response = array();
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $data = User::where([
            'email' => $email,
            'password' => $password
        ])->first();

        if ($data) {
            // Generate Token
            $tokenResult = $data->createToken('authToken')->plainTextToken;

            // You can set session data if needed
            // session(['username' => $data->username]);
            // session(['user_id' => $data->id]);

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $data
            ], 'Login success');
        } else {
            return ResponseFormatter::error(['error' => 'Failed'], 'Login failed');
        }
    }



    public function registerLaundryInfo(Request $request)
{
    $user = $request->user(); // Fetch the authenticated user

    $request->validate([
        'nama_laundry' => 'required',
        'berat_kilo' => 'required|integer',
        'deskripsi' => 'required',
    ]);

    $user->update([
        'nama_laundry' => $request->input('nama_laundry'),
        'berat_kilo' => $request->input('berat_kilo'),
        'deskripsi' => $request->input('deskripsi'),
    ]);

    return ResponseFormatter::success($user, 'Laundry info registration success');
}

public function registerBasicInfo(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $model = new User;
    $model->username = $request->input('username');
    $model->email = $request->input('email');
    $model->password = bcrypt($request->input('password'));

    if ($model->save()) {
        $tokenResult = $model->createToken('authToken')->plainTextToken;
        return ResponseFormatter::success([
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
            'user' => $model
        ], 'Basic info registration success');
    } else {
        return ResponseFormatter::error('Basic info registration failed', 500);
    }
}
}
