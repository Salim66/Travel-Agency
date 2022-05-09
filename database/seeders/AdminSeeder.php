<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'                  => 'Admin',
            'email'                 => 'admin@admin.com',
            'password'              => password_hash('adminpass', PASSWORD_DEFAULT), // adminpass
            'email_verified_at'     => now(),
        ]);
    }
}
