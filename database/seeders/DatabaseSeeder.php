<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Add Admin account
        \App\Models\User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'password' => \Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Add Office account
        \App\Models\User::updateOrCreate(
            ['username' => 'office'],
            [
                'name' => 'Office Staff',
                'password' => \Hash::make('password'),
                'role' => 'office',
            ]
        );

        // Add Guard account
        \App\Models\User::updateOrCreate(
            ['username' => 'guard'],
            [
                'name' => 'Campus Guard',
                'password' => \Hash::make('password'),
                'role' => 'guard',
            ]
        );
    }
}
