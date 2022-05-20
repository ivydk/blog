<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            User::factory()->create([
                'name' => "User{$i}",
                'email' => "user{$i}@test.com",
                'password' => Hash::make('user12345'),
                'role' => 'user'
            ]);
        }

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin'
        ]);

        $this->call(PostSeeder::class);

    }
}
