<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'nama_admin' => 'alfa',
                'username' => 'alfa',
                'password' => Hash::make('pass'),
            ],
        ];

        foreach ($admins as $item) {
            Admin::create($item);
        }

    }
}
