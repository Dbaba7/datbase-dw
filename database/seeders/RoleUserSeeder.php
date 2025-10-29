<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $dispatcherRole = Role::where('name', 'dispatcher')->first();
        $chiefRole = Role::where('name', 'chief')->first();
        $officerRole = Role::where('name', 'officer')->first();

        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $adminUser->roles()->attach($adminRole);

        $dispatcherUser = User::factory()->create([
            'name' => 'Dispatcher User',
            'email' => 'dispatcher@example.com',
        ]);
        $dispatcherUser->roles()->attach($dispatcherRole);

        $chiefUser = User::factory()->create([
            'name' => 'Chief User',
            'email' => 'chief@example.com',
        ]);
        $chiefUser->roles()->attach($chiefRole);

        $officerUser = User::factory()->create([
            'name' => 'Officer User',
            'email' => 'officer@example.com',
        ]);
        $officerUser->roles()->attach($officerRole);
    }
}