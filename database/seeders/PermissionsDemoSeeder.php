<?php

namespace Database\Seeders;

use App\Models\User;
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

        // Create permissions
        $permissions = [
            'Inputter',
            'Authorizer',
            'Users Access',
            'Users Create',
            'Users Edit',
            'Users View',
            'Credit Report Access',
            'Credit Report Create',
            'Credit Report Show',
            'Credit Report Edit',
            'Credit Report Update',
            'Remarks',
            'Sanctions Advised Issued',
            'Borrower Access',
            'Borrower Create',
            'Borrower Edit',
            'Borrower Show',
            'Print PDF',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $roles = [
            'Branch Manager' => [
                'Inputter', 'Authorizer', 'Credit Report Access', 'Credit Report Create',
                'Credit Report Show', 'Borrower Access', 'Borrower Create', 'Borrower Edit',
                'Borrower Show', 'Print PDF'
            ],
            'Credit Manager' => [
                'Authorizer', 'Credit Report Access', 'Credit Report Show', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'Credit Officer' => [
                'Authorizer', 'Credit Report Access', 'Credit Report Show', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'Regional Credit Manager' => [
                'Credit Report Access', 'Credit Report Show', 'Remarks', 'Sanctions Advised Issued',
                'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'Regional Chief' => [
                'Credit Report Access', 'Credit Report Show', 'Remarks', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'DH CRBD' => [
                'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'SM CRBD' => [
                'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'SM Manager Officer' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Sanctions Advised Issued', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'DH CMD' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Sanctions Advised Issued', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'SM CMD' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'CMD Manager Officer' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'Admin' => [
                'Users Access', 'Users Create', 'Users Edit', 'Users View', 'Credit Report Access',
                'Credit Report Show', 'Credit Report Edit', 'Credit Report Update', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'Super Admin' => $permissions, // All permissions
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::create(['name' => $roleName, 'guard_name' => 'web']);
            $role->givePermissionTo($rolePermissions);
        }

        // Create users and assign roles
        foreach ($roles as $roleName => $rolePermissions) {
            $user = User::create([
                'name' => $roleName . ' User',
                'email' => strtolower(str_replace(' ', '.', $roleName)) . '@example.com',
                'password' => Hash::make('password123'),
            ]);
            $user->assignRole($roleName);
        }
    }

    // php artisan migrate:fresh --seed --seeder=PermissionsDemoSeeder
    // php artisan migrate --path=./database/migrations/2024_05_27_110713_create_loan_statuses_table.php
}
