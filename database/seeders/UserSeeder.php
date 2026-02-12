<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@naturalgem.com'],
            [
                'name' => 'Natural Gem Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        $role = Role::firstOrCreate(['name' => 'Super Admin']);
        $user->syncRoles([$role]);
    }
}
