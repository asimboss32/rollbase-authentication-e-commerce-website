<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'phone' => '016XXXXXXXX',
                'email' => 'info@ecommerce.com',
                'address' => 'Uttara, Dhaka-1230',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://www.facebook.com/',
                'instagram' => 'https://www.facebook.com/',
                'youtube' => 'https://www.facebook.com/',
                'logo' => 'https://www.facebook.com/',
                'hero_image' => 'https://www.facebook.com/',
            ],
        ];

        setting::insert($settings);
    }
    
}
