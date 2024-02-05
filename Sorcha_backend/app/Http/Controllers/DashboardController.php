<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Laundry;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            [
                'title' => 'Total Users',
                'value' => User::count(),
            ],
            [
                'title' => 'Total Shops',
                'value' => Shop::count(),
            ],
            [
                'title' => 'Total Laundries',
                'value' => Laundry::count(),
            ],
            // ... tambahkan data lainnya sesuai kebutuhan
        ];

        return view('dashboard', compact('data'));
    }

}
