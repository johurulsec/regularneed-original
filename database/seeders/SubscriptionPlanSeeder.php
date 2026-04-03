<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionPlanSeeder extends Seeder
{
    public function run()
    {
        DB::table('subscription_plans')->insert([
            [
                'name' => 'Free Plan',
                'price' => 0,
                'duration_days' => 0, // unlimited or trial
                'features' => json_encode(['Basic Access', 'Limited Support']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Basic Plan',
                'price' => 499, // in your currency's smallest unit (e.g., cents or BDT)
                'duration_days' => 30,
                'features' => json_encode(['Ad-Free Experience', 'Priority Support']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard Plan',
                'price' => 999,
                'duration_days' => 30,
                'features' => json_encode(['Ad-Free Experience', 'Premium Support', 'Extra Storage']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium Plan',
                'price' => 1999,
                'duration_days' => 30,
                'features' => json_encode(['All Features', '24/7 Support', 'Exclusive Content']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Annual Plan',
                'price' => 19999,
                'duration_days' => 365,
                'features' => json_encode(['All Features', '24/7 Support', 'Exclusive Content', 'Discounted Price']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
