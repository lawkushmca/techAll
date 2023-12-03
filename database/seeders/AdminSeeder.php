<?php

namespace Database\Seeders;
// database/seeders/AdminSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create the 'admin' role
        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        // Create the admin user
        $adminUser = User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Replace with the desired admin password
        ]);

        // Assign the 'admin' role to the admin user
        $adminUser->roles()->attach($adminRole);
    }
}
