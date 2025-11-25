<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::create([
        'name' => 'Administrator',
        'email' => 'admin@admin.com',
        'password' => 'password',
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Guru Test',
        'email' => 'guru@guru.com',
        'password' => 'password',
        'role' => 'guru',
    ]);
}

}