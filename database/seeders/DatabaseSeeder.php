<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();
//        User::factory()->withPersonalTeam()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call([
           LoanCategorySeeder::class,
           LoanSubCategorySeeder::class,
           ChecklistSeeder::class,
           RegionSeeder::class,
           DistrictSeeder::class,
           BranchSeeder::class,
           TelephoneSeeder::class,
           LoanStatusSeeder::class,
           PermissionsDemoSeeder::class,
           CompanySeeder::class,
           StatusSeeder::class,
           ObligorScoreCardFactorSeeder::class,
           OscfOptSeeder::class,
        ]);
    }
}
