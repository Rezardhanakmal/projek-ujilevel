<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'ini adalah admin',
                'email' => 'admin@example.com',
                'level' => 'admin',
                'password' => bcrypt('admin123')
            ],

            [
                'username' => 'user',
                'name' => 'ini adalah guru',
                'email' => 'guru@example.com',
                'level' => 'guru',
                'password' => bcrypt('123456')
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
