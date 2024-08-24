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


        // create permissions
        Permission::create(['name' => 'loan inputter']);
        Permission::create(['name' => 'loan authorizer']);

        Permission::create(['name' => 'users access']);
        Permission::create(['name' => 'users create']);
        Permission::create(['name' => 'users edit']);
        Permission::create(['name' => 'users view']);


        // credit report permissions
        Permission::create(['name' => 'view credit reports']);
        Permission::create(['name' => 'create credit report']);
        Permission::create(['name' => 'store credit report']);
        Permission::create(['name' => 'edit credit report']);
        Permission::create(['name' => 'update credit report']);



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

    //php artisan migrate:fresh --seed --seeder=PermissionsDemoSeeder
}
