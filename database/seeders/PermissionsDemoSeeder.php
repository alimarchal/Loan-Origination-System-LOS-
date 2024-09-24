<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // roles
        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $role10 = Role::create(['name' => 'Branch Manager']);
        $role11 = Role::create(['name' => 'Credit Manager']);
        $role12 = Role::create(['name' => 'Credit Officer']);
        $role13 = Role::create(['name' => 'Operations Officer']);
        $role14 = Role::create(['name' => 'Operations Manager']);
        $role15 = Role::create(['name' => 'Teller']);
        $role15 = Role::create(['name' => 'Regional Credit Manager']);
        $role15 = Role::create(['name' => 'Regional Chief']);
        $role15 = Role::create(['name' => 'DH CRBD']);
        $role15 = Role::create(['name' => 'SM CMD']);
        $role16 = Role::create(['name' => 'Head Office']);


        // create permissions\

        Permission::create(['name' => 'inputter']);
        Permission::create(['name' => 'authorizer']);

        Permission::create(['name' => 'users access']);
        Permission::create(['name' => 'users create']);
        Permission::create(['name' => 'users edit']);
        Permission::create(['name' => 'users view']);


        // credit report permissions
        Permission::create(['name' => 'credit report access']);
        Permission::create(['name' => 'credit report create']);
        Permission::create(['name' => 'credit report show']);
        Permission::create(['name' => 'credit report edit']);
        Permission::create(['name' => 'credit report update']);
        Permission::create(['name' => 'credit report destroy']);



        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Branch Manager',
            'password' => Hash::make('12345678'),
            'email' => 'bm@example.com',
        ]);
        $user->assignRole($role10);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'password' => Hash::make('12345678'),
            'email' => 'sa@example.com',
        ]);
        $user->assignRole($role3);

    }

    // php artisan migrate:fresh --seed --seeder=PermissionsDemoSeeder
    // php artisan migrate --path=./database/migrations/2024_05_27_110713_create_loan_statuses_table.php
}
