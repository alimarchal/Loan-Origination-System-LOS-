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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'inputter',
            'authorizer',
            'users access',
            'users create',
            'users edit',
            'users view',
            'credit report access',
            'credit report create',
            'credit report show',
            'credit report edit',
            'credit report update',
            'remarks',
            'sanctions advice access',
            'sanctions advice issue',
            'sanctions advice create',
            'sanctions advice show',
            'sanctions advice edit',
            'sanctions advice update',
            'borrower access',
            'borrower create',
            'borrower edit',
            'borrower show',
            'download pdf',
            'dac access',
            'dac issue',
            'dac create',
            'dac show',
            'dac edit',
            'dac update',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $roles = [
            'Branch Manager' => [
                'authorizer', 
                'credit report access', 
                'credit report show', 
                'borrower access',
                'borrower show',
                'download pdf'
            ],
            'Branch Credit Manager' => [
                'inputter', 
                'credit report access',
                'credit report create',
                'credit report show', 
                'borrower access',
                'borrower create',
                'borrower edit',
                'borrower show',
                'download pdf'
            ],
            'Branch Credit Officer' => [
                'inputter', 
                'credit report access',
                'credit report create',
                'credit report show', 
                'borrower access',
                'borrower create',
                'borrower edit',
                'borrower show',
                'download pdf'
                 
            ],
            'Regional Credit Manager' => [
                'credit report access',
                'credit report edit',
                'credit report show',
                'remarks',
                'sanctions advice access',
                'sanctions advice issue',
                'sanctions advice create',
                'sanctions advice show',
                'sanctions advice edit',
                'sanctions advice update',
                'borrower access',
                'borrower show',
                'download pdf'

            ],
            'Regional Credit Officer' => [
                 'credit report access',
                 'credit report show',
                 'remarks',
                 'borrower access',
                 'borrower show',
                 'download pdf'

            ],
            'Regional Head' => [
                  'credit report access',
                  'credit report show',
                  'remarks', 
                  'borrower access',
                  'borrower show',
                  'sanctions advice access',
                  'sanctions advice show',
                  'download pdf'
            ],
            'Divisional Head CRBD' => [
                'remarks',
                'borrower access',
                'borrower show',
                'download pdf'
            ],
            'Senior Manager CRBD' => [
                'remarks',
                'borrower access',
                'borrower show',
                'download pdf'
            ],
            'Manager Officer CRBD' => [
                'credit report access',
                'credit report show',
                'remarks', 
                'borrower access',
                'borrower show',
                'download pdf'
            ],
             'Divisional Head CMD' => [
                'credit report access',
                'credit report show',
                'credit report update',
                'remarks',
                'sanctions advice access', 
                'sanctions advice issue',
                'sanctions advice create',
                'sanctions advice show',
                'sanctions advice edit',
                'sanctions advice update',
                'borrower access',
                'borrower show', 
                'download pdf'
            ],
            'Senior Manager CMD' => [
                  'credit report access',
                  'credit report show', 
                  'credit report edit',
                  'credit report update',
                  'remarks',
                  'sanctions advice access', 
                  'sanctions advice issue',
                  'sanctions advice create',
                  'sanctions advice show',
                  'sanctions advice edit',
                  'sanctions advice update',
                  'borrower access',
                  'borrower show', 
                  'download pdf'
            ],
            'Manager Officer CMD' => [
                 'credit report access',
                 'credit report show',
                 'credit report update',
                 'remarks',
                 'borrower access',
                 'borrower show', 
                 'download pdf'
                 
            ],
            'Regional Manager CAD' => [
                'dac access',
                'dac issue',
                'dac create',
                'dac show',
                'dac edit',
                'dac update',
                'sanctions advice access',
                'sanctions advice show',
            ],
            'Super Admin' => $permissions, // All permissions
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::create(['name' => $roleName, 'guard_name' => 'web']);
//            $role->givePermissionTo($rolePermissions);
        }

        // Create users and assign roles
        foreach ($roles as $roleName => $rolePermissions) {
            $user = User::create([
                'name' => $roleName . ' User',
                'branch_id' => 1,
                'email' => strtolower(str_replace(' ', '.', $roleName)) . '@example.com',
                'password' => Hash::make('password123'),
            ]);
            $user->assignRole($roleName);
            // Sync the permissions of the user with the permissions of the assigned role
            $user->syncPermissions($rolePermissions);
        }

    }
    // php artisan migrate:fresh --seed --seeder=PermissionsDemoSeeder

    /*

TRUNCATE `model_has_permissions`;
TRUNCATE `model_has_roles`;
TRUNCATE `permissions`;
TRUNCATE `roles`;
TRUNCATE `role_has_permissions`;
TRUNCATE `users`;
    // php artisan db:seed --class=PermissionsDemoSeeder
     */
    // php artisan migrate --path=./database/migrations/2024_05_27_110713_create_loan_statuses_table.php
}
