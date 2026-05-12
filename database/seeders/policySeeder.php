<?php

namespace Database\Seeders;

use App\Models\WebsitePolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class policySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            [
                'privacy_policy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'terms_conditions' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'refund_policy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'payment_policy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'about_us' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
        ];

        WebsitePolicy::insert($policies);
    }
}
