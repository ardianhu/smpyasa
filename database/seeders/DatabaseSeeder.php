<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'super_admin',
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@smpyasa.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'position' => 'Maintainer',
            'level' => 0,
        ]);
        Category::create([
            'name' => 'Umum',
        ]);
        Tag::create([
            'name' => 'olimpiade',
        ]);
    }
}
