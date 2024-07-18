<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@appointcms.com',
            'name' => 'Mrs Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $user->roles()->attach(Role::where('name', '=', 'admin')->first());

        $user1 = User::create([
            'email' => 'secretary@appointcms.com',
            'name' => 'Secretary',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $user1->roles()->attach(Role::where('name', '=', 'secretary')->first());
    }
}
