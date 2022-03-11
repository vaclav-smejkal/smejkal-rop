<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
use App\Helper\Helper;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Post::factory(5)->create();

        Role::firstOrCreate(['name' => 'Administrator']);
        $admin = User::create([
            'name' => "admin",
            'email' => 'vasek.smejkall@seznam.cz',
            'email_verified_at' => now(),
            'role_id' => 1,
            'remember_token' => Str::random(10),
            'password' => Hash::make('123'),
        ]);
        $admin->assignRole('Administrator');
    }
}
