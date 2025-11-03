<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mediatama.test'],
            [
                'name' => 'Admin Mediatama',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
    }
}
