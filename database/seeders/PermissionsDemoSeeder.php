<?php

namespace Database\Seeders;

use App\Models\Branch;
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


        // Get the permission arrays from your roles definition
        $branchManagerPermissions = $roles['Branch Manager'];
        $branchCreditManagerPermissions = $roles['Branch Credit Manager'];
        foreach (Branch::where('id', '>', 1)->get() as $branch) {

            $role_bm = Role::findByName('Branch Manager');
            $role_cm = Role::findByName('Branch Credit Manager');
            $branch_manager = User::create([
                'name' => 'Branch Manager ' . $branch->code,
                'branch_id' => $branch->id,
                'email' => 'manager' . $branch->code . '@bankajk.com',
                'password' => Hash::make('password123'),
            ]);
            $branch_manager->assignRole($role_bm);
            $branch_manager->syncPermissions($branchManagerPermissions);



            $branch_credit_manager = User::create([
                'name' => 'Credit Manager ' . $branch->code,
                'branch_id' => $branch->id,
                'email' => 'cm' . $branch->code . '@bankajk.com',
                'password' => Hash::make('password123'),
            ]);
            $branch_credit_manager->assignRole($role_cm);
            $branch_credit_manager->syncPermissions($branchCreditManagerPermissions);


        }


        // Get the permission arrays from your roles definition
        $regionalCreditManagerPermissions = $roles['Regional Credit Manager'];
        $regionalCreditOfficerPermissions = $roles['Regional Credit Officer'];
        $regionalHeadPermissions = $roles['Regional Head'];

        // Find roles
        $regional_credit_manager = Role::findByName('Regional Credit Manager');
        $regional_credit_officer = Role::findByName('Regional Credit Officer');
        $regional_head = Role::findByName('Regional Head');

//        // Create and assign for Muzaffarabad
//        $regional_credit_manager_muzaffarabad = User::create([
//            'name' => 'Regional Credit Manager',
//            'branch_id' => 1,
//            'email' => 'rcm.mzd' . '@bankajk.com',
//            'password' => Hash::make('password123'),
//        ]);
//        $regional_credit_manager_muzaffarabad->assignRole($regional_credit_manager);
//        $regional_credit_manager_muzaffarabad->syncPermissions($regionalCreditManagerPermissions);
//
//        $regional_credit_officer_muzaffarabad = User::create([
//            'name' => 'Regional Credit Officer MZD',
//            'branch_id' => 1,
//            'email' => 'rcm.mzd.officer' . '@bankajk.com',
//            'password' => Hash::make('password123'),
//        ]);
//        $regional_credit_officer_muzaffarabad->assignRole($regional_credit_officer);
//        $regional_credit_officer_muzaffarabad->syncPermissions($regionalCreditOfficerPermissions);

        // Create and assign for Rawalakot/Mirpur
        $regional_credit_manager_mirpur = User::create([
            'name' => 'RCM Mirpur',
            'branch_id' => 2,
            'email' =>'rcm.mpr' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_credit_manager_mirpur->assignRole($regional_credit_manager);
        $regional_credit_manager_mirpur->syncPermissions($regionalCreditManagerPermissions);


        $regional_credit_manager_rawalakot = User::create([
            'name' => 'RCM Rawalakot',
            'branch_id' => 6,
            'email' =>'rcm.rwk' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_credit_manager_rawalakot->assignRole($regional_credit_manager);
        $regional_credit_manager_rawalakot->syncPermissions($regionalCreditManagerPermissions);

        $regional_credit_officer_rawalakot = User::create([
            'name' => 'RCO Rawalakot',
            'branch_id' => 6,
            'email' => 'rcm.rwk.officer' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_credit_officer_rawalakot->assignRole($regional_credit_officer);
        $regional_credit_officer_rawalakot->syncPermissions($regionalCreditOfficerPermissions);

        

// Create and assign for Kotli
        $regional_credit_manager_kotli = User::create([
            'name' => 'Regional Credit Manager',
            'branch_id' => 5,
            'email' => 'rcm.kti' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_credit_manager_kotli->assignRole($regional_credit_manager);
        $regional_credit_manager_kotli->syncPermissions($regionalCreditManagerPermissions);

        $regional_credit_officer_kotli = User::create([
            'name' => 'Regional Credit Officer Kotli',
            'branch_id' => 5,
            'email' => 'rcm.kti.officer' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_credit_officer_kotli->assignRole($regional_credit_officer);
        $regional_credit_officer_kotli->syncPermissions($regionalCreditOfficerPermissions);

// Create and assign for Regional Heads
        $regional_head_rawalakot = User::create([
            'name' => 'Regional Head Rawalakot',
            'branch_id' => 6,
            'email' => 'rc.rwk' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_head_rawalakot->assignRole($regional_head);
        $regional_head_rawalakot->syncPermissions($regionalHeadPermissions);

        $regional_head_kotli = User::create([
            'name' => 'Regional Head Kotli',
            'branch_id' => 5,
            'email' => 'rc.kti' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_head_kotli->assignRole($regional_head);
        $regional_head_kotli->syncPermissions($regionalHeadPermissions);

        $regional_head_mirpur = User::create([
            'name' => 'Regional Head Mirpur',
            'branch_id' => 2,
            'email' => 'rc.mpr' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_head_mirpur->assignRole($regional_head);
        $regional_head_mirpur->syncPermissions($regionalHeadPermissions);


        $regional_credit_officer_mirpur = User::create([
            'name' => 'Regional Credit Officer Mirpur',
            'branch_id' => 2,
            'email' => 'rcm.mpr.officer' . '@bankajk.com',
            'password' => Hash::make('password123'),
        ]);
        $regional_credit_officer_mirpur->assignRole($regional_credit_officer);
        $regional_credit_officer_mirpur->syncPermissions($regionalCreditOfficerPermissions);

    }
    // php artisan migrate:fresh --seed --seeder=PermissionsDemoSeeder
}
