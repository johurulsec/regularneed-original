<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('memberships')->insert([
            [
                'name' => 'Basic',
                'monthly_price' => 0,
                'ad_view_points_multiplier' => 5,
                'referral_points_multiplier' => 1,
                'benefits' => 'Basic plan with 5 coins per ad view',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium',
                'monthly_price' => 499,
                'ad_view_points_multiplier' => 10,
                'referral_points_multiplier' => 2,
                'benefits' => 'Premium plan with 10 coins per ad view',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
